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
                                <input class="form-control form-control-lg" name="title" type="text" placeholder="Enter Task" aria-label=".form-control-lg example" required>
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
                                    <input type="hidden" class="serDel_val" value="{{ $task->id }}">
                                    <a href="{{ route('todo.delete', $task->id) }}" class="btn btn-danger btn-block serviceDeleteBtn">Delete</a>
                                    <a href="{{ route('todo.done', $task->id) }}" class="btn btn-success">Done</a>
                                    <a href="javascript:void(0)" class="btn btn-info" onclick="taskEditModal({{ $task->id }})">Edit</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="taskEdit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="taskEditLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="taskEditLabel">Edit Your Task</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="taskEditContent">
                    ...
                </div>
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

@push('js')
    <script>
        function taskEditModal(task_id) {
            var data = {
                task_id: task_id,
            };
            $.ajax({
                url: "{{ route('todo.edit') }}",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'GET',
                dataType: '',
                data: data,
                success: function(response) {
                    $('#taskEdit').modal('show');
                    $('#taskEditContent').html(response);
                }
            });
        }
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('.serviceDeleteBtn').click(function(e) {
                e.preventDefault();
                var task_id = $(this).closest("td").find('.serDel_val').val();
                //alert(delete_id);
                swal({
                        title: "Are you sure?",
                        text: "Once deleted, you will not be able to recover this data!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            var data = {
                                "_token": $('input[name=_token]').val(),
                                "id": task_id,
                            };
                            $.ajax({
                                url: '/todo/' + task_id + '/delete/',
                                data: data,
                                success: function(response) {
                                    swal(response.status, {
                                            icon: "success",
                                        })
                                        .then((result) => {
                                            location.reload();
                                        });
                                }
                            });
                        }
                    });
            });
        });
    </script>
@endpush
