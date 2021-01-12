@extends('layouts.app')
@section('title')
  <div class="page-title">
    <strong>Editeaza postarea</strong>
  </div>
@endsection
@section('content')
<script type="text/javascript" src="{{ asset('/js/tinymce/tinymce.min.js') }}"></script>

<form method="post" action='{{ url("/update") }}'>
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <input type="hidden" name="post_id" value="{{ $post->id }}{{ old('post_id') }}">
  <div class="form-group">
    <input required="required" placeholder="Enter title here" type="text" name="title" class="form-control" value="@if(!old('title')){{$post->title}}@endif{{ old('title') }}" />
  </div>
  <div class="form-group">
    <textarea name='body' class="form-control">
      @if(!old('body'))
      {!! $post->body !!}
      @endif
      {!! old('body') !!}
    </textarea>
  </div>
  @if($post->active == '1')
  <input type="submit" name='publish' class="btn btn-success" value="Modifica" />
  @else
  <input type="submit" name='publish' class="btn btn-success" value="Publish" />
  @endif
  <input type="submit" name='save' class="btn btn-default" value="Salveaza drift" />
  <a href="{{  url('delete/'.$post->id.'?_token='.csrf_token()) }}" class="btn btn-danger">Sterge</a>
</form>
@endsection