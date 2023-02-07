@extends('layouts.app');

@section('content')
    <div class="container">
        <h1>{{ $post->title }}</h1>
        @if ($post->category)
            <a href="{{ route('admin.categories.show', ['category' => $post->category]) }}">{{ $post->category->name }}</a> 
        @endif         
        <div>
        @if ($post->tags->all())
            <div>
                @foreach ($post->tags as $tag)
                <a href="{{ route('admin.tags.show', ['tag' => $tag]) }}">{{ $tag->name }}</a>{{ $loop->last ? "" : ", "}}
                @endforeach
            </div>
        @endif
        </div>
        {{-- <img src="{{ $post->image }}" alt="{{ $post->title }}"> --}}
        <img src="{{ asset('storage/' . $post->uploaded_img) }}" alt="{{ $post->title }}">
        <p>{{ $post->content }}</p>
    </div>
@endsection