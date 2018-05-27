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

	public function search($conditions)
	{
		return $this->model->paginate(config('post.limit'));
	}

	public function check($id, $user)
	{
		$post = $this->model->find($id);
		if (!$user->isAdmin() && $user->id != $post->user_id) {
			return false;
		}

		return $post;
	}
}