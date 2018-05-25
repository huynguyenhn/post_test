<?php

namespace App\Services;

class BaseService
{
	protected $model;

	public function __construct()
	{

	}

	public function create($params)
	{
		return $this->model->create($params);
	}

	public function update($params, $id)
	{
		return $this->model->find($id)->update($params);
	}

	public function delete($id)
	{
		return $this->model->find($id)->delete();
	}
}