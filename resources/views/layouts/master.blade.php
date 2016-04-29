<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>blog - @yield('title') </title>
	<!-- import icon font-awesome-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
	<!--Import Google Icon Font-->
	<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<!--Importmain.css-->
	<link href="{{asset('css/blog.css')}}" rel="stylesheet">
	<!-- Compiled and minified CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css">
	<!--Let browser know website is optimized for mobile-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body id="app-layout">

<!-- nav -->
<nav class="header">
	<div class="nav-wrapper">
		<a href="{{route('home')}}" class="brand-logo pink-text left upper">&nbsp;Blog</a>
		<ul id="nav-mobile" class="right hide-on-med-and-down">
			<!-- Authentication Links -->
			@if (Auth::guest())
				<li><a class="upper green" href="{{route('articles.create')}}"><i class="fa fa-btn fa-plus"></i> Ajouter article</a></li>
				<li><a class="upper" href="{{url('/auth/login')}}"><i class="fa fa-btn fa-sign-in"></i> Login</a></li>
				{{--<li><a class="upper" href="{{url('/auth/register')}}">Register</a></li>--}}
			@else
				<li><a class="upper cyan-text" href="{{route('dashboard')}}"><i class="fa fa_btn fa-tachometer"></i> Dashboard</a></li>
				<li><a class="upper white black-text " href="#"><i class="fa fa-user"></i> {{Auth::user()->name}}</a>
				<li><a class="upper " href="{{url('/auth/logout')}}"><i class="fa fa-btn fa-sign-out"></i> Logout</a></li>
			@endif
		</ul>
	</div>
</nav>

	<!-- bloc content -->
		@yield('content')
	<!-- end bloc content -->

<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<!--link file js personnel -->
<script src="{{asset('js/blog.js')}}"></script>
<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>
</body>
</html>