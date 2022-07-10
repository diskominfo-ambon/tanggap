@extends('layouts.app')

@section('content')
<div class="nk-content nk-content-fluid">
  <div class="container-xl wide-xl">
      <div class="nk-content-inner">
          <div class="nk-content-body">
              <div class="nk-block-head nk-block-head-sm">
                  <div class="nk-block-between g-3">
                      <div class="nk-block-head-content">
                          <h3 class="nk-block-title page-title">Laporan masalah <strong class="text-primary small">Abu Bin Ishtiyak</strong></h3>
                          <div class="nk-block-des text-soft">
                              <ul class="list-inline">
                                  <li>Token ID: <span class="text-base">{{ $task->token }}</span></li>
                                  <li>Ditambahkan pada: <span class="text-base">{{ $task->created_at }}</span></li>
                              </ul>
                          </div>
                      </div>
                      <div class="nk-block-head-content">
                          <a href="{{ route('government.home') }}" class="btn btn-outline-light bg-white d-none d-sm-inline-flex"><em class="icon ni ni-arrow-left"></em><span>Back</span></a>
                          <a href="{{ route('government.home') }}" class="btn btn-icon btn-outline-light bg-white d-inline-flex d-sm-none"><em class="icon ni ni-arrow-left"></em></a>
                      </div>
                  </div>
              </div><!-- .nk-block-head -->
              <div class="nk-block">
                  <div class="row gy-5">
                      <div class="col-lg-5">
                          <div class="nk-block-head">
                              <div class="nk-block-head-content">
                                  <h5 class="nk-block-title title">Ditangani oleh</h5>
                                  <p>Laporan masalah Anda ditangani oleh</p>
                              </div>
                          </div><!-- .nk-block-head -->
                          <div class="card card-bordered">
                              <ul class="data-list is-compact">
                                  <li class="data-item">
                                      <div class="data-col">
                                          <div class="data-label">Terakhir terupdate</div>
                                          <div class="data-value">
                                            {{ $task->assignment()->created_at }}
                                          </div>
                                      </div>
                                  </li>
                                  <li class="data-item">
                                      <div class="data-col">
                                          <div class="data-label">Status</div>
                                          <div class="data-value"><span class="badge badge-dim badge-sm badge-outline-secondary">{{ $task->getStatusString }}</span></div>
                                      </div>
                                  </li>
                                  <li class="data-item">
                                      <div class="data-col">
                                          <div class="data-label">Ditangani oleh</div>
                                          <div class="data-value">
                                              <div class="user-card">
                                                  <div class="user-avatar user-avatar-xs bg-orange-dim">
                                                      <em class="icon ni ni-user-fill"></em>
                                                  </div>
                                                  <div class="user-name">
                                                      <span class="tb-lead">
                                                        {{ $task->assignment()->name }}
                                                      </span>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </li>
                                  <li class="data-item">
                                      <div class="data-col">
                                          <div class="data-label">Jabatan</div>
                                          <div class="data-value">
                                            {{ $task->assignment()->employee_type }} • {{ $task->assignment()->employee_degree }}
                                          </div>
                                      </div>
                                  </li>
                              </ul>
                          </div><!-- .card -->

                      </div><!-- .col -->
                      <div class="col-lg-7">
                          <div class="nk-block-head">
                              <div class="nk-block-head-content">
                                  <h5 class="nk-block-title title">Masalah Anda</h5>
                                  <p>Informasi masalah yang dilaporkan</p>
                              </div>
                          </div>
                          <div class="card card-bordered">
                              <ul class="data-list is-compact">
                                  <li class="data-item">
                                      <div class="data-col">
                                          <div class="data-label">Judul</div>
                                          <div class="data-value">
                                            {{ $task->title }}
                                          </div>
                                      </div>
                                  </li>
                                  <li class="data-item">
                                      <div class="data-col">
                                          <div class="data-label">Masalah</div>
                                          <div class="data-value">
                                            {!! $task->content !!}
                                          </div>
                                      </div>
                                  </li>
                                  <li class="data-item">
                                      <div class="data-col">
                                          <div class="data-label">Ditambahkan pada</div>
                                          <div class="data-value text-soft">
                                            {{ $task->created_at }}
                                          </div>
                                      </div>
                                  </li>
                              </ul>
                          </div>
                      </div><!-- .col -->
                  </div><!-- .row -->
              </div><!-- .nk-block -->
          </div>
      </div>
  </div>
</div>
@endsection
