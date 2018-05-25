<?php 

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class BaseController extends Controller
{
	protected $viewData;
	public function __construct()
	{
		$this->viewData = [];
	}
}