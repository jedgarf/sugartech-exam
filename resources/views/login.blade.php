<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	{{-- Custom Styles --}}
	<link rel="stylesheet" href="{{ asset('css/custom_styles.css') }}">
	{{-- Adding Bootstrap 5 --}}
	<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

	<title>Login - Sugar Tech Exam</title>
</head>
<body>

{{-- login form --}}
<div class="login-page">
	<div class="login-container">
		<div class="login-card">
	        <h2 style="font-weight: bolder;">SugarTech Mini Project Exam</h2>
	        @if(session('loginMsg'))
			    <div class="alert alert-success">
			        {{ session('loginMsg') }}
			    </div>
			@endif
	        <form method="POST" action="{{ route('auth') }}">
	        	@csrf
	            <div class="form-floating mb-3">
	                <input type="text" class="form-control form-control-sm" id="username" name="username" placeholder="username">
	                <label for="floatingEmail">Username</label>
	            </div>
	            <div class="form-floating mb-3">
	                <input type="password" class="form-control form-control-sm" id="password" name="password" placeholder="password">
	                <label for="floatingPassword">Password</label>
	            </div>
	            <button type="submit" class="btn btn-primary">Login</button>
	        </form>
	    </div>
	</div>
</div>
{{-- end of login form --}}


{{-- Adding Bootstrap 5 JS files --}}
<script type="text/javascript" src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

</body>
</html>