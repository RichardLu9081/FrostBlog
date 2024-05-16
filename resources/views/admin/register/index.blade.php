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

    <style>
        body {
            height: 100%;
            margin: 0;
            padding: 0;
            padding-top: 40px;
            padding-bottom: 40px;
            background-color: #f8f9faf5;
        }

        .wrap {
            min-height: 100%;
            position: relative;
        }

        .content {
            padding-bottom: 60px;
            /* 与 footer 高度相等 */
        }

        .panel {
            height: 80vh;
            /* 其他面板样式 */
        }

        footer {
            position: absolute;
            bottom: 0;
            width: 100%;
            height: 20px;

            text-align: center;
            padding: 20px 0;
        }

        .form-signin {
            max-width: 330px;
            padding: 15px;
            margin: 0 auto;
        }

        .form-signin .form-control {
            position: relative;
            height: auto;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            padding: 10px;
            font-size: 16px;
        }

        .form-signin .form-control:focus {
            z-index: 2;
        }

        .form-signin input[type="email"] {
            margin-bottom: 0px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
        }

        .form-signin input[type="password"] {
            margin-bottom: 0px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }

        .btn-register {
            margin-top: 30px;
        }

        .form-signin-heading {
            text-align: center;
            /* 添加居中效果 */
            margin-bottom: 20px;
            /* 设置下边距为20像素 */
        }

        .return {
            margin-top: 20px;
            float: right;
            /* 靠右对齐 */
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <div class="content">
            <!-- 页面主要内容放在这里 -->
            <div class="container">
                <div class="panel panel-default" id="panel">
                    <div class="panel-heading">管理后台</div>
                    <div class="panel-body">
                        <form class="form-signin" method="POST" action="/register">
                        @csrf
                            <h2 class="form-signin-heading">请注册</h2>
                            <label for="name" class="sr-only">名字</label>
                            <input type="text" name="name" value="{{ old('name') }}" id="name" class="form-control" placeholder="名字" required autofocus>
                            <label for="inputEmail" class="sr-only">邮箱</label>
                            <input type="email" name="email" value="{{ old('email') }}" id="inputEmail" class="form-control" placeholder="邮箱" required autofocus>
                            <label for="inputPassword" class="sr-only">密码</label>
                            <input type="password" name="password" value="{{ old('password') }}" id="inputPassword" class="form-control" placeholder="输入密码" required>
                            <label class="sr-only">重复密码</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="重复输入密码" required>

                            @include("admin.layout.error")
                            <button class="btn btn-lg btn-primary btn-block btn-register" type="submit">注册</button>
                            <a href="/home" class="return" type="submit">返回主页>></a>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        <!-- 页脚-->
        <footer class="footer">
            <p style="text-align: center;"> Frost Blog | 634351735@qq.com </p>
        </footer>
    </div> <!-- wrapper-->

    <!-- Bootstrap core JavaScript
                 Placed at the end of the document so the pages load faster -->
    <script src="{{ asset('jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('popper.min.js') }}"></script>
    <script src="{{ asset('bootstrap.min.js') }}"></script>

</body>

</html>