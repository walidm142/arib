<?php

namespace App\Http\Controllers;

use App\Http\Repositories\ITaskRepository;
use App\Http\Requests\TaskRequest;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{

    public $repository;

    public function __construct(ITaskRepository $repository)
    {
        $this->repository = $repository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return view('tasks.index')->with([
            "tasks" => $this->repository->index([
                'task' => $request->search
            ])
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tasks.create')->with([
            'employees' => $this->repository->employees()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TaskRequest $request)
    {
        try {
            $this->repository->store($request);
        } catch (\Exception $e) {
            return redirect()->route("tasks.index")->with('error', 'Not stored');
        }
        return redirect()->route("tasks.index")->with('success', 'stored successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        return view('tasks.edit')->with([
            'employees' => $this->repository->employees(),
            'task' => $task,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TaskRequest $request, Task $task)
    {
        try {
            $this->repository->update($task, $request);
        } catch (\Exception $e) {
            return redirect()->route("tasks.index")->with('error', 'Not updated');
        }
        return redirect()->route("tasks.index")->with('success', 'updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $this->repository->destroy($task);
        return redirect()->route("tasks.index")->with('success', 'Deleted successfully');
        
    }
}
