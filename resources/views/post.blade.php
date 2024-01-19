@extends('layouts.main')
@section('container')
    {{--
    $data->slug == $data['slug']
--}}
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1 class="mb-3">{{ $data->title }}</h1>
                <p class="mb-1">From author: <a
                        href="/blog?author={{ $data->author->username }}">{{ $data->author->name }}</a>
                    in <a href="/blog?category={{ $data->category->slug }}">{{ $data->category->name }}</a>
                </p>
                @if ($data->image)
                    <img src="{{ asset('storage/' . $data->image) }}" alt="{{ $data->category->name }}"
                        class="img-fluid card-img-top">
                @else
                    <img src="https://source.unsplash.com/1200x400?{{ $data->category->name }}"
                        class="card-img-top img-fluid" alt="imgunplash">
                @endif
                <article class="my-3 fs-5">{!! $data->body !!}</article>
                <p class="card-text">
                    <small class="text-body-secondary">Last updated at {{ $data->created_at->diffForHumans() }}</small>
                </p>
            </div>
        </div>
    </div>
@endsection
