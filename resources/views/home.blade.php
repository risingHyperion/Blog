@extends('layouts.app')

@section('title')
  <div class="posts-title">
    <strong>{{$title}}</strong>
  </div>
@endsection

@section('content')
    @if ( !$posts->count() )
        Nu există niciun articol! Autentifica-te pentru a posta primul articol!
    @else
        <div class="posts-section">
          @foreach( $posts as $post )
              <div class="list-group">

                <div class="card"  style="width: 1000px">
                  <!-- Imaginea -->
                  <img class="card-img-top" src="{{ asset('images') }}/{{ $post -> image }}" class="table-user-thumb" alt="">
                  
                  <div class="card-body">
                          <!-- Titlu -->
                          <h3 class="card-title"><a href="{{ url('/'.$post->slug) }}">{{ $post->title }}</a>
                            @if(!Auth::guest() && ($post->author_id == Auth::user()->id || Auth::user()->is_admin()))
                                @if($post->active == '1')
                                    <button class="btn" style="float: right"><a href="{{ url('edit/'.$post->slug)}}">Editare</a></button>
                                @else
                                    <button class="btn" style="float: right"><a href="{{ url('edit/'.$post->slug)}}">Edit Draft</a></button>
                                @endif
                            @endif
                          </h3>

                          <!-- Autorul postarii -->
                          <p class="user-name">{{ $post->created_at->format('M d,Y \a\t h:i a') }} de catre <a href="{{ url('/user/'.$post->author_id)}}">{{ $post->author->name }}</a></p>

                          <!-- Textul postarii -->
                          <p class="card-text">{!! Str::limit($post->body, $limit = 500, $end = '... <br><br><a class="btn btn-primary" href='.url("/".$post->slug).'>Mai mult</a>') !!}</p>
                  </div>
                </div>
              </div>
          @endforeach
          {!! $posts->render() !!}
        </div>
    @endif
@endsection
