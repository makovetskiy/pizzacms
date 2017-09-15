@extends('admin.panel')
@section('content')

<div class="row">
    <div class="col-md-12">
        @if(Session::has('message'))
            <p class="text-success">{{Session::get('message')}}</p>
        @endif
    </div>
</div>
<div class="row">
        <form method="POST"  action="{{action('Admin\ArticlesController@store')}}"  enctype="multipart/form-data">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-12">
                            <p class="form-label">Название статьи:</p>
                            <input type="text" name="title" class="form-control" value="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <p class="form-label">Категория:</p>
                            <select name="category_id" class="form-control">
                                 @foreach($ArticleCategory as $category)
                                    <option class="form-control" value="{{$category->id}}">{{$category->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <p class="form-label">Опубликовать?</p>
                            <select name="public" class="form-control">
                                <option value="1">Да</option>
                                <option value="0">Нет</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <p class="form-label">Разрешить комментарии?</p>
                            <select name="comments_enable" class="form-control">
                                <option value="1">Да</option>
                                <option value="0">Нет</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <p>
                        Превью:
                    </p>
                    <p>
                        @if(!empty($article->preview))
                            <img  class="img-preview" src="../../{{$article->preview}}">
                        @endif
                        
                        <input type="file" name="preview" class="form-control img-preview-input">
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <p class="form-label">Текст статьи:</p>
                        <textarea name="content" class="form-control" id="editor">
                        </textarea>
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h2>Мета</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <p class="form-label">description:</p>
                        <input class="form-control" type="text" name="meta_description" value="">
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                     <p class="form-label">keywords:</p>
                    <input class="form-control"  type="text" name="meta_keywords" value="">
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                     <input type="hidden" name="_token" value="{{csrf_token()}}">
                <button class="btn btn-success btn-lg btn-save-edit-article" type="submit" value="Сохранить"><i class="fa fa-floppy-o" aria-hidden="true"></i> Сохранить</button>
                </div>
            </div>
        </div>
    </form>
    
</div>
@endsection