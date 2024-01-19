@extends('dashboard.layouts.main')

@section('container')
    {{--
    $data->slug == $data['slug']
--}}
    <div class="container">
        <div class="row my-3">
            <div class="col-lg-8">
                <h1 class="mb-3">{{ $post->title }}</h1>
                <a href="/dashboard/posts/" class="btn btn-success">Back To All Posts</a>
                <a href="/dashboard/posts/{{ $post->slug }}/edit" class="btn btn-warning"><i class="bi bi-pencil"></i>
                    Edit</a>
                <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="d-inline">
                    @csrf
                    @method('delete')
                    <button class="btn btn-danger" onclick="return confirm('Are You Sure?')"><i
                            class="bi bi-trash"></i>Delete</button>
                </form>
                <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->category->name }}"
                    class="img-fluid mt-3 d-block">
                {{-- <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" class="img-fluid mt-3"
                    alt="imgunplash"> --}}
                <article class="my-3 fs-5">{!! $post->body !!}</article>
                <p class="card-text">
                    <small class="text-body-secondary">Last updated at {{ $post->created_at->diffForHumans() }}</small>
                </p>
            </div>
        </div>
    </div>
@endsection
