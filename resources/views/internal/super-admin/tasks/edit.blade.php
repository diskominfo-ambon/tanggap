@extends('layouts.app')

@section('content')
<div class="content-page">
  <div class="nk-block-head nk-block-head-lg wide-md">
      <div class="nk-block-head-content">
          <div class="nk-block-head-sub">
            <a class="back-to" href="{{ url()->previous() }}"><em class="icon ni ni-arrow-left"></em><span>Beranda papan Anda</span></a></div>
          <h3 class="nk-block-title fw-bold">Ubah task</h3>
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
                  <form method="POST" enctype="multipart/form-data" action="{{ route('admin.task.update', $task->id) }}">
                      @csrf
                      @method('PUT')
                      <div class="nk-block-head">
                          <div class="nk-block-head-content">
                              <h6 class="title nk-block-title">Judul</h6>
                              <div class="nk-block-des">
                                  <p>Masukan judul yang baik dan mudah dimengerti.</p>
                              </div>
                          </div>
                      </div>
                      <div class="mb-5">
                          <input name="title" placeholder="Contoh: Pada dinas saya jaringan wifi lelet, apakah ada solusii?" value="{{ $task->title }}" type="text" class="form-control form-control-lg">
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
                      <textarea id="editor" name="content">{!! $task->content !!}</textarea>
                      @error('content')
                      <span class="d-block text-danger mb-3 mt-1">{{ $message }}</span>
                      @enderror

                    <div class="nk-block-head mt-5">
                        <div class="nk-block-head-content">
                            <h6 class="title nk-block-title">Status</h6>
                            <div class="nk-block-des">
                                <p>Ubah status tugas</p>
                            </div>
                        </div>
                    </div>
                    <div class="d-block mb-4 custom-control custom-radio">
                      <input type="radio" id="customRadio1" {{ $task->status == \App\Models\Task::StatusBacklog ? 'checked' : '' }} name="status" value="2" class="custom-control-input">
                      <label class="custom-control-label" for="customRadio1">Tugas (kembalikan ke daftar tugas awal)</label>
                    </div>
                    <div class="d-block mb-4 custom-control custom-radio">
                      <input type="radio" id="customRadio2" name="status" value="3" {{ $task->status == \App\Models\Task::StatusOnProgress ? 'checked' : '' }} class="custom-control-input">
                      <label class="custom-control-label" for="customRadio2">Tinjau (kembalikan ke daftar tinjauan staff)</label>
                    </div>
                    <div class="d-block mb-4 custom-control custom-radio">
                      <input type="radio" id="customRadio3" name="status" value="4" {{ $task->status == \App\Models\Task::StatusInReview ? 'checked' : '' }} class="custom-control-input">
                      <label class="custom-control-label" for="customRadio3">Tinjauan admin</label>
                    </div>
                    <div class="d-block mb-4 custom-control custom-radio">
                      <input type="radio" id="customRadio4" name="status" value="5" {{ $task->status == \App\Models\Task::StatusDone ? 'checked' : '' }} class="custom-control-input">
                      <label class="custom-control-label" for="customRadio4">Terselesaikan</label>
                    </div>
                    @error('status')
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
                                @foreach ($task->tags as $t)
                                  @if($tag->id == $t->id)
                                    <option value="{{ $tag->id }}" selected>{{ $tag->name }}</option>
                                  @else
                                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                  @endif
                                @endforeach
                              @endforeach
                          </select>
                      </div>
                          @error('tags')
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
                          @php
                            $assignment = $task->assignment();
                          @endphp
                          <select name="user" class="form-select form-select-lg" data-search="on" data-placeholder="Pilih staff Anda">
                              @foreach ($users as $user)
                                @if ($user->id == $assignment?->user?->id)
                                <option value="{{ $user->id }}" selected>{{ Str::of($user->name)->title() }} • {{ Str::of($user->employee_type) }}</option>
                                @else
                                <option value="{{ $user->id }}">{{ Str::of($user->name)->title() }} • {{ Str::of($user->employee_type) }}</option>
                                @endif
                              @endforeach
                          </select>
                      </div>
                      @error('user')
                      <span class="d-block text-danger mb-3 mt-1">{{ $message }}</span>
                      @enderror

                      <div class="nk-block-head mt-5">
                        <div class="nk-block-head-content">
                            <h6 class="title nk-block-title">Unggah</h6>
                            <div class="nk-block-des">
                                <p>Tambahkan unggahan berkas dokumen jika perlu.</p>
                            </div>
                        </div>
                      </div>
                      <div class="mb-2">
                        <div class="form-control-wrap">
                          <div class="custom-file">
                              <input type="file" multiple name="attachments[]" accept="application/pdf" class="custom-file-input" id="customFile">
                              <label class="custom-file-label" for="customFile">Boleh lebih dari 1 berkas</label>
                          </div>
                        </div>
                          @error('attachments')
                          <span class="d-block text-danger mb-3 mt-1">{{ $message }}</span>
                          @enderror
                      </div>

                      @if ($task->attachments->count() > 0)
                      <ul class="list-group mb-5">
                        @foreach($task->attachments as $attachment)
                        <li>
                          <a href="{{ $attachment->full_path }}">{{ $attachment->name }} • {{ round($attachment->size / 1024) }}kb</a>
                        </li>
                        @endforeach
                      </ul>
                      @endif

                      <button class="btn btn-primary">Simpan perubahan task</button>
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
