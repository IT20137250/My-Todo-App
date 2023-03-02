<?php 

namespace domain\Services;

use App\Models\SubTask;
use App\Models\Todo;

class TodoService {
    
    protected $task, $sub;

    public function __construct() {
        $this->task = new Todo();
        $this->sub = new SubTask();
    }

    public function all()
    {
        return $this->task->all();
    }

    public function get($task_id) {
        return $this->task->find($task_id);
    }

    public function store($data)
    {
        $this->task->create($data);
    }

    public function delete($task_id)
    {
        $task = $this->task->find($task_id);
        $task->delete();
    }

    public function done($task_id)
    {
        $task = $this->task->find($task_id);
        $task->done = 1;
        $task->update();
    }

    public function update(array $data, $task_id) {
        $task = $this->task->find($task_id);
        $task->update($this->edit($task, $data));
    }

    protected function edit(Todo $task, $data) {
        return array_merge($task->toArray(), $data);
    }

    //sub tasks section

    public function subStore($data) {
        $this->sub->create($data);
    }

    public function getSubTasksByTask($task_id) {
        return $this->sub->getSubTasksByTask($task_id);
    }

}