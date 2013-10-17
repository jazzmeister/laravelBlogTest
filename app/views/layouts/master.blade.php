<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/css/bootstrap-combined.min.css" rel="stylesheet">
	<style>
		table form { margin-bottom: 0;}
		form ul { margin-left: 0; list-style: none;}
		.error { color: red; font-style: italic;}
		body { padding-top: 0px;}
	</style>
</head>
<body>
	<div class="row-fluid">
		<div class="span12 well">
			<h1>Some Website</h1>
		</div>
	</div>
		<div class="container">
			@if (Session::has('message'))
				<div class="flash alert">
					<p>{{ Session::get('message') }}</p>
				</div>
			@endif
		</div>
	

	<div class="rowfluid">
		<div class="span3">
			<ul class="nav nav-list well">
				@if(Auth::user())
				<li class="nav-header">{{ ucwords(Auth::user()->username) }}</li>
				<li>{{ HTML::link('allPosts', 'View All Posts') }}</li>
				<li>{{ HTML::link('posts', 'View/Manage My Posts') }}</li>
				<li>{{ HTML::link('posts/create', 'Add Post') }}</li>
				
				<li>{{ HTML::link('logout', 'Logout') }}</li>
				@else
				<li>{{ HTML::link('login', 'Login') }}</li>
				<li>{{ HTML::link('allPosts', 'View All Posts') }}</li>
				@endif
			</ul>
		</div>
		<div class="span9">
			@yield('content')
		</div>
	</div>
</body>
</html>
