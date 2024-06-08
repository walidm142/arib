<?php

namespace App\Http\Repositories;

interface ITaskRepository extends IBaseRepository
{
    public function employees($filters = null);
}