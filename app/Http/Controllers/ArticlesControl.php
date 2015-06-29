<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Http\Requests;
use App\Http\Requests\ArticleFormRequest;
use App\Http\Controllers\Controller;
use Input;

class ArticlesControl extends Controller
{
    public function index()
    {
        $articles = Article::all();
        return view('articles.index',compact('articles'));
    }
    public function show($id)
    {
        $article=Article::find($id);
        return view('articles.show')->with('article',$article);
    }
    public function create()
    {
        return view('articles.create');
    }
    public function store(ArticleFormRequest $request)
    {
        $title = $request->input('title');
        $content = $request->input('content');
        Article::create(
        [
            'title' => $title,
            'content' => $content
        ]);
        return redirect()->route('article.index');
    }
    public function edit($id)
    {
        $article = Article::find($id);
        return view('articles.edit')->with('baiviet',$article);
    }
    public function update($id)
    {
        dd($id);
    }
}
