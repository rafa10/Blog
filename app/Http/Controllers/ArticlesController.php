<?php namespace App\Http\Controllers;

use App\Articles;
use App\Comments;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\ArticlesRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ArticlesController extends Controller {


	/**
	 * Create a new controller instance.
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}


	/**
	 * Display a listing of the resource.
	 */
	public function index()
	{
		$articles = Articles::all();
		return view('articles/index', compact('articles'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{

	}

	/**
	 * Display the specified resource.
	 */
	public function show($id)
	{
		$articles = Articles::findOrFail($id);
		$comments = DB::table('comments AS c')
			->select('c.*')
			->leftjoin('articles AS a', 'a.id','=', 'c.articles_id')
			->where('a.online', true)
			->get();
		return view('articles/show',compact('articles','comments'));
	}

	public function edit($id)
	{
		$articles = Articles::findOrFail($id);
		return view('articles/edit',compact('id', 'articles'));
	}

	public function update($id, ArticlesRequest $request)
	{
		$articles = Articles::findOrFail($id);
		$articles->update($request->all());
		Session::flash('update', 'article bien mettre à jour');
		return redirect(route('dashboard'));
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy($id)
	{
		$articles = Articles::findOrFail($id);
		$articles->delete();
		Session::flash('update', 'article bien supprimer');
		return redirect(route('dashboard'));
	}

	/**
	 * published articles method
	 */
	public function published($id)
	{
		$articles = Articles::findOrFail($id);
		$articles->online = true;
		$articles->save();
		Session::flash('visible', 'visibility successfully updated!');
		return redirect(route('dashboard'));
	}
	/**
	 * Update the visibility to movies
	 */
	public function published_off($id)
	{
		$articles = Articles::findOrFail($id);
		$articles->online = false;
		$articles->save();
		Session::flash('visible', 'invisibility successfully updated!');
		return redirect(route('dashboard'));
	}

	public function destroyComments($id)
	{
		$comments = Comments::findOrFail($id);
		$comments->delete();
		Session::flash('delete', 'commentaires bien supprimer');
		return redirect(route('dashboard'));
	}

}
