<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Article;
use App\ArticleCategory;

class ArticlesController extends Controller
{
    public function index()
    {
        $Articles=Article::all();
        $ArticleCategory=ArticleCategory::all();
        return view('admin.article.index',['Articles' => $Articles,'ArticleCategory'=>$ArticleCategory]);
    }

    public function show()
    {
        $Articles=Article::all();
        return view('admin.article.index',['Articles' => $Articles]);
    }

    public function create()
    {
        $ArticleCategory=ArticleCategory::all();
        return view('admin.article.create',['ArticleCategory' => $ArticleCategory]);
    }

    public function store(Request $request)
    {
        if($request->hasFile('preview'))
        {
            $date=date('d.m.Y');
            $root=public_path()."\images\\"; 
            echo $root;
            if(!file_exists($root.$date)){
                mkdir($root.$date);
            } 

            $file_name=time().$request->file('preview')->getClientOriginalName();
            $request->file('preview')->move($root.$date,$file_name); 
            $all=$request->all();
            $all['preview']="../images/".$date."/".$file_name;
            Article::create($all); 
        }
        else
        {
            Article::create($request->all()); 
        }
        return back()->with('message','Статья добавлена');
    }

    public function destroy($id)
    {
        $article=Article::find($id);
        $article->delete();
        return back()->with('message','Статья удалена');
    }

    public function edit($id)
    {
        $article=Article::find($id); 
        $ArticleCategory=ArticleCategory::all(); 
        return view('admin.article.edit',['article'=>$article,'ArticleCategory'=>$ArticleCategory]);
    }

    public function update(Request $request,$id)
    {
        $article=Article::find($id);
        if($request->hasFile('preview'))
        {
            $date=date('d.m.Y');
            $root=public_path()."\images\\"; 
            
            if(!file_exists($root.$date)){
                mkdir($root.$date);
            } 

            $file_name=time().$request->file('preview')->getClientOriginalName();
            $request->file('preview')->move($root.$date,$file_name); 
            $all=$request->all();
            $all['preview']="../images/".$date."/".$file_name;
            $article->update($all); 
        }
        else
        {
        $article->update($request->all());
        }

        return back()->with('message', 'Статья изменена');
    }
}
