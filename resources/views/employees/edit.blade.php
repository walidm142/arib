@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        {{ __('Create New') }}
                    </div>
                    @include('includes.validation')

                    <div class="card-body">
                        <form action="{{ route('employees.update', $employee->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="row">
                                <div class="col-6 mb-3">
                                    <label for="validationDefault01">first name</label>
                                    <input type="text" name="first_name" class="form-control" id="validationDefault01"
                                        placeholder="First name" value="{{ old('first_name', $employee ?? $employee->first_name) }}" required>
                                </div>
                                <div class="col-6 mb-3">
                                    <label for="validationDefault02">last name</label>
                                    <input type="text" name="last_name" class="form-control" id="validationDefault02"
                                        placeholder="last name" value="{{ old('last_name', $employee ?? $employee->last_name) }}" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6 mb-3">
                                    <label for="email">email</label>
                                    <input type="email" name="email" class="form-control" id="email"
                                        placeholder="Email" value="{{ old('email', $employee ?? $employee->email) }}" required>
                                </div>
                                <div class="col-6 mb-3">
                                    <label for="password">password</label>
                                    <input type="password" name="password" class="form-control" id="password"
                                        placeholder="password" value="{{ old('password') }}" autocomplete="off">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6 mb-3">
                                    <label for="salary">salary</label>
                                    <input type="text" name="salary" class="form-control" id="salary"
                                        placeholder="salary" value="{{ old('salary' , $employee ?? $employee->salary) }}" required>
                                </div>
                                <div class="col-6 mb-3">
                                    <label for="image">image</label>
                                    <input type="file" name="image" class="form-control" id="image"
                                        placeholder="last name">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6 mb-3">
                                    <label for="manager">manager</label>
                                    <select name="manager_id" id="manager" class="form-control">
                                        <option value="">Select Manger</option>
                                        @if ($managers)
                                            @foreach ($managers as $manager)
                                                <option value="{{ $manager->id }}" {{ $employee->manager_id == $manager->id ? 'selected': '' }}>{{ $manager->full_name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="col-6 mb-3">
                                    <label for="department">Department</label>
                                    <select name="department_id" id="manager" class="form-control">
                                        <option value="">Select Department</option>
                                        @if ($departments)
                                            @foreach ($departments as $department)
                                                <option value="{{ $department->id }}" {{ $employee->department_id == $department->id ? 'selected': '' }}>{{ $department->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
