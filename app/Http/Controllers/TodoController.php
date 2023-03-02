<?php

namespace App\Http\Controllers;

use domain\Facades\TodoFacade;
use Illuminate\Http\Request;
use PHPUnit\Framework\ComparisonMethodDoesNotDeclareBoolReturnTypeException;

class TodoController extends ParentController
{   
    public function index() {
        $response['tasks'] = TodoFacade::all();
        return view('pages.todo.index')->with($response);
    }

    public function store(Request $request) {
        TodoFacade::store($request->all());
        return redirect()->back();
    }

    public function delete($task_id) {
        TodoFacade::delete($task_id);
        return response()->json(['status' => 'Deleted Successfully!']);
    }

    public function done($task_id)
    {
        TodoFacade::done($task_id);
        return redirect()->back();
    }

    public function edit(Request $request) {
        $response['task'] = TodoFacade::get($request['task_id']);
        return view('pages.todo.mytodoedit')->with($response);
    }

    public function update(Request $request, $task_id) {
        TodoFacade::update($request->all(), $task_id);
        return redirect()->back();
    }
}
