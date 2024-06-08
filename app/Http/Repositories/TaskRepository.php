<?php

namespace App\Http\Repositories;

use App\Http\Repositories\ITaskRepository;
use App\Models\Department;
use App\Models\Task;
use App\Models\User;

class TaskRepository extends BaseRepository implements ITaskRepository
{
    public function __construct(Task $task, public User $employee)
    {
        parent::__construct($task);
    }

    public function employees($filters = null)
    {
        $employees = $this->employee;

        if ($filters) {
            $employees = $employees->where('manager_id', $filters);
        } else
            $employees = $employees->where('manager_id', '!=', 0);

        return $employees->get();
    }
}
