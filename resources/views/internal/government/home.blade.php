@extends('layouts.app')

@section('content')

<div class="nk-block-head nk-block-head-sm">
  <div class="nk-block-between">
      <div class="nk-block-head-content">
        <h3 class="nk-block-title page-title">Beranda papan kerja Anda</h3>
        <div class="nk-block-des text-soft">
            <p>Hai, Azman Abdullah selamat datang kembali di beranda kerja Anda. </p>
        </div>
      </div><!-- .nk-block-head-content -->
      <div class="nk-block-head-content">
        <div class="toggle-wrap nk-block-tools-toggle">
            <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
            <div class="toggle-expand-content" data-content="pageMenu">
                <ul class="nk-block-tools g-3">
                    <li><a href="{{ route('government.task.new') }}" class="btn btn-white btn-outline-primary" data-toggle="tooltip" data-placement="bottom" title="Tambahkan task"><em class="icon ni ni-book"></em><span>Tambahkan</span></a></li>
                    <li><a href="#" class="btn btn-secondary" data-toggle="tooltip" data-placement="bottom" title="Filter papan"><em class="icon ni ni-filter"></em></a></li>
                </ul>
            </div>
        </div><!-- .toggle-wrap -->
    </div><!-- .nk-block-head-content -->
  </div><!-- .nk-block-between -->
</div><!-- .nk-block-head -->

<div class="row">
  <div class="col-lg-4 col-sm-12 col-xs-12">
    <div class="card card-with-icon card-bordered">
      <div class="card-inner">
          <img class="card-icon" src="{{ asset(env('ASSET_PATH_VENDOR')) . '/images/icons/help-desk.svg' }}" alt="task-done" />
          <div class="card-content">
            <h5 class="card-title">Buat task</h5>
            <h6 class="card-subtitle mb-2">
              Kamu punya task yang ingin dilaporkan?
            </h6>
          </div>
      </div>
    </div>
  </div>

  <div class="col-lg-4 col-sm-12 col-xs-12">
    <div class="card card-with-icon card-bordered">
      <div class="card-inner">
          <img class="card-icon" src="{{ asset(env('ASSET_PATH_VENDOR')) . '/images/icons/doc-checked.svg' }}" alt="task-done" />
          <div class="card-content">
            <h5 class="card-title">{{ count($tasks) }} Task</h5>
            <h6 class="card-subtitle mb-2">
              Semua laporan task kamu yang berhasil ditanggani
            </h6>
          </div>
      </div>
    </div>
  </div>

  <div class="col-lg-4 col-sm-12 col-xs-12">
    <div class="card card-with-icon card-bordered">
      <div class="card-inner">
          <img class="card-icon" src="{{ asset(env('ASSET_PATH_VENDOR')) . '/images/icons/plan-s1.svg' }}" alt="task-done" />
          <div class="card-content">
            <h5 class="card-title">Tikk.. Hadiah!!</h5>
            <h6 class="card-subtitle mb-2">
              Bantu berikan masukan bagi pelayanan kami
            </h6>
          </div>
      </div>
    </div>
  </div>
</div>

<div class="row my-4">
  <div class="col-12">
    <div class="nk-block-des text-soft">

      <p class="mb-0">Semua list papan kerja Anda dalam bulan ini.</p>
    </div>
    <div id="kanban" class="nk-kanban"></div>
  </div>
</div>


@endsection


@section('script')
<script src="{{ asset(env('ASSET_PATH_VENDOR'). '/js/libs/jkanban.js?ver=2.2.0') }}"></script>
<script src="{{ asset(env('ASSET_PATH_VENDOR'). '/js/apps/kanban.js?ver=2.2.0') }}"></script>
@endsection
