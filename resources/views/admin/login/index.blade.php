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
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
        }

        .form-signin input[type="password"] {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }

        .form-signin-heading {
            text-align: center;
            /* 添加居中效果 */
            margin-bottom: 20px;
            /* 设置下边距为20像素 */
        }

        .form-signin input[type="email"] {
            margin-bottom: 10px;
            /* 增加email输入框与下一个元素间的距离 */
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }

        .form-signin input[type="password"] {
            margin-bottom: 25px;
            /* 增加密码输入框与下一个元素间的距离 */
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }

        .return {
            margin-top: 20px;
            display: flex;
            justify-content: flex-end;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <div class="content">
            <!-- 页面主要内容放在这里 -->
            <!-- login-->
            <div class="container">
                <div class="panel panel-default" id="panel">
                    <div class="panel-heading">管理后台</div>
                    <div class="panel-body">
                        <form class="form-signin" action="/login" method="POST">
                            @csrf
                            <h2 class="form-signin-heading">登录管理后台</h2>
                            <label for="inputEmail" class="sr-only">邮箱地址</label>
                            <input type="email" id="inputEmail" name="email" value="{{ old('email') }}" class="form-control" placeholder="邮箱地址" required autofocus>

                            <label for="inputPassword" class="sr-only">密码</label>
                            <input type="password" id="inputPassword" name="password" value="{{ old('Password') }}" class="form-control" placeholder="密码" required>

                            <button class="btn btn-lg btn-primary btn-block" type="submit">登录</button>
                            <a href="/" class="return" type="submit">返回主页>></a>
                            @include("admin.layout.error")
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