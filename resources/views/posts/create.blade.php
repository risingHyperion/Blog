@extends('layouts.app')
@section('title')
    <div class="page-title">
        <strong>Adauga o noua postare</strong>
    </div>
@endsection
@section('content')

<form action="/new-post" method="post" enctype="multipart/form-data">
  @csrf
  <div class="form-group">
    <label for="title">Titlul postarii</label>
    <input type="text" class="form-control"  aria-describedby="emailHelp" placeholder="Introdu titlul postarii aici" name="title" required>
</div>
<div class="form-group">
    <label for="body">Continut</label>
    <textarea class="form-control" rows="5" name="body" placeholder="Introdu continutul postarii aici" required></textarea>
</div>
<div class="form-group">
    <label for="exampleFormControlFile1">Imagine</label>
    <input type="file" class="form-control-file" id="exampleFormControlFile1" name="image" required>
</div>
<button type="submit" class="btn btn-primary">Creaza postare</button>
</form>
@endsection