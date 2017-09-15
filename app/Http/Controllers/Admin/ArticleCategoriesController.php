<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\ArticleCategory;
use Validator;

class ArticleCategoriesController extends Controller
{
    public function index()
    {
        $ArticleCategory=ArticleCategory::all();
        return view('admin.article_category.categories',['ArticleCategory' => $ArticleCategory]);
    }

    public function create()
    {
        $ArticleCategory=ArticleCategory::all();
        return view('admin.article_category.create',['ArticleCategory' => $ArticleCategory]);        
    }

    public function store(Request $request)
    {
         $v = Validator::make($request->all(), [
            'title' => 'required|max:255|unique:article_categories'
        ]);
        
        if($v->fails()){
            return back()->with('error_message',$v->errors());
        }
        else{
            ArticleCategory::create($request->all());
            return back()->with('message','Категория добавлена');
        }
    }

    public function destroy($id)
    {
        $ArticleCategory=ArticleCategory::find($id); 
        $ArticleCategory->delete();
        return back()->with('message','Категория '.$ArticleCategory->title . ' удалена '); ; // метод возвратит название удаленной категории, которую мы отобразим в окне alert
    }
}
