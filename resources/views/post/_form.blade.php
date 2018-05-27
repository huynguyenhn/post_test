<div class="col-10">
	<div class="form-group">
		<div class="col-4">
			{!! Form::label('title', trans('post.title')) !!}
		</div>
		<div class="col-8">
			{!! Form::text('title', null, ['class' => 'form-control']) !!}
		</div>
	</div>
	<div class="form-group">
		<div class="col-4">
			{!! Form::label('content', trans('post.content')) !!}
		</div>
		<div class="col-8">
			{!! Form::textarea('content', null, ['class' => 'form-control', 'id' => 'content']) !!}
		</div>
	</div>
	<div class="form-group">
		{!! Form::submit(trans('app.save'), ['class' => 'btn btn-primary']) !!}
		{!! Form::reset(trans('app.cancel'), ['class' => 'btn btn-cancel']) !!}
	</div>
</div>