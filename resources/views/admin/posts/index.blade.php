@extends('layouts.app');

@section('content')
    <div class="container">
      @if (session('success_delete'))
        <div class="alert alert-warning" role="alert">
          Il post con id {{ session('success_delete')->id }} è stato eliminato correttamente.
        </div>
      @endif
      <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Slag</th>
              <th scope="col">Title</th>
              <th scope="col">Categoria</th>
              <th scope="col">Actions</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($posts as $post)
                  <tr>
                      <td>{{ $post->id }}</td>
                      <td>{{ $post->slag }}</td>
                      <td>{{ $post->title }}</td>
                      <td>{{ $post->category->name }}</td>
                      <td>
                          {{-- <a href="/posts/{{ $post->id }}" class="btn btn-primary">Visita</a> --}}
                          <a href="{{ route('admin.posts.show', ['post' => $post->id])}}" class="btn btn-primary">Visit</a>
                      </td>
                      <td>
                          <a href="{{ route('admin.posts.edit', ['post' => $post])}}" class="btn btn-warning">Edit</a>
                      </td> 
                      <td>
                        <form action="{{ route('admin.posts.destroy', ['post' => $post])}}" method="post">
                          @method('DELETE')
                          @csrf
                          <button class="btn btn-danger">Delete</button>
                        </form>
                      </td>
                  </tr>
              @endforeach 
          </tbody>
      </table>
      {{ $posts->links() }}
    </div>
@endsection