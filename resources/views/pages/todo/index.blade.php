@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1 class="page-title">My Todo List</h1>
            </div>
            <div class="col-lg-12 mt-5">
                <form action="{{ route('todo.store') }}" method="post" enctype="multipart/form">
                    @csrf
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="form-group">
                                <input class="form-control form-control-lg" name="title" type="text" placeholder="Enter Task" aria-label=".form-control-lg example">
                            </div>
                        </div>
                        <div class="col-lg-4 mb-0 d-flex">
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
                            <th scope="col"><h2>Status</h2></th>
                            <th scope="col"><h2>Action</h2></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tasks as $key => $task)
                            <tr>
                                <th scope="row">{{ ++$key }}</th>
                                <td>{{ $task->title }}</td>
                                <td>
                                    @if ($task->done == 0)
                                        <span class="text-danger">Not Completed</span>
                                    @else
                                        <span class="text-primary">Completed</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('todo.delete', $task->id) }}" class="btn btn-danger">Delete</a>
                                    <a href="{{ route('todo.done', $task->id) }}" class="btn btn-success">Done</a>
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
