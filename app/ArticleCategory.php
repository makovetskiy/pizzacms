<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArticleCategory extends Model
{
    protected $table="article_categories"; //нзвание таблицы в базе
    protected $fillable=['title'];
}
