@extends('layouts.app')

@section('content')
<div class="content-page">
  <div class="nk-block-head nk-block-head-lg wide-md">
      <div class="nk-block-head-content">
          <div class="nk-block-head-sub">
            <a class="back-to" href="{{ url()->previous() }}"><em class="icon ni ni-arrow-left"></em><span>Beranda papan Anda</span></a></div>
          <h3 class="nk-block-title fw-bold">Ubah staff {{ Str::of($user->name)->title() }}</h3>
      </div>
  </div><!-- .nk-block-head -->
  <div class="nk-block">
      <div class="row">
          <div class="col-xl-8">
              <div class="">
                <div class="nk-block nk-block-lg">
                  <form method="POST" action="{{ route('admin.staff.update', $user->id) }}">
                      @csrf
                      @method('PUT')
                      <div class="nk-block-head">
                          <div class="nk-block-head-content">
                              <h6 class="title nk-block-title">Nama pengguna</h6>
                              <div class="nk-block-des">
                                  <p>Masukan nama lengkap staff Anda.</p>
                              </div>
                          </div>
                      </div>
                      <div class="mb-5">
                          <input name="name" placeholder="Contoh: nama pengguna" value="{{ $user->name }}" type="text" class="form-control form-control-lg">
                          @error('name')
                          <span class="d-block text-danger mb-3 mt-1">{{ $message }}</span>
                          @enderror
                      </div>



                      <div class="nk-block-head">
                        <div class="nk-block-head-content">
                            <h6 class="title nk-block-title">Alamat email pangguna</h6>
                            <div class="nk-block-des">
                                <p>Masukan alamat email pengguna Anda.</p>
                            </div>
                        </div>
                      </div>
                      <div class="mb-5">
                        <input name="email" placeholder="Contoh: alamat email" value="{{ $user->email }}" type="email" class="form-control form-control-lg">
                        @error('email')
                        <span class="d-block text-danger mb-3 mt-1">{{ $message }}</span>
                        @enderror
                      </div>

                      <div class="nk-block-head">
                        <div class="nk-block-head-content">
                            <h6 class="title nk-block-title">Kata sandi pangguna</h6>
                            <div class="nk-block-des">
                                <p>Masukan untuk mengubah kata sandi pengguna.</p>
                            </div>
                        </div>
                      </div>
                      <div class="mb-5">
                        <input name="password" placeholder="Contoh: kata sandi pengguna" type="password" class="form-control form-control-lg">
                        @error('password')
                        <span class="d-block text-danger mb-3 mt-1">{{ $message }}</span>
                        @enderror
                      </div>

                      <div class="nk-block-head mt-5">
                        <div class="nk-block-head-content">
                            <h6 class="title nk-block-title">Pendidikan terakhir pengguna</h6>
                            <div class="nk-block-des">
                                <p>Tambahkan pendidikan terakhir staff pengguna Anda.</p>
                            </div>
                        </div>
                      </div>
                      <div class="mb-5">
                        <div class="form-control-wrap">
                          <input name="employee_degree" placeholder="Contoh: S1 Teknik informatika" value="{{ $user->employee_degree }}" type="text" class="form-control form-control-lg">
                        </div>
                      @error('employee_degree')
                      <span class="d-block text-danger mb-3 mt-1">{{ $message }}</span>
                      @enderror

                      <div class="nk-block-head mt-5">
                        <div class="nk-block-head-content">
                            <h6 class="title nk-block-title">Jabatan pengguna</h6>
                            <div class="nk-block-des">
                                <p>Tambahkan jabatan staff pengguna Anda.</p>
                            </div>
                        </div>
                      </div>
                      <div class="mb-5">
                        <div class="form-control-wrap">
                          @php
                            $jobs = [
                              'Pranata komputer',
                              'Programmer',
                              'Pengelolah Jaringan',
                              'Staff Admin'
                            ];
                          @endphp
                          <select name="employee_type" class="form-select form-select-lg" data-search="on" data-placeholder="Pilih staff Anda">
                              @foreach ($jobs as $job)
                                @if ($user->employee_type == $job)
                                <option value="{{ $user->employee_type }}" selected>{{ strtoupper($job) }}</option>
                                @else
                                <option value="{{ $user->employee_type }}">{{ strtoupper($job) }}</option>
                                @endif
                              @endforeach
                          </select>
                      </div>
                      @error('employee_type')
                      <span class="d-block text-danger mb-3 mt-1">{{ $message }}</span>
                      @enderror

                      <button class="mt-5 btn btn-primary">Simpan perubahan</button>
                  </form>

              </div><!-- .nk-block -->
              </div><!-- .card -->
          </div>
      </div>
  </div><!-- .nk-block -->
</div><!-- .content-page -->
@endsection
