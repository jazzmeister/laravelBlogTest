@extends('layouts.master')

@section('content')

<h1>All Posts</h1>

<p>{{ link_to_route('posts.create', 'Add new Post') }}</p>

@if ($posts->count())
	<table class="table table-striped table-bordered table-hover">
		<thead>
			<tr>
				<th>Author</th>
				<th>Title</th>
				<th>Body</th>
			</tr>
		</thead>

		<tbody>
			@foreach($posts as $post)
			<tr>
				<td>{{ $post->author }}</td>
				<td>{{ $post->title }}</td>
				<td>{{ $post->body }}</td>
				<td>{{ link_to_route('posts.show', 'Show', array($posts->id), array('class' => 'btn btn-primary')) }}</td>
				<td>{{ link_to_route('posts.edit', 'Edit', array($posts->id), array('class' => 'btn btn-info'))}}</td>
				<td>
					{{ Form::open(array('method' => 'DELETE', 'route' => array('posts.destroy', $post->id)))}}
						{{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
					{{ Form::close() }}
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no posts
@endif


@stop 