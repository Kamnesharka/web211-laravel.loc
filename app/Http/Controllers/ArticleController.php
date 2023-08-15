<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;

class ArticleController extends Controller
{
    public function index() {
        return view('articles.articles-list', [
            'articles' => Article::all()
        ]);
    }

    public function create() {
        return view('articles.create-article', [
            'categories' => Category::all()->sortBy('name')
        ]);
    }

    public function store(Request $request) {
        $request->validate([
            'title' =>['required', 'min:3', 'max:255'],
            'category' => ['required']
        ]);

        Article::add($request->all());
        return redirect()->route('articles.index');
    } 

    public function edit($articleId) {
        return view('articles.edit-article', [
            'categories' => Category::all()->sortBy('name'),
            'article' =>Article::find($articleId)
        ]);
    }

    public function update(Request $request, $articleId) {
        $request->validate([
            'title' =>['required', 'min:3', 'max:255'],
            'category' => ['required']
        ]);

        $article = Article::find($articleId);
        $article->update([
            'title' => $request->input('title'),
            'content' => $request->input('text'),
            'categoryId' => $request->input('category'),
            'is_published' => $request->input('is_published')
            
        ]);
        return redirect()->route('articles.index');
    }

    public function delete($articleId) {
        Article::find($articleId)->delete();
        return back();
    }

    public function show($articleSlug) {
        return view("articles.show-article", [
            'article' => Article::where("slug", $articleSlug)->first()
        ]);
    }
}
