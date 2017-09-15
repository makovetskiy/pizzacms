@extends('admin.panel')
@section('content')
<?php echo dirname($_SERVER['PHP_SELF']); ?>
<div class="row">
    <div class="col-md-6">
        @if(Session::has('message'))
            <p class="text-success">{{Session::get('message')}}</p>
        @endif
    </div>
</div>
<table class="table table-responsive table-hover table-bordered table-striped">
<thead>
    <tr class="info">
        <th>id</th><th>Миниатюра</th><th>Заголовок</th><th>Категория</th><th>Действия</th>
    </tr>
</thead>
@foreach ($Articles as $article)
<tr>
    <td>{{$article->id}}</td>
    <td>
        <img width=75 height=75 src="{{$article->preview}}">
    </td>
    <td>{{$article->title}}</td>
    <td>
        @foreach($ArticleCategory as $category)
            @if($article->category_id==$category->id)
                {{$category->title}}
            @endif
        @endforeach
    </td>
    <td> 
        <a class="btn btn-success bnt-control-table" href="{{action('Admin\ArticlesController@edit',['articles'=>$article->id])}}"><i class="fa fa-pencil-square-o"></i>Изменить</a>
        <form method="POST" id="deleteform" action="{{action('Admin\ArticlesController@destroy',['articles'=>$article->id])}}">
            <input type="hidden" name="_method" value="delete"/>
            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
            <buton onclick="document.getElementById('deleteform').submit()" class="btn btn-danger bnt-control-table" value=""><i class="fa fa-trash "></i> Удалить</button>
        </form>
    </td>
</tr>
@endforeach
</ul>
@if(Session::has('message'))
    {{Session::get('message')}}
@endif
@endsection