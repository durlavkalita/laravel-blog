@extends('layouts.app')

@section('content')
  <div class="px-5">
    <h1 class="text-center mb-4">{{$blog->title}}</h1>
    <p class="text-start px-5">{{$blog->body}}</p>
  </div>
@endsection