<div class="col-xs-10">
	<div class="form-group">
		<div class="col-xs-4">
			{!! Form::label('name', trans('user.name')) !!}
		</div>
		<div class="col-xs-8">
			{!! Form::text('name', null, ['class' => 'form-control']) !!}
		</div>
	</div>
	<div class="form-group">
		<div class="col-xs-4">
			{!! Form::label('email', trans('user.email')) !!}
		</div>
		<div class="col-xs-8">
			{!! Form::text('email', null, ['class' => 'form-control']) !!}
		</div>
	</div>
	<div class="form-group">
		<div class="col-xs-4">
			{!! Form::label('password', trans('user.password')) !!}
		</div>
		<div class="col-xs-8">
			{!! Form::password('password', ['class' => 'form-control']) !!}
		</div>
	</div>
	<div class="form-group">
		<div class="col-xs-4">
			{!! Form::label('password', trans('user.confirm_password')) !!}
		</div>
		<div class="col-xs-8">
			{!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
		</div>
	</div>
	<div class="form-group">
		{!! Form::submit(trans('app.save'), ['class' => 'btn btn-primary']) !!}
		{!! Form::reset(trans('app.cancel'), ['class' => 'btn btn-cancel']) !!}
	</div>
</div>