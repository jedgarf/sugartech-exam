@extends('layouts.main')

@section('content')
    <div class="container-fluid mt-3">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 mt-4 mb-2">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <h3 style="text-transform: uppercase; font-weight: bolder;">Edit Employee</h3>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <a href="{{ route('employees') }}">
                                <button type="button" class="btn btn-sm btn-success" style="float: right;">Employee List</button>
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
                    <form method="POST" action="{{ route('update_employee', $id) }}">
                        @csrf
                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                <div class="mb-3">
                                    <label for="first-name" class="form-label">First Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="first-name" name="first_name" aria-describedby="firstNameError" value="{{ old('first_name', $employee->first_name) }}">
                                    <div id="firstNameError" class="form-text text-danger">{{ $errors->first('first_name') }}</div>
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                <div class="mb-3">
                                    <label for="last-name" class="form-label">Last Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="last-name" name="last_name" aria-describedby="lastNameError" value="{{ old('last_name', $employee->last_name) }}">
                                    <div id="lastNameError" class="form-text text-danger">{{ $errors->first('last_name') }}</div>
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                <div class="mb-3">
                                    <label for="gender" class="form-label">Gender <span class="text-danger">*</span></label>
                                    <select class="form-control" id="gender" name="gender" aria-describedby="genderError">
                                        <option value="">-- Select --</option>
                                        <option value="MALE" {{ old('gender', $employee->gender) == 'MALE' ? 'selected' : '' }}>Male</option>
                                        <option value="FEMALE" {{ old('gender', $employee->gender) == 'FEMALE' ? 'selected' : '' }}>Female</option>
                                    </select>
                                    <div id="genderError" class="form-text text-danger">{{ $errors->first('gender') }}</div>
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                <div class="mb-3">
                                    <label for="birthday" class="form-label">Birthday <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control" id="birthday" name="birthdate" max="{{ date('Y-m-d', strtotime('now')) }}" aria-describedby="birthdayError" value="{{ old('birthdate', $employee->birthdate) }}">
                                    <div id="birthdayError" class="form-text text-danger">{{ $errors->first('birthdate') }}</div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="mb-3">
                                    <label for="monthly-salary" class="form-label">Monthly Salary <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon1">₱</span>
                                        <input type="text" class="form-control" id="monthly-salary" name="monthly_salary" aria-describedby="monthlySalaryError" value="{{ old('monthly_salary', $employee->monthly_salary) }}">
                                    </div>
                                    <div id="monthlySalaryError" class="form-text text-danger">{{ $errors->first('monthly_salary') }}</div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <button type="submit" class="btn btn-sm btn-primary" style="float: right;">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection