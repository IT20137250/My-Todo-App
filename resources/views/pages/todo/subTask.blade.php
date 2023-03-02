@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1 class="page-title">My Sub Task</h1>
                <h5 class="sub-task-title">{{ $task->title }}</h5>
            </div>
            <div class="col-lg-12 mt-5">
                <div class="card">
                    <div class="card-header">
                        <h3>Create New Sub Task</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('todo.sub.store') }}" method="post" enctype="multipart/form">
                        @csrf
                            <div class="pt-3 row">
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <input class="form-control form-control-lg" name="sub_title"       type="text"
                                                placeholder="Enter Sub Task" aria-label=".form-control-lg example" required maxlength="100">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <input class="form-control form-control-lg" name="phone"       type="number"
                                                placeholder="Enter Phone Number" aria-label=".form-control-lg example" maxlength="10" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" required>
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="row pt-4">
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <select name="priority" id="priority" class="form-control form-control-lg">
                                                    <option value="1">Priority 1</option>
                                                    <option value="2">Priority 2</option>
                                                    <option value="3">Priority 3</option>
                                                    <option value="4">Priority 4</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <textarea name="note" id="note" cols="30" rows="3" placeholder="Enter note here.." class="form-control form-control-lg"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <input class="form-control form-control-lg" name="date"       type="date"aria-label=".form-control-lg example" required>
                                            </div>
                                        </div>
                                    </div>    
                                </div>
                                <div class="col-lg-12 text-center mt-3">
                                    <input type="hidden" name="task_id" value={{ $task->id }}>
                                    <button class="btn btn-warning" type="submit">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 mt-5">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">
                                <h2>Sub Title</h2>
                            </th>
                            <th scope="col">
                                <h2>Contact NO</h2>
                            </th>
                            <th scope="col">
                                <h2>Priority</h2>
                            </th>
                            <th scope="col">
                                <h2>Description</h2>
                            </th>
                            <th scope="col">
                                <h2>Date</h2>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                       @foreach ($sub_tasks as $key => $sub_task)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $sub_task->sub_title }}</td>
                            <td>{{ $sub_task->phone }}</td>
                            <td>{{ $sub_task->priority }}</td>
                            <td>{{ $sub_task->note }}</td>
                            <td>{{ $sub_task->date }}</td>
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
        .sub-task-title {
            padding-top: 3vh;
            font-size: 2rem;
        }
    </style>
@endpush
