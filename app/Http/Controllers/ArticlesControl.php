<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use App\Article;
use App\Http\Requests;
use App\Http\Requests\ArticleFormRequest;
use App\Http\Controllers\Controller;
use Mockery\CountValidator\Exception;
use Validator;
use Input;
use Request;

class ArticlesControl extends Controller
{
    /**
     * Index controller for Article
     *
     * @return view
     */
    public function index()
    {
        $articles = Article::all();

        return view('articles.index',compact('articles'));
    }

    /**
     * Show detail for article.
     *
     * @param $id
     * @return $this
     */
    public function show($id)
    {
        $article = Article::find($id);
        return view('articles.show')->with('article', $article);
    }

    /**
     * For create new article.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Process save article.
     *
     * @param ArticleFormRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store()
    {
        $data = Request::all();

        // Validator input params.
        $valids = Validator::make($data, [
            'title' => 'required|min:20',
            'content' => 'required|min:20'
        ]);

        // Thrown messages if fails.
        if ($valids->fails()) {
            return view('articles.create')->with('errors', $valids->messages());
        }

        extract($data);

        try {
            $data = array(
                'title' => $title,
                'content' => $content
            );
            $record = Article::create($data);
        } catch (Exception $ex) {
            
        }
        if (! empty($title) && ! empty($content)) {

        }

        return redirect()->route('article.index');
    }

    /**
     * For edit article by id.
     *
     * @param $id
     * @return $this
     */
    public function edit($id)
    {
        $article = Article::find($id);
        return view('articles.edit')->with('baiviet', $article);
    }

    /**
     * For update article
     *
     * @param $id
     */
    public function update($id)
    {
        dd($id);
    }
}
