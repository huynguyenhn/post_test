<?php

namespace App\Services;

use App\Models\Post;

class PostService extends BaseService
{
	public function __construct(Post $post)
	{
		parent::__construct();
		$this->model = $post;
	}

	public function search($conditions, $user)
	{
		$posts = $this->model->newQuery();
		if (!$user || !$user->isAdmin()) {
			$posts->orWhere('active', true);
			$posts->orWhere('user_id', $user ? $user->id : null);
		}

		return $posts->paginate(config('post.limit'));
	}

	public function check($id, $user)
	{
		$post = $this->model->find($id);
		if (!$user->isAdmin() && $user->id != $post->user_id) {
			return false;
		}

		return $post;
	}

	public function active($id, $user)
	{
		if (!$user || !$user->isAdmin()) {
			return false;
		}

		parent::update(['active' => true], $id);

		return true;
	}
}