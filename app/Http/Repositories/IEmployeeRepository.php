<?php

namespace App\Http\Repositories;

interface IEmployeeRepository extends IBaseRepository
{
    public function getManagers();
    public function storeEmployee($request);
    public function updateEmployee($request, $employee);
    public function deleteEmployee($employee);
}