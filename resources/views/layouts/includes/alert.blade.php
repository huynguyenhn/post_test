@if (session()->has('message') || $errors->any())
	<div id="alert-message">
		<div class="alert {{ session()->has('message') ? 'alert-success' : 'alert-danger' }}">
			<button type="button" class="close" adta-dismiss="alert"><span>&times;</span></button>
			@if (session()->has('message'))
				<p>{!! session('message') !!}</p>
			@endif
			@if ($errors->any())
				@foreach ($errors->getMessages() as $message)
					<p>{!! $message[0] !!}</p>
				@endforeach
			@endif
		</div>
	</div>
@endif