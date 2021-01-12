@extends('layouts.app')
@section('title')
  <div class="page-title">
    <strong>{{ $user->name }}</strong>
  </div>

@endsection
@section('content')

<div class="card border-info mb-3" style="max-width: 50rem;">
  <div class="card-header">Inregistrat pe site pe  {{$user->created_at->format('M d, Y') }}</div>
  <div class="card-body text-info">
    <h5 class="card-title">Informatii despre postari</h5>
    <table class="table-padding">
      <style>
        .table-padding td {
          padding: 3px 8px;
        }
      </style>
      <tr>
        <td>Total Posts</td>
        <td> {{$posts_count}}</td>
        @if($author && $posts_count)
        <td><a href="{{ url('/my-all-posts')}}">Show All</a></td>
        @endif
      </tr>
      <tr>
        <td>Published Posts</td>
        <td>{{$posts_active_count}}</td>
        @if($posts_active_count)
        <td><a href="{{ url('/user/'.$user->id.'/posts')}}">Show All</a></td>
        @endif
      </tr>
      <tr>
        <td>Posts in Draft </td>
        <td>{{$posts_draft_count}}</td>
        @if($author && $posts_draft_count)
        <td><a href="{{ url('my-drafts')}}">Show All</a></td>
        @endif
      </tr>
    </table>

    <h5 class="card-title">Informatii despre comentarii</h5>
    <table class="table-padding">
      <style>
        .table-padding td {
          padding: 3px 8px;
        }
      </style>
      <tr>
        <td>Total Comments {{$comments_count}}</td>
      </tr>
    </table>
  </div>
</div>

<!-- Lista cu ultimele postari -->
<div class="card border-info mb-3" style="max-width: 50rem;">
  <div class="card-header">Ultimele postari</div>
  <div class="card-body text-info">
    <p class="card-text">Aici puteti vedea lista cu cele mai recente <strong>postari</strong> ale dumneavoastra.</p>
    <div class="panel panel-default">
      <div class="panel-body">
        @if(!empty($latest_posts[0]))
        @foreach($latest_posts as $latest_post)
        <p>
          <strong><a href="{{ url('/'.$latest_post->slug) }}">{{ $latest_post->title }}</a></strong>
          <span class="well-sm">On {{ $latest_post->created_at->format('M d,Y \a\t h:i a') }}</span>
        </p>
        @endforeach
        @else
        <p>You have not written any post till now.</p>
        @endif
      </div>
    </div>
  </div>
</div>

<!-- Lista cu ultimele comentarii -->
<div class="card border-info mb-3" style="max-width: 50rem;">
  <div class="card-header">Ultimele comentarii</div>
  <div class="card-body text-info">
    <p class="card-text">Aici puteti vedea lista cu cele mai recente <strong>comentarii</strong> ale dumneavoastra.</p>
    <div class="panel panel-default">
        <div class="list-group">
            @if(!empty($latest_comments[0]))
                @foreach($latest_comments as $latest_comment)
                    <div class="list-group-item">
                      <p>{{ $latest_comment->body }}</p>
                      <p>On {{ $latest_comment->created_at->format('M d,Y \a\t h:i a') }}</p>
                      <p>On post <a href="{{ url('/'.$latest_comment->post->slug) }}">{{ $latest_comment->post->title }}</a></p>
                    </div>
                @endforeach
            @else
                <div class="list-group-item">
                  <p>You have not commented till now. Your latest 5 comments will be displayed here</p>
                </div>
            @endif
        </div>
    </div>
  </div>
</div>

@endsection