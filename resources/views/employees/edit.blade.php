@extends('layouts.main')

@section('content')
    <div class="container-fluid mt-3">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 mt-4 mb-2">
                    <h3 style="text-transform: uppercase; font-weight: bolder;">Edit Employee</h3>
                </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <form method="POST" action="{{ route('edit_employee', $id) }}">
                        @csrf
                        {{ $employee }}
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection