<?php

namespace App\Http\Controllers;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Requests\ProfileUpdateRequest;
use App\Services\UserService;

class UsersController extends BaseController
{
	private $service;
	public function __construct(UserService $userService)
	{
		parent::__construct();
		$this->service = $userService;
	}

	public function profile()
	{
		return view('user.profile', ['user' => auth()->user()]);
	}

	public function updateProfile(ProfileUpdateRequest $request)
	{
		$params = $request->only('name', 'email', 'password');
		if (empty($params['password'])) {
			unset($params['password']);
		}

		if ($this->service->update($params, auth()->user()->id)) {
			return redirect()->action('UsersController@profile')->with(['message' => trans('app.success')]);
		}

		return redirect()->action('UsersController@profile')->withErrors(['error' => trans('app.fail')]);
	}
}