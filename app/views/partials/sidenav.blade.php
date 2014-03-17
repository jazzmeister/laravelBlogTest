<div>
	<ul class="nav nav-list well">
				@if(Auth::user())
				<li class="nav-header">{{ ucwords(Auth::user()->username) }}</li>
				<li>{{ HTML::link('/', 'Home') }}</li>
				<li>{{ HTML::link('allPosts', 'View All Posts') }}</li>
				<li>{{ HTML::link('posts', 'View/Manage My Posts') }}</li>
				<li>{{ HTML::link('posts/create', 'Add Post') }}</li>
				
				<li>{{ HTML::link('logout', 'Logout') }}</li>
				@else
				<li>{{ HTML::link('/', 'Home') }}</li>
				<li>{{ HTML::link('login', 'Login') }}</li>
				<li>{{ HTML::link('allPosts', 'View All Posts') }}</li>
				@endif
			</ul>
		</div>