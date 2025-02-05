<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function showBlog()
    {
        // Пример данных
        $posts = [
            ['title' => 'Первая запись', 'content' => 'Описание первой записи...'],
            ['title' => 'Вторая запись', 'content' => 'Описание второй записи...'],
            ['title' => 'Третья запись', 'content' => 'Описание третьей записи...'],
            ['title' => 'Четвертая запись', 'content' => 'Описание четвертой записи...'],
        ];

        return view('blog.index', compact('posts'));
    }
}
