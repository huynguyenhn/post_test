@extends('layouts.app')

@section('content')
	<div class="container">
		<h3>{{ trans('user.profile') }}</h3>
		{!! Form::model($user, ['url' => action('UsersController@updateProfile'), 'method' => 'POST']) !!}
			@include('user._form')
		{!! Form::close() !!}
	</div>
@endsection