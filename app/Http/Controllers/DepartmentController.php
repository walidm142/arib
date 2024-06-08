<?php

namespace App\Http\Controllers;

use App\Http\Repositories\IDepartmentRepository;
use App\Http\Requests\DepartmentRequest;
use App\Models\Department;
use Exception;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{

    public $repository;

    public function __construct(IDepartmentRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return view('departments.index')->with([
            'departments' => $this->repository->index(['name' => $request->name])
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('departments.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DepartmentRequest $request)
    {
        try {
            $this->repository->store($request);
        } catch (Exception $e) {

        }

        return redirect()->route('departments.index')->with('success', "department added successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(Department $department)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Department $department)
    {
        return view('departments.edit', compact('department'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DepartmentRequest $request, Department $department)
    {
        try {
            $this->repository->update($department, $request);
        } catch (Exception $e) {
            return redirect()->route('departments.index')->with('error', 'Department not updated');
        }
        return redirect()->route('departments.index')->with('success', 'Department updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Department $department)
    {
        if (!$this->repository->delete($department))
            return redirect()->route('departments.index')->with('error', 'Department has employees');

        return redirect()->route('departments.index')->with('success', 'Department Deleted successfully');

    }
}
