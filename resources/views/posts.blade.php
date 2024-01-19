@extends('layouts.main')

@section('container')
    <h1 class="text-center mb-3">{{ $title }}</h1>

    <div class="row justify-content-center mb-3">
        <div class="col-md-6">
            <form action="/blog">
                @if (request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                @endif
                @if (request('author'))
                    <input type="hidden" name="author" value="{{ request('author') }}">
                @endif
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search..." name="search"
                        value="{{ request('search') }}">
                    <button class="btn btn-outline-danger type="submit">Search</button>
                </div>
            </form>
        </div>
    </div>
    @if ($posts->count())
        <div class="card mb-3">
            <div style="max-height: 450px; overflow: hidden;">
                @if ($posts[0]->image)
                    <img src="{{ asset('storage/' . $posts[0]->image) }}" alt="{{ $posts[0]->category->name }}"
                        class="img-fluid card-img-top">
                @else
                    <img src="https://source.unsplash.com/1200x400?{{ $posts[0]->category->name }}"
                        class="card-img-top img-fluid" alt="imgunplash">
                @endif
            </div>
            <div class="card-body">
                <h3 class="card-title">{{ $posts[0]->title }}</h3>
                <p class="card-text">{{ $posts[0]->excerpt }}</p>
                <p><a class="text-decoration-none" href="/blog?author={{ $posts[0]->author->username }}">By
                        {{ $posts[0]->author->name }}</a>
                </p>
                <p>Genre : <a class="text-decoration-none"
                        href="/blog?category={{ $posts[0]->category->slug }}">{{ $posts[0]->category->name }}</a></p>
                <p class="card-text">
                    <small class="text-body-secondary">Last updated at {{ $posts[0]->created_at->diffForHumans() }}</small>
                </p>
                <a class="text-decoration-none btn btn-primary" href="/posts/{{ $posts[0]->slug }}">Read more</a>
            </div>
        </div>

        <div class="container">
            <div class="row">
                @foreach ($posts->skip(1) as $post)
                    <div class="col-md-4">
                        <div class="card mb-3">
                            <a href="/blog?category={{ $post->category->slug }}" class="text-decoration-none">
                                <div class="position-absolute bg-dark bg-opacity-75 px-2 py-1 text-white">
                                    {{ $post->category->name }}</div>
                                @if ($post->image)
                                    <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->category->name }}"
                                        class="img-fluid card-img-top">
                                @else
                                    <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}"
                                        class="card-img-top img-fluid" alt="imgunplash">
                                @endif
                            </a>
                            <div class="card-body">
                                <h5 class="card-title">{{ $post->title }}</h5>
                                <p><a class="text-decoration-none" href="/authors/{{ $post->author->username }}">By
                                        {{ $post->author->name }}</a>
                                </p>
                                <p>Genre : <a class="text-decoration-none"
                                        href="/blog?category={{ $post->category->slug }}">{{ $post->category->name }}</a>
                                </p>
                                <p class="card-text">{{ $post->excerpt }}</p>
                                <a href="/posts/{{ $post->slug }}" class="btn btn-primary">Read More</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @else
        <p class="text-center fs-4">Post Not Found</p>
    @endif
    <div class="d-flex justify-content-center">
        {{ $posts->links() }}
    </div>

@endsection
