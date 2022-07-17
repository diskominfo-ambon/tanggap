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
        <div class="kanban-item-title" data-status="${status}" data-task="${task.id}" data-slug="${task.slug}">
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


    function increseTotalBoard(source, target) {
      let sourceTotal = source.querySelector('.kanban-board-header span.text-dark').textContent;
      let targeTotal = target.querySelector('.kanban-board-header span.text-dark').textContent;

      source.querySelector('.kanban-board-header span.text-dark').innerText = parseInt(sourceTotal) - 1;
      target.querySelector('.kanban-board-header span.text-dark').innerText = parseInt(targeTotal) + 1;
    }

    const StatusBacklog = 2;
    const StatusOnProgress = 3;
    const StatusInReview = 4;
    const StatusDone = 5;
    const BoardBacklog = "_backlog";
    const BoardOnProgress = "_in_progress";
    const BoardInReview = "_to_review";
    const HttpMethod = 'GET'
    const GovernmentRole = 'government';

    const Endpoint = window.location.origin.trimEnd('/') + '/gettask';
    let boardStatus = {
      [BoardBacklog]: StatusBacklog,
      [BoardInReview]: StatusInReview,
      [BoardOnProgress]: StatusOnProgress
    };
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
        const dragableItems = _CurrentRole === GovernmentRole ? false : true;

        const kanban = new jKanban({
          element: '#kanban',
          gutter: '0',
          widthBoard: '413px',
          responsivePercentage: false,
          dragBoards: false,
          dragItems: dragableItems,
          boards: [...kanbanBoards],
          click: function (el) {
            const board = el.children[0].dataset;
            const Endpoint = window.location.href + "/laporan/lihat/" + board.slug;
            window.location.href  = Endpoint;
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
            const taskID = parseInt(board.task);
            const boardEl = target.parentNode;
            const boardElSource = source.parentNode;

            increseTotalBoard(boardElSource, boardEl);

            // updated with ajax
            const Endpoint = window.location.origin + "/tasks/update";
            const HttpMethod = "PUT";
            const data = {
              id: taskID,
              board: boardEl.dataset.id,
              statusSource: parseInt(board.status),
              statusTarget: boardStatus[boardEl.dataset.id]
            };

            console.log(data, boardEl.dataset);

            $.ajax({
              url: Endpoint,
              method: HttpMethod,
              data: data,
              success: function (res) {
                toastr.clear();
                NioApp.Toast('Berhasil mengubah status.', 'success', {
                  position: 'top-center'
                });

                console.log(res);
              },
              error: function () {
                NioApp.Toast('Gagal mengubah status.', 'error', {
                  position: 'top-center'
                });
              },
            })

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
