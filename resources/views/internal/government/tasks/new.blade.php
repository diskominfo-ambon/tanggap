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
                  <form method="POST" enctype="multipart/form-data" action="{{ route('government.task.new') }}">
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


                      <textarea id="editor" name="content">{{ old('content') }}</textarea>
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
<script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>
<script>
  ClassicEditor
    .create( document.querySelector( '#editor' ) )
    .catch( error => {
        console.error( error );
    } );
</script>
@endsection
