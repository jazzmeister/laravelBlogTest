@extends('layouts.master')

@section('content')

<div class="span8 well">
	<h4>{{ ucwords(Auth::user()->username) }}</h4>
</div>



@stop