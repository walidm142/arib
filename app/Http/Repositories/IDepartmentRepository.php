<?php

namespace App\Http\Repositories;

interface IDepartmentRepository extends IBaseRepository
{
public function all();
public function delete($department);
}