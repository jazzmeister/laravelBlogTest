<?php

class PostsController extends BaseController{

	/**
	 * Get the current user of the application.
	 *
	 * If the user is a guest, null should be returned.
	 *
	 * @param  int         $id
	 * @return mixed|null
	 */

	protected $post;
	

	public function __construct(Post $post)
	{
		$this->post = $post;
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//gets the logged in user ID and matches it to the User ID in the post table
		$id = Auth::user()->id;
		//echo $id;
        $posts = Post::where('user_id', '=', $id)->get();


        if (Auth::check())
        {


			return View::make('posts.index', compact('posts'));
    	}
    	else
    	{
    		return View::make('home.login');
    	}
	}



	public function showPosts()
	{
		
		$posts = Post::where('user_id', '>', 0)->get();

		return View::make('posts.allPosts', compact('posts'));

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create(){
		//gets the logged in user ID and matches it to the User ID in the post table
		$id = Auth::user()->id;
		if (Auth::check())
        {
			return View::make('posts.create');
    	}
    	else
    	{
    		return View::make('home.login');
    	}
    }

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();

		$v = Validator::make($input, Post::$rules);

		if ($v->passes())
		{
			$this->post->create($input);

			return Redirect::route('posts.index');
		}

		return Redirect::route('posts.create')
			->withInput()
			->withErrors($v)
			->with('message', 'There was a validation error');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		if (Auth::check())
        {
       	$post = $this->post->findOrFail($id);

        return View::make('posts.show', compact('post'));
    	}
    	else
    	{
    		return View::make('home.login');
    	}
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$post = $this->post->find($id);
		if (Auth::check())
		{
			if (is_null($post))
			{
				return Redirect::route('posts.index');
			}

        return View::make('posts.edit', compact('post'));
		}
		else
    	{
    		return View::make('home.login');
    	}
		
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$input = array_except(Input::all(), '_method');
		$v = Validator::make($input, Post::$rules);

		if ($v->passes())
		{
			$post = $this->post->find($id);
			$post->update($input);

			return Redirect::route('posts.show', $id);
		}

		return Redirect::route('posts.edit', $id)
			->withInput()
			->withErrors($v)
			->with('message', 'There was a validation error');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->post->find($id)->delete();

		return Redirect::route('posts.index');
	}

}


