@extends('layouts.dashboard')

@section('title', 'Cat List')

@section('content')
    <div class="text-center mb-4">
        <h1 class="cat-title">🐾 Pet Cat List 🐾</h1>
        <p class="cat-subtitle">Click on a cat's name to see its details</p>
    </div>

    <div class="row justify-content-center">
        @foreach($kucings as $kucing)
            <div class="col-md-4 mb-3">
                <div class="cat-card text-center">
                    <h4>{{ $kucing->cat_name }}</h4>

                    <p class="text-muted">{{ $kucing->breed }}</p>

                    <a href="{{ route('cats.show', $kucing->id) }}" class="btn btn-custom btn-sm">
                        View Details
                    </a>
                </div>
            </div>
        @endforeach
    </div>
@endsection