@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1 class="page-title">Home Page</h1>
            </div>
        </div>
        <div class="row justify-center">
            @forelse ($posts as $post)
                <div class="col-lg-4">
                    <img src="{{ config('images.upload_path') }}/thumb/480x635/{{ $post->images->name }}" alt="Banner-Image">
                </div>
            @empty
                <h2 class="text-danger">No banner images here..</h2>
            @endforelse
        </div>
    </div>
@endsection

@push('css')

<style>
    .page-title {
        padding-top: 10vh;
        font-size: 4rem;
        color: #252597;
    }
</style>
    
@endpush