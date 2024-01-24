@extends('layouts.main')

@section('content')
    <div class="container-fluid mt-3">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 mt-4 mb-2">
                    <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                            <h3 style="text-transform: uppercase; font-weight: bolder;">Employee List</h3>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                            <a href="{{ route('add_employee') }}">
                                <button class="btn btn-sm btn-success" style="float: right;">Add</button>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    @if(session('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" width="100%">
                            <thead>
                                <tr>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Gender</th>
                                    <th>Birthday</th>
                                    <th>Monthly Salary</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($employees) > 0)
                                    @foreach ($employees as $employee)
                                        <tr>
                                            <td>{{ $employee->first_name }}</td>
                                            <td>{{ $employee->last_name }}</td>
                                            <td>{{ $employee->gender }}</td>
                                            <td>{{ date('F d, Y', strtotime($employee->birthdate)) }}</td>
                                            <td>₱ {{ number_format($employee->monthly_salary, 2, '.', ',') }}</td>
                                            <td>
                                                <a href="{{ route('edit_employee', $employee->id) }}">
                                                    <button class="btn btn-sm btn-success">Edit</button>
                                                </a>
                                                <a href="{{ route('delete_employee', $employee->id) }}" onclick="return confirm('are you sure you want to delete this employee?')">
                                                    <button class="btn btn-sm btn-danger">Delete</button>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="6" class="text-center">No result found.</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection