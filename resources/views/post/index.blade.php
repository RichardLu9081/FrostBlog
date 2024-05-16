<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Frost Blog</title>
    <!-- Bootstrap core CSS -->

    <link rel="stylesheet" href="{{asset('bootstrap.min.css')}}">
    <!-- Custom styles for this template -->
    <!--<link rel="stylesheet" type="text/css" href="/bootstrap.min.css">-->
    <link rel="stylesheet" type="text/css" href="/wangEditor.min.css">
    <style>
        body {
            background: #f8f9faf5;
            position: relative;
        }
         .nav-item-right {
            margin-right: 30px;
            /* 根据需要调整这个数值 */
        }
        .nav-item-left {
            margin-left: 30px;
            /* 根据需要调整这个数值 */
        }
        .nav-item>a {
            font-size: 16px;
            /* 根据需要调整字体大小 */
        }
    </style>
</head>

<body>
    <!-- 导航栏-->
    <div class="panel panel-default">
        <ul class="nav nav-pills">
            <li class="nav-item">
                <a class="nav-link nav-item-left" href="/">首页</a>
            </li>
            <!-- <li class="nav-item">
                <a class="nav-link" href="#">Demo</a>
            </li> -->
            <li class="nav-item navbar-right">
                <a class="nav-link nav-item-right" href="/login">管理员</a>
            </li>
        </ul>
    </div>
<!-- @if (Gate::allows('access-frost-home'))
<button>Admin Page Button</button>
@endif -->
    @include('layout.error')
    <!-- 正文-->

    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">文章列表</div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-8 ">



                        @foreach($posts as $post)
                        <div class="">
                            <h2 class=""><a href="/posts/{{$post->id}}">{{$post->title}}</a></h2>
                            <p class="">{{$post->created_at->toFormattedDateString()}}  <a href="/user/"></a></p>

                            <p class="" style="width: 200px;overflow: hidden; text-overflow: ellipsis;  " >{!!Str::limit(preg_replace('/<img[^>]*>/i', '', $post->content), 100, '...')!!}</p>
                            
                        </div>
                        @endforeach

                        {{$posts->links()}}

                    </div>
                    @include("layout.sidebar")
                </div>

            </div>
        </div>

    </div>



    <!-- 页脚-->
    <footer>
        <p style="text-align: center;"> Frost Blog | 634351735@qq.com </p>
    </footer>

    <!-- Bootstrap core JavaScript
================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="{{ asset('jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('popper.min.js') }}"></script>
    <script src="{{ asset('bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="/js/wangEditor.min.js"></script>
</body>

</html>