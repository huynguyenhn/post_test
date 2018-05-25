<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
	protected $fields;
	protected $fieldNames;
	protected $sortName;

	public function __construct(array $attributes = [])
	{
		parent::__construct($attributes);

		$this->setSortName();
		$this->setFieldNames();
	}

	protected function setFieldNames()
	{
		if (!isset($this->fields)) {
			$this->fields = $this->fillable;
		} else {
			foreach ($this->fields as $field) {
				$this->fieldNames[$field] = trans(snake_case($this->sortName) . '.' . $field);
			}
		}
	}

	protected function setSortName()
	{
		$path = explode('\\', get_class($this));
		$this->sortName = array_pop($path);
	}

	public function getFieldNames()
	{
		return $this->fieldNames;
	}
}