<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{asset("css/admin.bootstrap.min.css")}}" rel="stylesheet">
    <link href="{{asset("css/style.css")}}" rel="stylesheet">
    <link href="{{asset("css/sb-admin.css")}}" rel="stylesheet">
    <link href="{{asset("css/plugins/morris.css")}}" rel="stylesheet">"
    <link href="{{asset("font-awesome/css/font-awesome.min.css")}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('css/elfinder.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/theme.css')}}">
    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
<div id="wrapper">
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Админка Магазина < {{ config('app.name', 'Laravel') }} ></a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu message-dropdown">
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>John Smith</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>John Smith</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        @if(Session::has('message'))
                                            <p class="text-success">{{Session::get('message')}}</p>
                                        @endif
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-footer">
                            <a href="#">Read All New Messages</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu alert-dropdown">
                        <li>
                            <a href="#">Alert Name <span class="label label-default">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-primary">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-success">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-info">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-warning">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-danger">Alert Badge</span></a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">View All</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                @else
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> {{ Auth::user()->name }} <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#">Настройки</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="{{ url('/logout') }}"onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                       <i class="fa fa-fw fa-power-off"></i> Выход
                            </a>

                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                @endif
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="active">
                        <a href="index.html"><i class="fa fa-fw fa-dashboard"></i> Панель управления</a>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#catalog"><i class="fa fa-server" aria-hidden="true"></i> Каталог<i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="catalog" class="collapse">
                           <li>
                                <a href=""><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span> Категории товара</a>
                            </li>
                            <li>
                                <a href=""><i class="fa fa-shopping-basket" aria-hidden="true"></i> Товары</a>
                            </li>
                            <li>
                                <a href=""><i class="fa fa-book" aria-hidden="true"></i> Описание товара</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#news"><i class="fa fa-newspaper-o"></i> Новости и Акции <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="news" class="collapse">
                                <li>
                                    <a href="{{url('/admin/articlecategories')}}"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span> Категории</a>
                                </li>
                                 <li>
                                    <a href="javascript:;" data-toggle="collapse" data-target="#articles"><i class="fa fa-newspaper-o"></i> Статьи <i class="fa fa-fw fa-caret-down"></i></a>
                                    <ul id="articles" class="sub-menu collapse">
                                            <li>
                                                <a href="{{url('/admin/articles')}}"><i class="fa fa-list-alt" aria-hidden="true"></i> Все статьи</a>
                                            </li>
                                            <li>
                                                <a href="{{url('/admin/articles/create')}}"><i class="fa fa-plus-circle" aria-hidden="true"></i> Создать статью</a>
                                            </li>
                                    </ul>
                                </li>
                                 <li>
                                    <a href="javascript:;" data-toggle="collapse" data-target="#pages"><i class="fa fa-file-powerpoint-o" aria-hidden="true"></i> Страницы <i class="fa fa-fw fa-caret-down"></i></a>
                                    <ul id="pages" class="sub-menu collapse">
                                            <li>
                                                <a href="{{url('/admin/articles')}}"><i class="fa fa-list-alt" aria-hidden="true"></i> Все страницы</a>
                                            </li>
                                            <li>
                                                <a href="{{url('/admin/articles')}}"><i class="fa fa-plus-circle" aria-hidden="true"></i> Создать страницу</a>
                                            </li>
                                    </ul>
                                </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#users"><i class="fa fa-user"></i> Пользователи<i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="users" class="collapse">
                           <li>
                                <a href=""><i class="fa fa-users"></i> Список пользователей</a>
                            </li>
                            <li>
                                <a href=""><i class="fa fa-user-secret" aria-hidden="true"></i> Роли</a>
                           </li>
                           <li>
                               <a href=""><i class="fa fa-plus-circle" aria-hidden="true"></i> Создать нового пользователя</a>
                           </li>
                        </ul>
                    </li> 
                    <li>
                        <a href="javascript:;"><i class="fa fa-cogs"></i> Настройки</a>
                    </li>                   
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>
<div id="page-wrapper">
    <div class="container-fluid">
        @yield('content')
    </div>
</div>

</div>

    <!-- Scripts -->
    <script src="{{asset("js/jquery.js")}}"></script>
    <script src="{{asset("js/bootstrap.min.js")}}"></script>
    <script src="{{asset("js/plugins/tinymce/tinymce.min.js")}}"></script>
    <script src="{{asset('js/elfinder.min.js')}}"></script>
    <script src="{{asset('js/i18n/elfinder.ru.js')}}"></script>
    <script src="{{asset("js/admin.js")}}"></script>

    <script src="{{asset("js/plugins/morris/raphael.min.js")}}"></script>
    <script src="{{asset("js/plugins/morris/morris.min.js")}}"></script>
    <script src="{{asset("js/plugins/morris/morris-data.js")}}"></script>

    
</body>
</html>
