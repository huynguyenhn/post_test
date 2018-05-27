@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-7">
				<h3>{{ trans('post.index') }}</h3>
			</div>
			<div class="col-4 text-right">
				@if (auth()->user())
					{!! link_to_action('PostsController@create', trans('post.create'), null, ['class' => 'btn btn-primary']) !!}
				@endif
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<table class="table">
					<thead>
						<tr>
							<td>{{ trans('post.id') }}</td>
							<td>{{ trans('post.title') }}</td>
							<td>{{ trans('post.created_at') }}</td>
							<td>{{ trans('post.updated_at') }}</td>
							<td>{{ trans('app.action') }}</td>
						</tr>
					</thead>
					<tbody>
						@forelse($posts as $post)
							@include('post._item', ['item' => $post])
						@empty
							<tr>
								<td colspan="5">{{ trans('app.not_found') }}</td>
							</tr>
						@endforelse
					</tbody>
				</table>
			</div>
		</div>
		<div class="row">
			{!! $posts->links() !!}
			<span class="results">{{ trans('app.paginte', ['page' => $posts->currentPage(), 'total' => $posts->lastPage()]) }}</span>
		</div>
	</div>
	@include('post._modal')
@endsection

@push('scripts')
	<script type="text/javascript">
		$(document).ready(function () {
			$('.show-info').click(function () {
				infoUrl = $(this).data('url');
				$.ajax({
					url: infoUrl,
					success: function (response) {
						if (response.success) {
							$('#contentModal #postTitle').html(response.title);
							$('#contentModal .modal-body').html(response.data);
							$('#contentModal').modal('show');
						}
					}
				});
			});
		});
	</script>
@endpush