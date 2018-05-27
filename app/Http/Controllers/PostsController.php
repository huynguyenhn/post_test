<?php

namespace App\Http\Controllers;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Services\PostService;

class PostsController extends BaseController
{
	private $service;
	public function __construct(PostService $postService)
	{
		parent::__construct();
		$this->service = $postService;
	}

	public function index(Request $request)
	{
		$posts = $this->service->search($request->all(), auth()->user());

		return view('post.index', compact('posts'));
	}

	public function create()
	{
		return view('post.create');
	}

	public function store(CreatePostRequest $request)
	{
		$post = $request->all();
		$post['user_id'] = auth()->user()->id;
		if ($this->service->create($post)) {
			return redirect()->action('PostsController@index')->with(['message' => trans('app.success')]);
		}

		return redirect()->action('PostsController@index')->withErrors(['error' => trans('app.fail')]);
	}

	public function edit($id)
	{
		if (!$post = $this->service->check($id, auth()->user())) {
			return redirect()->action('PostsController@index')->withErrors(['error' => trans('app.edit_error')]);
		}

		return view('post.edit', compact('post'));
	}

	public function update(UpdatePostRequest $request, $id)
	{
		if (!$post = $this->service->check($id, auth()->user())) {
			return redirect()->action('PostsController@index')->withErrors(['error' => trans('app.edit_error')]);
		}

		if ($this->service->update($request->all(), $id)) {
			return redirect()->action('PostsController@index')->with(['message' => trans('app.success')]);
		}

		return redirect()->action('PostsController@index')->withErrors(['error' => trans('app.fail')]);
	}

	public function show($id)
	{
		if ($post = $this->service->find($id)) {
			return [
				'success' => true,
				'data' => view('post.show', compact('post'))->render(),
				'title' => $post->title,
			];
		}

		return ['success' => false];
	}

	public function active($id)
	{
		if ($this->service->active($id, auth()->user())) {
			return redirect()->action('PostsController@index')->with(['message' => trans('app.success')]);
		}

		return redirect()->action('PostsController@index')->withErrors(['error' => trans('app.fail')]);
	}
}