"use strict";

!function (NioApp, $) {
  "use strict"; // Variable

  var $win = $(window),
      $body = $('body'),
      breaks = NioApp.Break;

  function capfirst(char, max) {
    if (char.length >= max) {
      return char.substring(0, max) + '...';
    }

    return char;
  }

  NioApp.Kanban = function () {

    function titletemplate(title, count = 0) {
      var optionicon = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : "more-h";
      return "\n                <div class=\"kanban-title-content\">\n                    <h6 class=\"title\">".concat(title, "</h6>\n                    <span class=\"badge badge-pill badge-outline-light text-dark\">").concat(count, "</span>\n                </div>\n    </div>\n  ");
    }

    function createBoardElement(status, task) {


      let tags = [];

      for (const tag of tags) {
        tags.push(`
          <li><span class="badge">#${tag.name}</span></li>
        `)
      }

      return {
        title:`
        <div class="kanban-item-title" data-status="${status}">
            <h6 class="title">${capfirst(task.title, 35)}</h6>
            <div class="drodown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <div class="user-avatar-group">
                      <div class="user-avatar xs bg-primary"><span><em class="icon ni ni-user-alt-fill"></em></span></div>
                  </div>
              </a>
                <div class="dropdown-menu dropdown-menu-right">
                  <ul class="link-list-opt no-bdr p-3 g-2">
                      <li>
                          <div class="user-card">
                              <div class="user-avatar sm bg-primary">
                                <em class="icon ni ni-user-alt-fill"></em>
                              </div>
                              <div class="user-name">
                                  <span class="tb-lead">${task.user.name}</span>
                              </div>
                          </div>
                      </li>
                  </ul>
                </div>
              </div>
        </div>
        <div class="kanban-item-text">
            <p>${capfirst(task.content, 100)}</p>
        </div>
        <ul class="kanban-item-tags">
          ${tags}
        </ul>
        <div class="kanban-item-meta">
            <ul class="kanban-item-meta-list">
                <li class="text-secondary"><em class="icon ni ni-calendar"></em><span>Dibuat pada ${task.createdDiffHumans}</span></li>
                <li><em class="icon ni ni-notes"></em><span>${task.user.employee_degree}</span></li>
            </ul>
            <ul class="kanban-item-meta-list">
                <li><em class="icon ni ni-comments"></em><span>${task.replies.length}</span></li>
            </ul>
        </div>
    `,
      }
    }

    const StatusBacklog = 2;

    const StatusOnProgress = 3;

    const StatusInReview = 4;

    const StatusDone = 5;
    const Endpoint = window.location.origin.trimEnd('/') + '/gettask';
    const HttpMethod = 'GET'

    // initialize board.
    let boards = {
      [StatusBacklog]: {
        id: '_backlog',
        title: 'Tugas',
        class: 'kanban-light',
        item: [],
      },
      [StatusOnProgress]: {
        id: '_in_progress',
        title: 'Dalam penanganan',
        class: 'kanban-primary',
        item: [],
      },
      [StatusInReview]: {
        id: '_to_review',
        title: 'Tinjauan',
        class: 'kanban-warning',
        item: [],
      },
    };



    $.ajax({
      url: Endpoint,
      method: HttpMethod,
      success: function (res) {
        const tasks = res.data?.tasks;

        for (const task of tasks) {
          const key = task.status;

          if (key in boards) {
            const element = createBoardElement(key, task);
            console.log(element);
            boards[key].item.push(element);
          }
        }


        boards = {
          ...boards,
          [StatusBacklog]: {
            ...boards[StatusBacklog],
            title: titletemplate(boards[StatusBacklog].title, boards[StatusBacklog].item.length),
          },
          [StatusOnProgress]: {
            ...boards[StatusOnProgress],
            title: titletemplate(boards[StatusOnProgress].title, boards[StatusOnProgress].item.length),
          },
          [StatusInReview]: {
            ...boards[StatusInReview],
            title: titletemplate(boards[StatusInReview].title, boards[StatusInReview].item.length),
          },
        }


        const kanbanBoards = Object.values(boards);

        const kanban = new jKanban({
          element: '#kanban',
          gutter: '0',
          widthBoard: '350px',
          responsivePercentage: false,
          boards: [...kanbanBoards],
          click: function () {
            console.log('click');
          },
          dragEl: function () {
            console.log('dragEl');
            // return false;
          },
          dropEl: function (el, target, source, sibling) {
            const board = el.children[0].dataset;

            if (board.status == StatusInReview) {
              Swal.fire({
                title: '<strong>🔎 Task sedang ditinjauan</strong>',
                icon: 'info',
                html: 'Anda tidak dapat mengubah status task',
                showCloseButton: true,
              });
              // Swal.fire('Task tidak dapat dipindahkan!');
              return false;
            }

          },

        });


        for (var i = 0; i < kanban.options.boards.length; i++) {

          var board = kanban.findBoard(kanban.options.boards[i].id);
        }

      },
      error: function () {
        console.log('error');
      }
    });


  };

  NioApp.coms.docReady.push(NioApp.Kanban);
}(NioApp, jQuery);
