@extends('admin.panel')
@section('content')
<div class="row">
    <div class="col-md-3">
        <form method="POST" action="{{action('Admin\ArticleCategoriesController@store')}}"/>
        <p class="lead">Название категории:</p>
        <input type="text" name="title" class="form-control"/><br>
        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
        <button type="submit" class="btn btn-primary">Добавить <i class="fa fa-plus-square " aria-hidden="true"></i></button>
        
        @if(Session::has('message'))
            <p class="text-success">{{Session::get('message')}}</p>
        @endif
        
        @if(Session::has('error_message'))
            <p class="text-danger">{{Session::get('error_message')}}</p>
        @endif
        

        </form>
    </div>
    <div class="col-md-9">
        <table class="table table-striped table-hover table-bordered">
        <thead>
            <tr>
                <th>#</th><th>Название</th><th>Действие</th>
            </tr>
        </thead>
        @foreach ($ArticleCategory as $category)
            <tr>
                <td width="10%">{{$category->id}}</td>
                <td>{{$category->title}}</td>
                <td width="15%">
                    <form method="POST" action="{{action('Admin\ArticleCategoriesController@destroy',['categories'=>$category->id])}}">
                        <input type="hidden" name="_method" value="delete"/>
                        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                        <button  class="btn btn-danger " type="submit" > <i class="fa fa-trash-o" aria-hidden="true"></i> удалить</button>
                    </form>
                     
                </td>
            </tr>
        @endforeach
        </table>
    </div>
</div>
@endsection