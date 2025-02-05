<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StaticController extends Controller
{
    public function index() {
        // $articles = Article::all();
        $articles = DB::select('SELECT * FROM articles');
        return view('static/index')->with('articles', $articles);
    }

    public function about() {
        $data = [
            'title' => 'Страница про нас',
            'params' => ['BMW', 'Audi', 'Volvo']  
        ];
        return view('static/about')->with($data);
    }
}
