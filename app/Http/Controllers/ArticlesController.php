<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\ArticleRequest;
use App\Http\Controllers\Controller;

use App\Models\Article;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Article::orderBy('created_at', 'DESC')->paginate(5);
        $data = compact('posts');

        return view('blog\blog', $data);
    }

    /**
     * Show the form for creating a new resource.
     * 建立新文章頁面
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blog\blogcreate');
    }

    /**
     * Store a newly created resource in storage.
     * 建立新文章
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request)
    {
        // dd($request);
        $post = Article::create($request->except('_token'));
        
        return redirect()->route('article.edit', $post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * 編輯文章頁面
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Article::find($id);

        if(is_null($post)){
            abort(404);
            // return redirect()->route('article.index')->with('message', '找不到文章。');
        }
        
        $data = compact('post');

        return view('blog\blogedit', $data);
    }

    /**
     * Update the specified resource in storage.
     * 編輯文章
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleRequest $request, $id)
    {
        $post = Article::find($id);

        $post->update($request->except('_method', '_token'));

        return redirect()->route('article.index');
    }

    /**
     * Remove the specified resource from storage.
     * 刪除文章
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Article::destroy($id);

        return redirect()->route('article.index');
    }
}
