@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        {{ __('Employees') }}
                        <a class="btn btn-success pull-right" href="{{ route('employees.create') }}"> + Add</a>
                    </div>
                    <form action="" method="GET">
                        <div class="col-4">
                            <input type="text" name="search" class="form-control" placeholder="search"
                                value="{{ request()->search }}">
                            <button class="btn btn-primary" type="submit">Search</button>
                        </div>
                    </form>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">image</th>
                                        <th scope="col">First Name</th>
                                        <th scope="col">Last Name</th>
                                        <th scope="col">full Name</th>
                                        <th scope="col">salary</th>
                                        <th scope="col">manager</th>
                                        <th scope="col">actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($employees as $employee)
                                        <tr>
                                            <th scope="row">{{ $employee->id }}</th>
                                            <td><img src="{{ $employee->avatar }}" alt="HappyFace" width="70"
                                                    height="70"></td>
                                            <td>{{ $employee->first_name }}</td>
                                            <td>{{ $employee->last_name }}</td>
                                            <td>{{ $employee->full_name }}</td>
                                            <td>{{ $employee->salary }}</td>
                                            <td>{{ optional($employee->manager)->full_name }}</td>
                                            <td>
                                                <a class="btn btn-info"
                                                    href="{{ route('employees.edit', $employee->id) }}">Edit</a>

                                                <form action="{{ route('employees.destroy', $employee->id) }}"
                                                    method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button class="btn btn-danger" type="submit"
                                                        onclick="return confirm('Are you sure?');">Delete</button>
                                                </form>

                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                            @if ($employees->hasPages())
                                <div class="pagination-wrapper">
                                    {{ $employees->links('pagination::bootstrap-4') }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
