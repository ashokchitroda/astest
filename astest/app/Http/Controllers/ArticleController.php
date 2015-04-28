<?php

namespace articles\Http\Controllers;

//use Illuminate\Support\Facades\Input;
use articles\Http\Requests\ArticleRequest;
use PhpParser\Node\Name;
use PhpParser\Builder\Namespace_;
use articles\Article;
use View;
use Validator;
use Redirect;
use Input;
use Session;

class ArticleController extends Controller {
	
	/**
	 * List of articles.
	 *
	 * @return Response
	 */
	public function index()
	{
		//return view('articles.index');
		$article = Article::all();
		
		return View::make('articles.index')
			->with('articles', $article);
	}
	
	/**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
    	//return view('articles.create');
    	return View::make('articles.create');
    }
    
    
    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
    	$rules = array(
    		'title'       => 'required|min:3|max:50',
    		'description'      => 'required|min:10|max:500'
    	);
    	
    	$validator = Validator::make(Input::all(), $rules);
    	
    	// process the login
    	if ($validator->fails()) {
    		return Redirect::to('articles/create')
    			->withErrors($validator)
    			->withInput(Input::except('password'));
    	} else {
    		// store
    		$article = new Article;
    		$article->title       = Input::get('title');
    		$article->description = Input::get('description');
    		$article->save();
    
    		// redirect
    		Session::flash('message', 'Successfully created article!');
    		return Redirect::to('articles');
    	}
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
    	$article = Article::find($id);
    
    	return View::make('articles.show')
    		->with('article', $article);
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
    	// get the article
    	$article = Article::find($id);
    
    	// show the edit form and pass the article
    	return View::make('articles.edit')
    		->with('article', $article);
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
    	// validate
    	// read more on validation at http://laravel.com/docs/validation
    	$rules = array(
	    	'title'       => 'required|min:3|max:50',
    		'description'      => 'required|min:10|max:500'
    	);
    	
    	$validator = Validator::make(Input::all(), $rules);
    
    	// process the login
    	if ($validator->fails()) {
    		return Redirect::to('articles/' . $id . '/edit')
    			->withErrors($validator)
    			->withInput(Input::except('password'));
    	} else {
    		// store		
    		$article = Article::find($id);
    		$article->title       = Input::get('title');
    		$article->description = Input::get('description');
    		$article->save();
    
    		// redirect
    		Session::flash('message', 'Successfully updated article!');
    		return Redirect::to('articles');
    	}
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
    	// delete
    	$article = Article::find($id);
    	$article->delete();
    
    	// redirect
    	Session::flash('message', 'Successfully deleted the article!');
    	return Redirect::to('articles');
    }
    
    
}
