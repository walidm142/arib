<?php

namespace App\Http\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class EmployeeRepository extends BaseRepository implements IEmployeeRepository
{
    public function __construct(User $user)
    {
        parent::__construct($user);
    }

    public function getManagers()
    {
        return $this->model->where('manager_id', 0)->get();
    }

    public function storeEmployee($request)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move(public_path('uploads/'), $filename);
            $data['image'] = 'uploads/' . $filename;
        }

        if (!isset($data['manager_id']))
            $data['manager_id'] = 0;

        $data['password'] = Hash::make($data['password']);

        return $this->model->create($data);
    }

    public function updateEmployee($request, $employee)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {

            unlink('public/' . $employee->image);

            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move(public_path('uploads/'), $filename);
            $data['image'] = 'uploads/' . $filename;
        }

        if (!isset($data['manager_id']))
            $data['manager_id'] = 0;

        if ($data['password'])
            $data['password'] = Hash::make($data['password']);

        return $employee->update($data);
    }

    public function deleteEmployee($employee)
    {
        if ($employee->manager_id == 0) {
            $employee->employees()->update(['manager_id' => 0]);
        }
        $employee->delete();

    }
}