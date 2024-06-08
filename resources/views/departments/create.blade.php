@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        {{ __('Create New') }}
                    </div>

                    <div class="card-body">
                        <form action="{{ route('departments.store') }}" method="POST">
                            @csrf
                            <div class="form-row">
                                <div class="col-md-4 mb-3">
                                    <label for="validationDefault01">Department name</label>
                                    <input type="text" name="name" class="form-control" id="validationDefault01"
                                        placeholder="Department name" value="{{ old('name') }}" required>
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
