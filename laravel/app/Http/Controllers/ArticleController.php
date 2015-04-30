<?php

namespace articles\Http\Controllers;

//use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
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
	 * @param  Illuminate\Http\Request $request
	 * @return Response
	 */
	public function index(Request $request)
	{
		$article = Article::all();
		
		return View::make('articles.index')
			->with('articles', $article);
	}
	
	/**
	 * List of articles.
	 *
	 * @param  Illuminate\Http\Request $request
	 * @return Response
	 */
	public function listing(Request $request)
	{
		if(!$request->ajax()) {
			return Redirect::to('articles');
		}
		
		$article = Article::all();
	
		return View::make('articles.listing')
			->with('articles', $article);
	}
	
	/**
     * Show the form for creating a new resource.
     *
     * @param  Illuminate\Http\Request $request
     * @return Response
     */
    public function create(Request $request)
    {
    	if(!$request->ajax()) {
			return Redirect::to('articles');
		}
		
    	return View::make('articles.create');
    }
    
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  Illuminate\Http\Request $request
     * @return Response
     */
    public function store(Request $request)
    {
    	if(!$request->ajax()) {
    		return Redirect::to('articles');
    	}
    	
    	$rules = array(
    		'title'       => 'required|min:3|max:50',
    		'description'      => 'required|min:10|max:500'
    	);
    	
    	$validator = Validator::make(Input::all(), $rules);
    	
    	// process the login
    	if ($validator->fails()) {
    		//return Redirect::to('articles/create')
    		return View::make('articles.create')
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
    		return Redirect::action('ArticleController@listing');
    	}
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @param  Illuminate\Http\Request $request
     * @return Response
     */
    public function show($id, Request $request)
    {
    	if(!$request->ajax()) {
    		return Redirect::to('articles');
    	}
    	
    	$article = Article::find($id);
    
    	return View::make('articles.show')
    		->with('article', $article);
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @param  Illuminate\Http\Request $request
     * @return Response
     */
    public function edit($id, Request $request)
    {
    	if(!$request->ajax()) {
    		return Redirect::to('articles');
    	}
    	
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
     * @param  Illuminate\Http\Request $request
     * @return Response
     */
    public function update($id, Request $request)
    {
    	if(!$request->ajax()) {
    		return Redirect::to('articles');
    	}
    	
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
    		return Redirect::action('ArticleController@listing');
    	}
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @param  Illuminate\Http\Request $request
     * @return Response
     */
    public function destroy($id, Request $request)
    {
    	if(!$request->ajax()) {
    		return Redirect::to('articles');
    	}
    	
    	// delete
    	$article = Article::find($id);
    	$article->delete();
    
    	// redirect
    	Session::flash('message', 'Successfully deleted the article!');
    	return Redirect::action('ArticleController@listing');
    }
    
    
}
