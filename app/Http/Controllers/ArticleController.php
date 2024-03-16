<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    //
    public function index(Request $request)
    {
        $articles = Article::get();
        $data = [
            'articles' => $articles,
        ];

        return view('articles.index', $data);
    }
    public function store(Request $request)
    {
        $title = $request->title;
        $content = $request->content;
        $author = $request->author;
        $imgPath = Storage::putFile('img', $request->img);

        Article::create([
            'title' => $title,
            'content' => $content,
            'author' => $author,
            'img' => $imgPath,
        ]);
        return redirect()->route('home')->with('success', 'Sukses menambahkan data!');
    }
    public function delete($id)
    {
        Article::where('id', $id)->delete();
        return redirect()->route('home')->with('success', 'sukses menghapus data!');
    }
    public function edit($id)
    {
        $article = Article::findOrFail($id);
        return view('articles.edit', compact('article'));
    }
    public function update(Request $request, $id)
    {

        $article = Article::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'author' => 'required|string|max:255',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $article->title = $request->title;
        $article->content = $request->content;
        $article->author = $request->author;


        if ($request->hasFile('img')) {
            $imgPath = Storage::putFile('img', $request->file('img'));
            $article->img = $imgPath;
        }

        $article->save();

        return redirect()->route('home')->with('success', 'Sukses memperbarui data artikel!');
    }
}
