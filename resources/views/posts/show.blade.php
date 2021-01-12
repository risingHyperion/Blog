@extends('layouts.app')

@section('title')
    <div class="title-info">
        @if($post)
            {{ $post->title }}
            @if(!Auth::guest() && ($post->author_id == Auth::user()->id || Auth::user()->is_admin()))
                <button class="btn" style="float: right"><a href="{{ url('edit/'.$post->slug)}}">Modifica postarea</a></button>
            @endif
        @else
            Pagina nu exista
        @endif
    </div>
    
@endsection


@section('title-meta')
    <div class="title-info">
      <p class="user-name">{{ $post->created_at->format('M d,Y \a\t h:i a') }} By <a href="{{ url('/user/'.$post->author_id)}}">{{ $post->author->name }}</a></p>
    </div>
    
@endsection


@section('content')
  @if($post)

    <div class="card" style="width: 1000px">
          <img src="{{ asset('images') }}/{{ $post -> image }}" class="card-img-top" alt="">


        <div class="card-body">
          <p class="card-text">{!! $post->body !!}</p>
        </div>
    </div>
  
    <div class="comment-section">

      <h2>Lasa un comentariu</h2>

    @if(Auth::guest())
        <p>Autentifica-te pentru a putea lasa un comentariu</p>
    @else
        <div class="panel-body">
            <form method="post" action="/comment/add">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input type="hidden" name="on_post" value="{{ $post->id }}">
                  <input type="hidden" name="slug" value="{{ $post->slug }}">
                  <div class="form-group">
                    <textarea required="required" placeholder="Introdu un comentariu aici" name="body" class="form-control"></textarea>
                  </div>
                  <input type="submit" name='post_comment' class="btn btn-success" value="Post" />
            </form>
        </div>  
    @endif
      <div>
        @if($comments)
          <ul style="list-style: none; padding: 0">
              @foreach($comments as $comment)
                  <li class="panel-body">
                    <div class="list-group">
                        <div class="list-group-item">
                            <h3>{{ $comment->author->name }}</h3>
                            <p>{{ $comment->created_at->format('M d,Y \a\t h:i a') }}</p>
                        </div>
                        <div class="list-group-item">
                            <p>{{ $comment->body }}</p>
                        </div>
                    </div>
                  </li>
              @endforeach
          </ul>
        @endif
      </div>

    </div>
    
    @else
        404 error
    @endif
@endsection