@extends('layouts.main')

@section('container')
    <h1>{{ $title }}</h1>
    <div class="container">
        <div class="row">
            @foreach ($categories as $category)
                <div class="col-md-4">
                    <div class="card text-bg-dark">
                        <a href="/blog?category={{ $category->slug }}" class="text-decoration-none">
                            <img src="https://source.unsplash.com/500x500?{{ $category->name }}" class="card-img"
                                alt="...">
                            <div class="card-img-overlay d-flex align-items-center p-0">
                                <h5 class="card-title bg-dark bg-opacity-75 text-white text-center flex-fill p-4 fs-3">
                                    {{ $category->name }}</h5>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
