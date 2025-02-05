<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticlesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show']]);
    }

    public function create()
    {
        return view('article.create');
    }

    public function store(Request $request)
    {
        // Валидация данных
        $this->validate($request, [
            'title' => 'required|max:170|min:10',
            'anons' => 'required|min:10',
            'text' => 'required|min:10',
            'main_image' => 'nullable|image|max:500'
        ]);

        if($request->hasFile('main_image')) {
            $file = $request->file('main_image')->getClientOriginalName();
            $image_name_without_ext = pathinfo($file, PATHINFO_FILENAME);

            $ext = $request->file('main_image')->getClientOriginalExtension();

            $image_name = $image_name_without_ext."_".time().".".$ext;
            $request->file('main_image')->storeAs('public/img/articles', $image_name);
        } else
            $image_name = 'noimage.jpg';

        // Создание статьи
        $article = new Article();
        $article->title = $request->input('title');
        $article->anons = $request->input('anons');
        $article->text = $request->input('text');
        $article->user_id = auth()->user()->id; // Привязываем автора
        $article->image = $image_name;
        $article->save();

        return redirect('/')->with('success', 'Статья добавлена');
    }

    public function show($id)
    {
        // Загружаем статью с автором
        $article = Article::with('user')->find($id);

        if (!$article) {
            return redirect('/')->with('error', 'Статья не найдена');
        }

        return view('article.show')->with('article', $article);

        $article = Article::with('comments.user')->findOrFail($id); // Загрузка статьи с комментариями и авторами комментариев
        return view('article.show', compact('article'));
    }

    public function edit($id)
    {
        // Загружаем статью с автором
        $article = Article::with('user')->find($id);

        if(auth()->user()->id != $article->user_id) {
            return redirect('/')->with('error', 'Это не ваша статья');
        }

        return view('article.edit')->with('article', $article);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|max:170|min:10',
            'anons' => 'required|min:10',
            'text' => 'required|min:10',
            'main_image' => 'nullable|image|max:500'
        ]);

        if($request->hasFile('main_image')) {
            $file = $request->file('main_image')->getClientOriginalName();
            $image_name_without_ext = pathinfo($file, PATHINFO_FILENAME);

            $ext = $request->file('main_image')->getClientOriginalExtension();

            $image_name = $image_name_without_ext."_".time().".".$ext;
            $request->file('main_image')->storeAs('public/img/articles', $image_name);
        }

        $article = Article::find($id);

        if (!$article) {
            return redirect('/')->with('error', 'Статья не найдена');
        }

        $article->title = $request->input('title');
        $article->anons = $request->input('anons');
        $article->text = $request->input('text');

        if($request->hasFile('main_image')){
            if($article->image != "noimage.jpg")
                Storage::delete('public/img/articles/' . $article->img);

            $article->image = $image_name;
        }

        $article->save();

        return redirect('/')->with('success', 'Статья была обновлена');
    }

    public function destroy($id)
    {
        $article = Article::find($id);

        if(auth()->user()->id != $article->user_id) {
            return redirect('/')->with('error', 'Это не ваша статья');
        }

        if($article->image != "noimage.jpg")
            Storage::delete('public/img/articles/' . $article->img);

        $article->delete();
        return redirect('/')->with('success', 'Статья была удалена');
    }
}
