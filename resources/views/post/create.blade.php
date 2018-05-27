@extends('layouts.app')

@section('content')
	<div class="container">
		<h3>{{ trans('post.create') }}</h3>
		{!! Form::open(['url' => action('PostsController@store'), 'method' => 'POST']) !!}
			@include('post._form')
		{!! Form::close() !!}
	</div>
@endsection