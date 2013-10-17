@extends('layouts.master')

@section('content')

<h1>All Posts</h1>



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
				
				
			</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no posts
@endif


@stop