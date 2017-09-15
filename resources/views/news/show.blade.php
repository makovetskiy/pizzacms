@extends('layouts.app')
@section('content')

<div class="container">
     @if (!Auth::guest() && Auth::user()->role_id == "2")
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <a class="btn btn-success" style="float:right;" href="{{action('Admin\ArticlesController@edit',['articles'=>$Article->id])}}"><i class="fa fa-pencil-square-o"></i>Редактировать статью</a>
            </div>
        </div>
     @endif

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            {!!$Article->content!!}
        </div>
    </div>
</div>
@endsection