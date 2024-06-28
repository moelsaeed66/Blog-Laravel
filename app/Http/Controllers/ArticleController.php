<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    public function index()
    {
        $articles=Article::all();
//        dd($articles);
        return view('articles.index',compact('articles'));
    }
//
//    public function show($id)
//    {
//        $article=Article::findOrFail($id);
////        dd($article);
//        return view('articles.show',compact('article'));
//    }

    public function create()
    {
        return view('articles.create',[
            'categories'=>Category::all(),
            'tags'=>Tag::all(),
        ]);
    }

    public function store()
    {
//        dd(\request()->all());
//        var_dump($request);die;
        request()->validate([
            'title'=>'required',
            'body'=>'required',
            'tags.*'=> 'exists:tags,id',
            'categories.*'=> 'exists:categories,id'

        ]);

        $articles=Article::create([
            'title'=>request('title'),
            'body'=>request('body'),
            'employee_id'=>Auth::user()->id,
        ]);

        $articles->tags()->sync(\request('tags'));
        $articles->categories()->sync(\request('categories'));


        return redirect()->route('articles.index');
    }
    public function show(Article $article)
    {
        return view('articles.show',compact('article'));
    }

    public function edit(Article $article)
    {

        return view('articles.edit',compact('article'));
    }

    public function update(Article $article)
    {
//        dd(request()->all());
        request()->validate([
            'title'=>'required',
            'body'=>'required'
        ]);

        $article->update(\request()->all());

        return redirect()->route('articles.index');
    }

    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('articles.index');
    }




}
