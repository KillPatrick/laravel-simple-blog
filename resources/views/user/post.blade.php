@extends('user/app')

@if(!$post->image)
  @section('bg-img', asset('user/img/post-bg.jpg'))
@else
  @section('bg-img', Storage::disk('public')->url($post->image))
@endif

@section('title', $post->title)
@section('subtitle', $post->subtitle)

@section('main-content')

<!-- Post Content -->
<article>
        <div class="container">
          <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
              <small class="pull-left">Posted {{ $post->created_at->diffForHumans() }}</small>
              @foreach ($post->categories as $category)
            <small class="pull-right"><a href="{{ route('category', $category->slug) }}">{{ $category->name }}</a></small>   
              @endforeach

              {!! htmlspecialchars_decode($post->body) !!} 

              @foreach ($post->tags as $tag)
              <small class="pull-left"><a href="{{ route('tag', $tag->slug) }}" class="btn btn-sm">{{ $tag->name }}</a></small>
              @endforeach
            </div>
          </div>
        </div>
      </article>
    
      <hr>

@endsection