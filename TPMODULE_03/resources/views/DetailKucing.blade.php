@extends('layouts.dashboard')

@section('title', 'Cat Details')

@section('content')
<div class="cat-card mx-auto" style="max-width: 600px;">
    <h2 class="cat-title mb-3 text-center">{{ $kucing->cat_name }}</h2>

    <ul class="list-group list-group-flush">
        <li class="list-group-item"><strong>Breed:</strong> {{ $kucing->breed }}</li>

        <li class="list-group-item"><strong>Fur Color:</strong> {{ $kucing->fur_color }}</li>

        <li class="list-group-item"><strong>Age:</strong> {{ $kucing->age }} years</li>

        <li class="list-group-item"><strong>Description:</strong> {{ $kucing->description }}</li>
    </ul>

    <div class="text-center mt-4">
        <a href="{{ route('cats.index') }}" class="btn btn-custom">Back to List</a>
    </div>
</div>
@endsection
