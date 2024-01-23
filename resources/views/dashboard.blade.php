@extends('layouts.main')

@section('content')
    <div class="container-fluid mt-3">
        @if($user->username)
            <div class="alert alert-success">
                Welcome Back, {{ ucwords($user->username) }}
            </div>
        @endif
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
                    <div class="card text-dark bg-light mb-3">
                        <div class="card-header" style="font-weight: bolder; text-transform: uppercase;">
                            Count of Male & Female employees
                        </div>
                        <div class="card-body">
                            @if (count($gender_count) > 0)
                                <ul>
                                @foreach ($gender_count as $item)
                                    <li>{{ $item->gender }} - {{ $item->count }}</li>
                                @endforeach
                                <ul>
                            @else
                            No record found.
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
                    <div class="card text-dark bg-light mb-3">
                        <div class="card-header" style="font-weight: bolder; text-transform: uppercase;">
                            Average age of all employees
                        </div>
                        <div class="card-body">
                            @if (count($gender_count) > 0)
                                <ul>
                                @foreach ($gender_count as $item)
                                    <li>{{ $item->gender }} - {{ $item->count }}</li>
                                @endforeach
                                <ul>
                            @else
                            No record found.
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
                    <div class="card text-dark bg-light mb-3">
                        <div class="card-header" style="font-weight: bolder; text-transform: uppercase;">
                            Total monthly salary of all employees
                        </div>
                        <div class="card-body">
                            @if ($sum_all_monthly_salary->total_monthly_salary)
                                ₱ {{ $sum_all_monthly_salary->total_monthly_salary }}
                            @else
                            No record found.
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection