@extends('layouts.app')

@section('content')
<div class="nk-block-head nk-block-head-sm">
  <div class="nk-block-between">
      <div class="nk-block-head-content">
          <h3 class="nk-block-title page-title">Task Anda</h3>
          <div class="nk-block-des text-soft">
              <p>Semua daftar task Anda yang telah selesai</p>
          </div>
      </div><!-- .nk-block-head-content -->
      <div class="nk-block-head-content">
          <div class="toggle-wrap nk-block-tools-toggle">
              <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
              @role(\App\Models\User::Government)
              <div class="toggle-expand-content" data-content="pageMenu">
                  <ul class="nk-block-tools g-3">
                      <li><a href="{{ route('government.task.new') }}" class="btn btn-white btn-outline-primary"><em class="icon ni ni-book"></em><span>Buat Task</span></a></li>
                  </ul>
              </div>
              @endrole
          </div><!-- .toggle-wrap -->
      </div><!-- .nk-block-head-content -->
  </div><!-- .nk-block-between -->
</div><!-- .nk-block-head -->
<div class="nk-block">
  <div class="card card-bordered card-stretch">
      <div class="card-inner-group">
          <div class="card-inner position-relative card-tools-toggle">
              <div class="card-title-group">
                  <div class="card-tools">
                  </div><!-- .card-tools -->
                  <div class="card-tools mr-n1">
                      <ul class="btn-toolbar gx-1">
                          <li>
                              <a href="#" class="btn btn-icon search-toggle toggle-search" data-target="search"><em class="icon ni ni-search"></em></a>
                          </li><!-- li -->
                          <li class="btn-toolbar-sep"></li><!-- li -->
                          <li>
                              <div class="toggle-wrap">
                                  <a href="#" class="btn btn-icon btn-trigger toggle" data-target="cardTools"><em class="icon ni ni-menu-right"></em></a>
                                  <div class="toggle-content" data-content="cardTools">
                                      <ul class="btn-toolbar gx-1">
                                          <li class="toggle-close">
                                              <a href="#" class="btn btn-icon btn-trigger toggle" data-target="cardTools"><em class="icon ni ni-arrow-left"></em></a>
                                          </li><!-- li -->
                                          <li>
                                              <div class="dropdown">
                                                  <a href="#" class="btn btn-trigger btn-icon dropdown-toggle" data-toggle="dropdown">
                                                      <div class="dot dot-primary"></div>
                                                      <em class="icon ni ni-filter-alt"></em>
                                                  </a>
                                                  <div class="filter-wg dropdown-menu dropdown-menu-xl dropdown-menu-right">
                                                      <div class="dropdown-head">
                                                          <span class="sub-title dropdown-title">Urutkan bedasarkan tanggal</span>
                                                          <div class="dropdown">
                                                              <a href="#" class="btn btn-sm btn-icon">
                                                                  <em class="icon ni ni-more-h"></em>
                                                              </a>
                                                          </div>
                                                      </div>
                                                      <div class="dropdown-body dropdown-body-rg">
                                                          <div class="row gx-6 gy-3">
                                                              <div class="col-12">
                                                                  <div class="form-group">
                                                                    <div class="form-control-wrap">
                                                                      <div class="form-icon form-icon-left">
                                                                        <em class="icon ni ni-calendar-alt"></em>
                                                                      </div>
                                                                      <input type="text" class="form-control date-picker"/>
                                                                    </div>
                                                                  </div>
                                                              </div>


                                                              <div class="col-12">
                                                                  <div class="form-group">
                                                                      <button type="button" class="btn btn-secondary">Filter</button>
                                                                  </div>
                                                              </div>
                                                          </div>
                                                      </div>
                                                      <div class="dropdown-foot between">
                                                          <a href="#">Save Filter</a>
                                                      </div>
                                                  </div><!-- .filter-wg -->
                                              </div><!-- .dropdown -->
                                          </li><!-- li -->

                                      </ul><!-- .btn-toolbar -->
                                  </div><!-- .toggle-content -->
                              </div><!-- .toggle-wrap -->
                          </li><!-- li -->
                      </ul><!-- .btn-toolbar -->
                  </div><!-- .card-tools -->
              </div><!-- .card-title-group -->
              <div class="card-search search-wrap" data-search="search">
                  <div class="card-body">
                      <div class="search-content">
                          <a href="#" class="search-back btn btn-icon toggle-search" data-target="search"><em class="icon ni ni-arrow-left"></em></a>
                          <input type="text" name="q" class="form-control border-transparent form-focus-none" placeholder="Telusuri nama task, contoh: masalah perbaikan jaringan dinas..">
                          <button class="search-submit btn btn-icon"><em class="icon ni ni-search"></em></button>
                      </div>
                  </div>
              </div><!-- .card-search -->
          </div><!-- .card-inner -->
          <div class="card-inner p-0">
              <div class="nk-tb-list nk-tb-ulist">
                  <div class="nk-tb-item nk-tb-head">

                      <div class="nk-tb-col"><span class="sub-text fw-bold text-soft">Tanggung jawab & Dilaporkan oleh</span></div>
                      <div class="nk-tb-col tb-col-md"><span class="sub-text fw-bold text-soft">Judul masalah</span></div>
                      <div class="nk-tb-col nk-tb-col-tools text-right">
                          <div class="dropdown">
                              <a href="#" class="btn btn-xs btn-outline-light btn-icon dropdown-toggle" data-toggle="dropdown" data-offset="0,5"><em class="icon ni ni-plus"></em></a>
                              <div class="dropdown-menu dropdown-menu-xs dropdown-menu-right">
                                  <ul class="link-tidy sm no-bdr">
                                      <li>
                                          <div class="custom-control custom-control-sm custom-checkbox">
                                              <input type="checkbox" class="custom-control-input" checked="" id="bl">
                                              <label class="custom-control-label" for="bl">Balance</label>
                                          </div>
                                      </li>
                                      <li>
                                          <div class="custom-control custom-control-sm custom-checkbox">
                                              <input type="checkbox" class="custom-control-input" checked="" id="ph">
                                              <label class="custom-control-label" for="ph">Phone</label>
                                          </div>
                                      </li>
                                      <li>
                                          <div class="custom-control custom-control-sm custom-checkbox">
                                              <input type="checkbox" class="custom-control-input" id="vri">
                                              <label class="custom-control-label" for="vri">Verified</label>
                                          </div>
                                      </li>
                                      <li>
                                          <div class="custom-control custom-control-sm custom-checkbox">
                                              <input type="checkbox" class="custom-control-input" id="st">
                                              <label class="custom-control-label" for="st">Status</label>
                                          </div>
                                      </li>
                                  </ul>
                              </div>
                          </div>
                      </div>
                  </div><!-- .nk-tb-item -->
                  @foreach($tasks as $task)
                  <div class="nk-tb-item">
                      <div class="nk-tb-col">
                        <div class="d-block">
                          <div class="user-card">
                              <div class="user-avatar xs bg-primary">
                                <em class="icon ni ni-user-fill"></em>
                              </div>
                              <div class="user-name">
                                  <span class="tb-lead fw-bold">{{ $task->assignment()->name }}</span>
                                  <span class="fw-normal">{{ $task->assignment()->employee_type }} • {{ $task->assignment()->employee_degree }}</span>
                              </div>
                          </div>
                        </div>
                        <div class="d-block mt-2">
                          <div class="user-card">
                            <div class="user-avatar xs bg-secondary">
                              <em class="icon ni ni-user-fill"></em>
                            </div>
                            <div class="user-name">
                                <span class="tb-lead fw-bold">{{ $task->user->name }}</span>
                                <span class="fw-normal">{{ $task->user->employee_type }} • {{ $task->user->employee_degree }}</span>
                            </div>
                        </div>
                        </div>
                      </div>

                      <div class="nk-tb-col tb-col-lg">
                          <span class="d-block tb-lead fw-bold fs-14px">
                            {{ Str::of( $task->title)->ucfirst()->limit(35) }}
                          </span>
                          <span class="fw-normal fs-12px">Di tambahkan pada {{ $task->created_at }}</span> dan tangani <span class="fw-normal fs-12px">{{ $task->assignment()->created_at }}</span>
                      </div>

                      <div class="nk-tb-col nk-tb-col-tools">
                          <ul class="nk-tb-actions gx-2">
                              <li>
                                  <a href="{{ route('government.task.edit', $task->id) }}" class="btn btn-sm btn-icon btn-trigger" data-toggle="tooltip" data-placement="top" title="Ubah task">
                                      <em class="icon ni ni-pen-fill"></em>
                                  </a>
                              </li>
                              <li>
                                  <a href="#" class="btn btn-sm btn-icon btn-trigger" data-toggle="tooltip" data-placement="top" title="Hapus task">
                                      <em class="icon ni ni-trash-fill"></em>
                                  </a>
                              </li>
                          </ul>
                      </div>
                  </div><!-- .nk-tb-item -->
                  @endforeach
                </div><!-- .nk-tb-list -->
                @if($tasks->count() == 0)
                <div class="d-flex align-items-center justify-content-center flex-column py-4">
                  <img src="{{ asset('img/empty-task.webp') }}" alt="empty task" />
                  <h5 class="text-soft">Laporan task Anda belum tersedia</h5>
                </div>
                @endif
          </div><!-- .card-inner -->
          @if ($tasks->count() > 0)
          <div class="card-inner">
            {{ $tasks->links('pagination::bootstrap-4') }}
          </div><!-- .card-inner -->
          @endif
      </div><!-- .card-inner-group -->
  </div><!-- .card -->
</div><!-- .nk-block -->
@endsection
