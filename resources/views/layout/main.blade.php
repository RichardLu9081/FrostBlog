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
    <script src="{{ asset('jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('popper.min.js') }}"></script>
    <script src="{{ asset('bootstrap.min.js') }}"></script>

</head>

<body>
    <!-- 导航栏-->
    <div class="panel panel-default">
        <ul class="nav nav-pills">
            <li class="nav-item">
                <a class="nav-link nav-item-left" href="/">首页</a>
            </li>
            <!-- <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li> -->
            <li class="nav-item navbar-right">
                <a class="nav-link nav-item-right" href="/login">管理员</a>
            </li>
        </ul>
    </div>


    <!-- 正文-->

    @yield("content")






</body>

</html>