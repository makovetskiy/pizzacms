@extends('admin.panel')
@section('content')
<div class="row">
    <div class="col-md-4">
        <form method="POST" action="{{action('Admin\ArticleCategoriesController@store')}}"/>
        <p class="lead">Название категории:</p>
        <input type="text" name="title" class="form-control"/><br>
        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
        <input type="submit" value="Добавить" class="btn btn-primary">
        <p class="text-success">
            @if(Session::has('message'))
                {{Session::get('message')}}
            @endif
        </p>
        </form>
    </div>
    <div class="col-md-8">
        <table class="table">
        @foreach ($ArticleCategory as $category)
            <tr>            
                <td>{{$category->title}}</td>
            </tr>
        @endforeach
        </table>
    </div>
</div>
@endsection