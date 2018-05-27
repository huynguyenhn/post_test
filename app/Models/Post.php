<?php

namespace App\Models;
use Markdown;

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
		'content_convert',
		'user_id',
		'active',
	];

	protected static function boot()
	{
		parent::boot();

		static::saving(function ($model) {
			$model->content_convert = Markdown::convertToHtml($model->content);
		});
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}

