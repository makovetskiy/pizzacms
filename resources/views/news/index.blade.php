@extends('layouts.app')
@section('content')
<div class="container">
    @foreach ($Articles as $article)
    <div class="row">
        <div class="col-md-3">
            <img src ="{{$article->preview}}" class="img-responsive image-news-preview">
        </div>
        <div class="col-md-9">
            <p><h2>{{$article->title}}</h2></p>
            <p>{{$article->created_at}}</p>
            <p><a href="{{action('NewsController@show',['articles'=>$article->id])}}" >Читать далее...</a></p>
        </div>
    </div>
    @endforeach
@endsection