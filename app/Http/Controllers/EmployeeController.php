<?php

namespace App\Http\Controllers;

use App\Http\Repositories\IDepartmentRepository;
use App\Http\Repositories\IEmployeeRepository;
use App\Http\Requests\EmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public $repository;

    public function __construct(
        IEmployeeRepository $repository,
        private IDepartmentRepository $iDepartmentRepository
    ) {
        $this->repository = $repository;
    }

    public function index(Request $request)
    {
        return view('employees.index')->with([
            "employees" => $this->repository->index([
                'first_name' => $request->search,
                'last_name' => $request->search,
            ])
        ]);

    }

    public function create()
    {

        return view('employees.create')->with([
            'departments' => $this->iDepartmentRepository->all(),
            'managers' => $this->repository->getManagers(),
        ]);
    }

    public function store(EmployeeRequest $request)
    {
        try {
            $this->repository->storeEmployee($request);

        } catch (Exception $e) {

            return redirect()->route("employees.index")->with('error', 'Not stored');
        }

        return redirect()->route("employees.index")->with('success', 'stored successfully');

    }

    public function edit(User $employee)
    {

        return view('employees.edit')->with([
            'departments' => $this->iDepartmentRepository->all(),
            'managers' => $this->repository->getManagers(),
            'employee' => $employee,
        ]);
    }

    public function update(UpdateEmployeeRequest $request, User $employee)
    {
        try {
            $this->repository->updateEmployee($request, $employee);
        } catch (Exception) {
            return redirect()->route("employees.index")->with('error', 'Not updated');
        }
        return redirect()->route("employees.index")->with('success', 'Updated successfully');
    }

    public function destroy(User $employee)
    {
        $this->repository->deleteEmployee($employee);
        return redirect()->route("employees.index")->with('success', 'Deleted successfully');
    }

}
