<?php

namespace App\Http\Repositories;

use App\Http\Repositories\IDepartmentRepository;
use App\Models\Department;

class DepartmentRepository extends BaseRepository implements IDepartmentRepository
{
    public function __construct(Department $department)
    {
        parent::__construct($department);
    }

    public function all()
    {
        return $this->model->all();
    }

    public function delete($department)
    {
        if ($department->employees()->count())
            return 0;
        
        return $department->delete();
    }
}
