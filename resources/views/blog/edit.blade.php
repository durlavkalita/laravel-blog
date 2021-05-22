@extends('layouts.app')

@section('content')
  <div class="container">
    <form action="{{route('blog.update', $blog->slug)}}" method="POST">
      @csrf
      @method('PATCH')
      <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" name="title" class="form-control" aria-describedby="title" value="{{$blog->title}}">
      </div>
      <div class="mb-3">
        <label for="body" class="form-label">Body</label>
        <textarea type="text" name="body" class="form-control" cols="10" rows="10">
          {{$blog->body}}
        </textarea>
      </div>
      <button type="submit" class="btn btn-primary">Update</button>
    </form>
  </div>
@endsection