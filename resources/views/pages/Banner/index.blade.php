@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1 class="page-title">My Banner List</h1>
            </div>
            <div class="col-lg-12 mt-5">
                <form action="{{ route('banner.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="form-group">
                                <input class="form-control form-control-lg" name="title" type="text" placeholder="Enter Banner Name" aria-label=".form-control-lg example">
                            </div>
                            <div class="form-group mt-5">
                                <input class="form-control form-control-lg" name="images" type="file" placeholder="Upload Banner Image" accept="image/jpg, image/jpeg, image/png"
                                aria-label=".form-control-lg example">
                            </div>
                        </div>
                        <div class="col-lg-4 mt-1">
                            <button class="btn btn-warning" type="submit">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-12 mt-5">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col"><h2>Title</h2></th>
                            <th scope="col"><h2>Image</h2></th>
                            <th scope="col"><h2>Status</h2></th>
                            <th scope="col"><h2>Action</h2></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $key => $post)
                            <tr>
                                <th scope="row">{{ ++$key }}</th>
                                <td>{{ $post->title }}</td>
                                <td> <img src="{{ config('images.upload_path') }}/thumb/35x35/{{ $post->images->name }}" alt="Banner-Image"></td>
                                <td>
                                    @if ($post->status == 0)
                                        <span class="text-danger">Draft</span>
                                    @else
                                        <span class="text-primary">Publish</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('banner.delete', $post->id) }}" class="btn btn-danger">Delete</a>
                                    @if ($post->status == 0)
                                        <a href="{{ route('banner.status', $post->id) }}" class="btn btn-success">Publish</a>
                                    @else
                                        <a href="{{ route('banner.status', $post->id) }}" class="btn btn-primary">UnPublish</a>
                                    @endif
                                    
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('css')

<style>
    .page-title {
        padding-top: 10vh;
        font-size: 4rem;
        color: #771acf;
    }
</style>
    
@endpush