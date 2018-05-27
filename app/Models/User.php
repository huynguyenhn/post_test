<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Hash;

class User extends BaseModel implements
	AuthenticatableContract,
	CanResetPasswordContract,
	AuthorizableContract
{
	use Authenticatable, CanResetPassword, Authorizable;

	public function __construct(array $attributes = [])
	{
		$this->fields = array_merge($this->fillable, ['id']);
		parent::__construct($attributes);
	}

	protected $fillable = [
		'name',
		'email',
		'password',
	];

	protected $hidden = [
		'password',
		'remember_token',
	];

	public function setPasswordAttribute ($value)
	{
		$this->attributes['password'] = Hash::make($value);
	}

	public function posts()
	{
		return $this->hasMany(Post::class);
	}

	public function isAdmin()
	{
		return $this->is_admin;
	}
}

