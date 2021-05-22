@extends('layouts.app')

@section('content')
  <div class="container">
    <div style="margin: 0 auto">
      <img src="/blog.jpg" alt="" class="img-fluid rounded mx-auto d-block mb-4" style="width: 80vw; height: 70vh" >
    </div>
    <div style="display: grid; grid-template-columns: auto auto; justify-content: space-evenly; grid-gap: 50px;">
      @foreach ($blogs as $blog)
        <div class="card" style="width: 26rem;">
          {{-- <img src="..." class="card-img-top" alt="..."> --}}
          <div class="card-body">
            <h5 class="card-title">{{$blog->title}}</h5>
            <p class="card-text">{{ Str::substr($blog->body, 0, 100) }}...</p>
            <a href="{{route('blog.show', $blog->slug)}}" class="btn btn-primary">Read more</a>
          </div>
        </div>
      @endforeach
    </div>
    <div class="pagination pagination-centered" style="padding: 2rem 0">
      {{ $blogs->appends(request()->input())->links() }}
    </div>
  </div>
@endsection