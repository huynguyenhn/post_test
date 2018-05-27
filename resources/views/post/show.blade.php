<div class="container">
	<div class="content-post">
		{!! $post->content_convert !!}
	</div>
	<div class="time">
		<p><strong>{{ trans('post.created_at') }}</strong>: {{ $post->created_at->format(config('post.date_format')) }}</p>
		<p><strong>{{ trans('post.updated_at') }}</strong>: {{ $post->updated_at->format(config('post.date_format')) }}</p>
	</div>
</div>
