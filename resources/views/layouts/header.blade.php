<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	{{-- Adding Bootstrap 5 --}}
	<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

	<title>{{$page_name}} - Sugar Tech Exam</title>
</head>
<body>

<!-- navigator bar -->
<nav class="navbar navbar-expand-lg sticky-top navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{ route('dashboard') }}">Employee CRUD</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link {{ $page_name ==  'Dashboard' ? 'active' : ''  }}" aria-current="page" href="{{ route('dashboard') }}">Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ $page_name ==  'Employees' ? 'active' : ''  }}" href="{{ route('employees') }}">Employees</a>
        </li>
      </ul>
      <div class="d-flex">
        <a href="{{ route('logout') }}"><button class="btn btn-danger btn-sm">Logout</button></a>
      </div>
    </div>
  </div>
</nav>
