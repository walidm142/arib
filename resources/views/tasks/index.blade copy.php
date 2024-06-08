@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        {{ __('Tasks') }}
                        <a class="btn btn-success pull-right" href="{{ route('tasks.create') }}"> + Add</a>
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
                                        <th scope="col">Task</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Employee</th>
                                        <th scope="col">actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tasks as $task)
                                        <tr>
                                            <th scope="row">{{ $task->id }}</th>
                                            <td>{{ $task->task }}</td>
                                            <td>{{ $task->status }}</td>
                                            <td>{{ optional($task->employee)->name }}</td>
                                            <td>
                                                <a class="btn btn-info"
                                                    href="{{ route('tasks.edit', $task->id) }}">Edit</a>

                                                <form action="{{ route('tasks.destroy', $task->id) }}"
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
                            @if ($tasks->hasPages())
                                <div class="pagination-wrapper">
                                    {{ $tasks->links('pagination::bootstrap-4') }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
