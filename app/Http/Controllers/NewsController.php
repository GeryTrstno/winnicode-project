<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    public function show(News $news)
    {
        $categories = $news->categories;

        return view('news', [
            'news' => $news,
            'categories' => $categories,
        ]);
    }
}
