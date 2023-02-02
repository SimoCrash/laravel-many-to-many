@extends('layouts.app');

@section('content')
    <div class="container">
        <form action="{{ route('admin.posts.update', ['post' => $post]) }}" method="post" class="row g-3 needs-validation" enctype="multipart/form-data" novalidate>
            @method('PUT')
            @csrf
            <form class="row g-3 needs-validation" novalidate>
                <div class="mb-3">
                  <label for="title" class="form-label">Titolo</label>
                  <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $post->title) }}">
                  <div class="invalid-feedback">
                    @error('title')
                        <ul>
                          @foreach ($errors->get('title') as $error)
                              <li>{{ $error }}</li>
                          @endforeach  
                        </ul>
                    @enderror
                  </div>
                </div>
                <div class="mb-3">
                    <label for="slag" class="form-label">Slag</label>
                    <input type="text" class="form-control @error('slag') is-invalid @enderror" id="slag" name="slag" value="{{ old('slag', $post->slag) }}">
                    <div class="invalid-feedback">
                    @error('slag')
                        <ul>
                          @foreach ($errors->get('slag') as $error)
                              <li>{{ $error }}</li>
                          @endforeach  
                        </ul>
                    @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Url Immagine</label>
                    <input type="url" class="form-control @error('image') is-invalid @enderror" id="image" name="image" value="{{ old('image', $post->image) }}">
                    <div class="invalid-feedback">
                        @error('image')
                        <ul>
                          @foreach ($errors->get('image') as $error)
                              <li>{{ $error }}</li>
                          @endforeach  
                        </ul>
                    @enderror
                    </div>
                </div>
                <div class="mb-3">
                  <label for="uploaded_img" class="form-label">Immagine</label>
                  <input class="form-control @error('uploaded_img') is-invalid @enderror" type="file" id="uploaded_img" name="uploaded_img">
                  <div class="invalid-feedback">
                    @error('uploaded_img')
                    <ul>
                      @foreach ($errors->get('uploaded_img') as $error)
                          <li>{{ $error }}</li>
                      @endforeach  
                    </ul>
                @enderror
                </div>
                <div>
                  <img src="{{ asset('storage/' . $post->uploaded_img) }}" alt="{{ $post->title }}">
                </div>
                <div class="mb-3">
                    <label for="content" class="form-label">Contenuto</label>
                    <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content">{{ old('content', $post->content) }}</textarea>
                    <div class="invalid-feedback">
                        @error('content')
                        <ul>
                          @foreach ($errors->get('content') as $error)
                              <li>{{ $error }}</li>
                          @endforeach  
                        </ul>
                    @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label for="except" class="form-label">Except</label>
                    <textarea class="form-control @error('except') is-invalid @enderror" id="except" name="except">{{ old('except', $post->except) }}</textarea>
                    <div class="invalid-feedback">
                        @error('except')
                        <ul>
                          @foreach ($errors->get('except') as $error)
                              <li>{{ $error }}</li>
                          @endforeach  
                        </ul>
                    @enderror
                    </div>
                </div>
                <div class="col-12">
                  <button class="btn btn-primary" type="submit">Modifica</button>
                </div>
              </form>
        </form>
    </div>
@endsection