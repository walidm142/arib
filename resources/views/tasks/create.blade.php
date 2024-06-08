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
                        <form action="{{ route('tasks.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-4 mb-3">
                                    <label for="task">task</label>
                                    <input type="text" name="task" class="form-control" id="task"
                                        placeholder="task" value="{{ old('task') }}" required>
                                </div>
                                <div class="col-4 mb-3">
                                    <label for="employee">employee</label>
                                    <select name="employee_id" id="employee" class="form-control">
                                        <option value="">Select employee</option>
                                        @if ($employees)
                                            @foreach ($employees as $employee)
                                                <option value="{{ $employee->id }}">{{ $employee->full_name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>

                                <div class="col-4 mb-3">
                                    <label for="status">status</label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="0">In active</option>
                                        <option value="1">Active</option>
                            
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
