<?php

namespace App\Models;

class Post extends BaseModel
{

	public function __construct(array $attributes = [])
	{
		$this->fields = array_merge($this->fillable, ['id']);
		parent::__construct($attributes);
	}

	protected $fillable = [
		'title',
		'content',
		'user_id',
		'active',
	];

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}

