<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use App\Http\Requests\ArticleFormRequest;
use App\Models\Article;
//use App\Http\Requests;
//use App\Http\Requests\ArticleFormRequest;
use App\Http\Controllers\Controller;
//use Mockery\CountValidator\Exception;
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
        $articles = Article::paginate(4);

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
     * store article to database and redirect to articles.index
     *
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
     * Find id update articles and redirect asticle.show with $id
     *
     * @param $id
     * @param ArticleFormRequest $request
     * @return \Illuminate\Http\RedirectResponse
     *
     */
    public function update($id,ArticleFormRequest $request)
    {
        $articles = Article::find($id);
        $update = $articles->update(
        [
            'title' => $request->input('title'),
            'content' => $request->input('content')
        ]);
        return redirect()->route('article.show',$id);
    }

    public function destroy($id)
    {
        $articles = Article::find($id);
        $destroy = $articles->delete();
        return redirect()->route('article.index');
    }
}
