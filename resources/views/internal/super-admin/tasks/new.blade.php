@extends('layouts.app')

@section('content')
<div class="content-page">
  <div class="nk-block-head nk-block-head-lg wide-md">
      <div class="nk-block-head-content">
          <div class="nk-block-head-sub">
            <a class="back-to" href="{{ route('government.home') }}"><em class="icon ni ni-arrow-left"></em><span>Beranda papan Anda</span></a></div>
          <h3 class="nk-block-title fw-bold">Tambahkan task baru</h3>
          <div class="nk-block-des">
              <p class="lead">
                Jangan lupa untuk menambahkan melaporkan task masalah yang sedang kamu hadapin, agar dapat dapat diselesaikan.
              </p>
          </div>
      </div>
  </div><!-- .nk-block-head -->
  <div class="nk-block">
      <div class="row">
          <div class="col-xl-8">
              <div class="">
                <div class="nk-block nk-block-lg">
                  <form method="POST" enctype="multipart/form-data" action="{{ route('admin.task.new') }}">
                      @csrf
                      @method('POST')
                      <div class="nk-block-head">
                          <div class="nk-block-head-content">
                              <h6 class="title nk-block-title">Judul</h6>
                              <div class="nk-block-des">
                                  <p>Masukan judul yang baik dan mudah dimengerti.</p>
                              </div>
                          </div>
                      </div>
                      <div class="mb-5">
                          <input name="title" placeholder="Contoh: Pada dinas saya jaringan wifi lelet, apakah ada solusii?" value="{{ old('title') }}" type="text" class="form-control form-control-lg">
                          @error('title')
                          <span class="d-block text-danger mb-3 mt-1">{{ $message }}</span>
                          @enderror
                      </div>

                      <div class="nk-block-head">
                          <div class="nk-block-head-content">
                              <h6 class="title nk-block-title">Deskripsi konten</h6>
                              <div class="nk-block-des">
                                  <p>Masukan dekripsi konten masalah Anda, dan goal yang ingin dicapai.</p>
                              </div>
                          </div>
                      </div>
                      <textarea id="editor"  placeholder="Deskripsikan masalah Anda disini" name="content">{{ old('content') }}</textarea>
                      @error('content')
                      <span class="d-block text-danger mb-3 mt-1">{{ $message }}</span>
                      @enderror

                      <div class="nk-block-head mt-5">
                        <div class="nk-block-head-content">
                            <h6 class="title nk-block-title">Tag</h6>
                            <div class="nk-block-des">
                                <p>Tambahkan tag untuk membantu mengambarkan task.</p>
                            </div>
                        </div>
                      </div>
                      <div class="mb-5">
                        <div class="form-control-wrap">
                          <select name="tags" class="form-select form-select-lg" multiple="multiple" data-search="on" data-placeholder="Pilih tag Anda, contoh: #darurat">
                              @foreach ($tags as $tag)
                                <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                              @endforeach
                          </select>
                      </div>
                          @error('tags')
                          <span class="d-block text-danger mb-3 mt-1">{{ $message }}</span>
                          @enderror
                      </div>

                      <div class="nk-block-head mt-5">
                        <div class="nk-block-head-content">
                            <h6 class="title nk-block-title">Unggah</h6>
                            <div class="nk-block-des">
                                <p>Tambahkan unggahan berkas dokumen jika perlu.</p>
                            </div>
                        </div>
                      </div>
                      <div class="mb-5">
                        <div class="form-control-wrap">
                          <div class="custom-file">
                              <input type="file" multiple name="attachments[]" accept="application/pdf" class="custom-file-input" id="customFile">
                              <label class="custom-file-label" for="customFile">Boleh lebih dari 1 berkas</label>
                          </div>
                        </div>
                          @error('attachment')
                          <span class="d-block text-danger mb-3 mt-1">{{ $message }}</span>
                          @enderror
                      </div>

                      <div class="nk-block-head mt-5">
                        <div class="nk-block-head-content">
                            <h6 class="title nk-block-title">Pilih Staff</h6>
                            <div class="nk-block-des">
                                <p>Tambahkan staff untuk tugas baru Anda.</p>
                            </div>
                        </div>
                      </div>
                      <div class="mb-5">
                        <div class="form-control-wrap">
                          <select name="user" class="form-select form-select-lg" data-search="on" data-placeholder="Pilih staff Anda">
                              @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ Str::of($user->name)->title() }} • {{ Str::of($user->employee_type) }}</option>
                              @endforeach
                          </select>
                      </div>
                          @error('user')
                          <span class="d-block text-danger mb-3 mt-1">{{ $message }}</span>
                          @enderror
                      </div>



                      <button class="btn btn-primary ">Tambahkan task</button>
                  </form>

              </div><!-- .nk-block -->
              </div><!-- .card -->
          </div>
      </div>
  </div><!-- .nk-block -->
</div><!-- .content-page -->
@endsection


@section('script')
{{-- <script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script> --}}
<script src="https://cdn.jsdelivr.net/npm/ckeditor5-build-classic-custom-simpleuploadadapter@28.0.0/build/ckeditor.min.js"></script>

<script>
  $(document).ready(() => {
    const STORAGE_ENDPOINT = window.location.origin + "/upload";
    const TOKEN = $('meta[name="csrf-token"]').attr('content');

    ClassicEditor
      .create( document.querySelector( '#editor' ), {
        simpleUpload: {
          uploadUrl: STORAGE_ENDPOINT,
          withCredentials: true,
          headers: {
            'X-CSRF-TOKEN': TOKEN,
          },
        }
      })
      .catch( error => {
          console.error( error );
      } );
  });

</script>
@endsection
