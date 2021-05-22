@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-4" style="text-align: center">
        <a href="{{route('blog.index')}}" type="button" class="btn btn-primary">View All Blog</a>
        <a href="#manage" class="btn btn-success" type="button">Manage Blogs</a>
    </div>
    <div class="container border border-primary mt-4 p-2">
        <h3>Create New Blog</h3>
        <form action="{{route('blog.store')}}" method="POST">
            @csrf
          <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" class="form-control" aria-describedby="title">
          </div>
          <div class="mb-3">
            <label for="body" class="form-label">Body</label>
            <textarea type="text" name="body" class="form-control" cols="10" rows="10"></textarea>
          </div>
          <button type="submit" class="btn btn-success">Create</button>
        </form>
    </div>
    <div class="container mt-4" id="manage">
        <table class="table table-success table-striped">
            <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Title</th>
                  <th scope="col">Excerpt</th>
                  <th scope="col">Actions</th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($blogs as $blog)
                  <tr>
                    <th scope="row">{{$blog->id}}</th>
                    <td>{{$blog->title}}</td>
                    <td>{{ Str::substr($blog->body, 0, 10) }}...</td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                            <a href="{{route('blog.show', $blog->slug)}}" type="button" class="btn btn-primary">View</a>
                            <a href="{{route('blog.edit', $blog->slug)}}" type="button" class="btn btn-warning">Edit</a>
                            @auth
                                <form action="{{route('blog.destroy', $blog->slug)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            @endauth
                        </div>
                    </td>
                  </tr>
                  @endforeach
              </tbody>
        </table>
    </div>
</div>
@endsection
