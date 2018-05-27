@extends('layouts.app')

@section('content')
	<div class="container">
		<h3>{{ trans('post.update') }}</h3>
		{!! Form::model($post, ['url' => action('PostsController@update', [$post->id]), 'method' => 'PUT']) !!}
			@include('post._form')
		{!! Form::close() !!}
	</div>
@endsection