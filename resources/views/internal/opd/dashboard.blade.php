@extends('layouts.app')

@section('content')

<div class="nk-block-head nk-block-head-sm">
  <div class="nk-block-between">
      <div class="nk-block-head-content">
          <h3 class="nk-block-title page-title">Baranda</h3>
          <div class="nk-block-des text-soft">
              <p>Hai, Azman Abdullah selamat datang kembali di beranda. </p>
          </div>
      </div><!-- .nk-block-head-content -->
      <div class="nk-block-head-content">

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
            <h5 class="card-title">20 Task</h5>
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
@endsection
