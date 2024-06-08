@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header">

                        <form action="" method="GET">
                            <div class="row">
                                <div class="col-4">
                                    {{ __('Department') }}
                                    <a class="btn btn-success float-right" href="{{ route('departments.create') }}"> +
                                        Add</a>
                                </div>
                                <form action="" method="GET">
                                    <div class="col-4">
                                        <input type="text" name="name" class="form-control" placeholder="name"
                                            value="{{ request()->name }}">
                                        <button class="btn btn-primary" type="submit">Search</button>
                                    </div>
                                </form>

                            </div>


                        </form>
                    </div>
                    @include('includes.messgaes')

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">name</th>
                                        <th scope="col">Employee count</th>
                                        <th scope="col">Employee total salary</th>
                                        <th scope="col">actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($departments as $department)
                                        <tr>
                                            <th scope="row">{{ $department->id }}</th>
                                            <td>{{ $department->name }}</td>
                                            <td>{{ $department->employees()->count() }}</td>
                                            <td>{{ $department->employees()->sum('salary') }}</td>
                                            <td>

                                                <a class="btn btn-info"
                                                    href="{{ route('departments.edit', $department->id) }}">Edit</a>
                                                    <form action="{{ route('departments.destroy', $department->id) }}"
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
                            @if ($departments->hasPages())
                                <div class="pagination-wrapper">
                                    {{ $departments->links('pagination::bootstrap-4') }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
