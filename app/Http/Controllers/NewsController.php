<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Http\Requests;

class NewsController extends Controller
{
    public function index()
    {
        $Articles=Article::all();
        return view('news.index',['Articles' => $Articles]);
    }

    public function show($id)
    {
        $Article=Article::find($id);
        return view('news.show',['Article' => $Article]);
    }
}
