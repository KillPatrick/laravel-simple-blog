@extends('user/app')

@section('bg-img', asset('user/img/home-bg.jpg'))
@section('title', 'FOREX')
@section('subtitle', 'Blog')

@section('main-content')

<!-- Main Content -->
<div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            @foreach ($posts as $post)
            <div class="post-preview">
              <a href="{{ route('post', $post->slug) }}">
                
                <h2 class="post-title">
                  {{ $post->title }}
                </h2>
                <h3 class="post-subtitle">
                  {!! htmlspecialchars_decode(substr($post->body, 0, 500)) !!}
                </h3>
              </a>
              <p class="post-meta">Posted by on {{ $post->created_at->diffForHumans() }}</p>
            </div>
            <hr>
            @endforeach
            <!-- Pager -->
            {{ $posts->links() }}
          </div>
        </div>
      </div>
    
      <hr>

@endsection