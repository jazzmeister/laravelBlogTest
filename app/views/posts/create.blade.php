@extends('layouts.master')

@section('content')

<h1>Create Post</h1>

{{ Form::open(array('route' => 'posts.store')) }}
<ul>
	<li>
		{{ Form::label('author', 'Author: '. Auth::user()->username ) }}
		
		{{ Form::hidden('author', Auth::user()->username) }}
		
	</li>
	<li>
		{{ Form::label('title', 'Title:') }}
		{{ Form::text('title') }}
	</li>
	<li>
		{{ Form::hidden('user_id', Auth::user()->id) }}
	</li>

	<li> 
		{{ Form::label('body', 'Body:') }}
		{{ Form::textarea('body') }}
	</li>
	<li>
		{{ Form::submit('Submit', array('class' => 'btn-info')) }}
	</li>
</ul>
{{ Form::close() }}

@if($errors->any())
<ul>
	{{ implode('', $errors->all('<li class="error">:message</li>')) }}
</ul>
@endif

@stop