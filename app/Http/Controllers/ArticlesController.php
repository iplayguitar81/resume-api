<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//bring in requests for API?
use App\Http\Requests;

use App\Article;

use App\Http\Resources\Article as ArticleResource;


class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get articles

        $articles = Article::paginate(15);

        //return collection of articles as a resource...

        return ArticleResource::collection($articles);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        //if updating... update article with ID or else create a new article...
        $article = $request->isMethod('put') ? Article::findOrFail($request->article_id) : new Article;

        $article->id = $request->input('article_id');

        $article->title = $request->input('title');
        $article->body = $request->input('body');

        if($article->save()) {

            return new ArticleResource($article);

        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //store individual article...
        $article = Article::findOrFail($id);

        //return single article as a resource...

        return new ArticleResource($article);
        //this can be called from a singular route (i.e. - - /api/article/3)


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        //store individual article...
        $article = Article::findOrFail($id);

        //return single article as a resource...

        if($article->delete()) {

            return new ArticleResource($article);

        }



    }
}
