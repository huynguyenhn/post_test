<tr>
	<td>{{ $item->id }}</td>
	<td>{{ $item->title }}</td>
	<td>{{ $item->created_at->format(config('post.date_format')) }}</td>
	<td>{{ $item->updated_at->format(config('post.date_format')) }}</td>
	<td>
		@if (auth()->user() && auth()->user()->id == $item->user_id)
			{!! link_to_action('PostsController@edit', trans('app.edit'), ['post' => $item->id], ['class' => 'btn btn-info']) !!}
		@endif
		<a href="javascript:;" data-url="{{ action('PostsController@show', [$item->id]) }}" class="btn btn-info show-info">{{ trans('app.show') }}</a>
		@if (auth()->user() && auth()->user()->isAdmin())
			@if (!$item->active)
				{!! link_to_action('PostsController@active', trans('app.active'), ['post' => $item->id], ['class' => 'btn btn-info']) !!}
			@endif
		@endif
	</td>
</tr>