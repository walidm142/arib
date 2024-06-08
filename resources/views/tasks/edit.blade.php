@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        {{ __('update') }}
                    </div>
                    @include('includes.validation')

                    <div class="card-body">
                        <form action="{{ route('tasks.update',$task->id) }}" method="POST" enctype="multipart/form-data">
                           @method('PUT')
                            @csrf
                            <div class="row">
                                <div class="col-4 mb-3">
                                    <label for="task">task</label>
                                    <input type="text" name="task" class="form-control" id="task"
                                        placeholder="task" value="{{ old('task', $task ?? $task->task) }}" required>
                                </div>
                                <div class="col-4 mb-3">
                                    <label for="employee">employee</label>
                                    <select name="employee_id" id="employee" class="form-control">
                                        <option value="">Select employee</option>
                                        @if ($employees)
                                            @foreach ($employees as $employee)
                                                <option value="{{ $employee->id }}"
                                                    {{ $task->employee_id == $employee->id ? 'selected' : '' }}>
                                                    {{ $employee->full_name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>

                                <div class="col-4 mb-3">
                                    <label for="status">status</label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="0"{{ $task->status == 0 ? 'selected' : '' }}>In active</option>
                                        <option value="1"{{ $task->status == 1 ? 'selected' : '' }}>Active</option>

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
