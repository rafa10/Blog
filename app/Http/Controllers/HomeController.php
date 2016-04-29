<?php namespace App\Http\Controllers;

use App\Articles;
use App\Comments;
use App\Http\Requests\ArticlesRequest;
use App\Http\Requests\CommentsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Show the application dashboard to the user.
	 */
	public function index()
	{

		$articles = Articles::where('online', true)->get();
		$comments = DB::table('comments AS c')
						->select('c.*')
						->leftjoin('articles AS a', 'a.id','=', 'c.articles_id')
						->where('a.online', true)
						->get();
		return view('/home', compact('articles','comments'));
	}

	/**
	 * Show the search result
	 */

	public function search(Request $request)
	{
		$query = Input::get('search');
		$articles = Articles::where('author','LIKE', '%'.$query.'%')->where('online', true)->get();
		$comments = DB::table('comments AS c')
			->select('c.*')
			->leftjoin('articles AS a', 'a.id','=', 'c.articles_id')
			->where('a.online', true)
			->get();
		return view('/search', compact('articles','query','comments'));
	}

	public function create()
	{
		return view('articles/create');
	}

	public function store(ArticlesRequest $request)
	{
		$articles = Articles::create($request->all());
		Session::flash('create', 'L\'article bien ajouté');
		return redirect(route('home'));
	}

	/*public function edit($id)
	{
		$articles = Articles::findOrFail($id);
		return view('articles/edit',compact('id', 'articles'));
	}

	public function update($id, ArticlesRequest $request)
	{
		$articles = Articles::findOrFail($id);
		$articles->update($request->all());
		Session::flash('update', 'article bien mettre à jour');
		return redirect(route('home'));
	}*/

	/**
	 * create comments method
	 */

	public function storeComments(CommentsRequest $request)
	{
		$comments = Comments::create($request->all());
		Session::flash('create', 'Le commentaire bien ajouté');
		return redirect(route('home'));
	}

}
