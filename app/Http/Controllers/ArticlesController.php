<?php namespace App\Http\Controllers;
 
use App\Article;
use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;  // ①'
use Carbon\Carbon;

class ArticlesController extends Controller {
    //
    public function index() {
        // $articles = Article::all();  古いコード
        // $articles = Article::orderBy('published_at', 'desc')->get();  これでもOKです
        $articles = Article::latest('published_at')->where('published_at', '<=', Carbon::now())->get();
        return view('articles.index', compact('articles'));
    }
 
    public function show($id) {
        return $id;
    }
    public function create() {
        return view('articles.create');
    }
 
    public function store(ArticleRequest $request) {  // ①
        // ここでの validate が不要になった
 
        Article::create($request->all());
        return redirect('articles');
    }

    public function edit($id) {
        $article = Article::findOrFail($id);
 
        return view('articles.edit', compact('article'));
    }
 
    public function update($id, ArticleRequest $request) {
        $article = Article::findOrFail($id);
 
        $article->update($request->all());
 
        return redirect(url('articles', [$article->id]));
    }

    public function destroy($id) {
        $article = Article::findOrFail($id);
 
        $article->delete();
 
        return redirect('articles');
    }

}
