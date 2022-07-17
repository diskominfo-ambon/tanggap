@extends('layouts.app')


@section('content')
<div class="nk-content-body">
  <div class="content-page">
      <div class="nk-block-head nk-block-head-lg wide-sm">
          <div class="nk-block-head-content">
              <h3 class="nk-block-title fw-normal">
                <span class="text-primary">{{ $task->getStatusString }}</span> • {{ $task->title }}
              </h3>
              <div class="nk-block-des">
                  <p class="lead">We are on a mission to make the web a better place. The following terms, as well as our Policy and Terms of Service, apply to all users.</p>
                  <p class="text-soft ff-italic">
                    Ditambahkan {{ $task->created_at }}
                  </p>
              </div>
          </div>
      </div><!-- .nk-block-head -->
      <div class="nk-block">
          <div class="card card-bordered">
              <div class="card-inner card-inner-xl">
                  <div class="entry">
                    <h5>Deskripsi masalah</h5>
                    <div class="tags">
                      @foreach($task->tags as $tag)
                      <span class="badge badge-outline-primary">
                        {{ $tag->name }}
                      </span>
                      @endforeach
                    </div>
                    <div class="content content-problem mt-2 mb-4">
                      {!! $task->content !!}
                    </div>

                    <h5>Unggah terkait</h5>
                    <div class="content mt-2 mb-4">
                      @forelse ($task->attachments as $attachment)
                      <ul class="list-group">
                        <li>
                          <a href="{{ asset($attachment->fullPath) }}" download>{{ $attachment->name }} • {{ round($attachment->size / 1024) }}kb</a>
                        </li>
                      </ul>
                      @empty
                        <div class="text-center">
                          <img width="200" src="{{ asset('img/no-file.png') }}" alt="no file" />
                          <p class="text-soft m-0 mt-2 fs-15px">Tidak memiliki unggahan</p>
                        </div>
                      @endforelse
                    </div>
                  </div>
              </div><!-- .card-inner -->
          </div><!-- .card -->
      </div><!-- .nk-block -->
  </div><!-- .content-page -->
</div>
@endsection
