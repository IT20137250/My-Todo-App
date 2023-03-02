<form action="{{ route('todo.update', $task->id) }}" method="get" enctype="multipart/form">
@csrf
    <div class="row">
        <div class="col-lg-8">
            <div class="form-group">
                <input class="form-control form-control-lg" name="title" value="{{ $task->title }}" type="text" placeholder="Enter Task" aria-label=".form-control-lg example" required>
            </div>
        </div>
        <div class="col-lg-4 mb-0 d-flex">
            <button class="btn btn-warning" type="submit">Update</button>
        </div>
    </div>
</form>