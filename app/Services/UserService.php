<?php

namespace App\Services;

use App\Models\User;

class UserService extends BaseService
{
	public function __construct(User $user)
	{
		parent::__construct();
		$this->model = $user;
	}
}