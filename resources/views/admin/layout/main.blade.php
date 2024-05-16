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
   <!--  <link rel="stylesheet" href="{{asset('wangEditor.min.css')}}"> -->
    <!-- Custom styles for this template -->
   
    <script src="{{ asset('jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('popper.min.js') }}"></script>
   <!--   -->
    <script src="{{ asset('bootstrap.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('wangEditor.min.css') }}">
   <!--  <link rel="stylesheet" href="/wangEditor.min.css">--> 
   <!--  <script src="{{ asset('wangEditor.min.js') }}"></script>  -->
    

    <style>
        body {
            background: #f8f9faf5;
            position: relative;
        }

        .nav-item-right {
            margin-right: 45px;
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

        .my-form {
            width: 60%;
            /* 设置表单的宽度，使其与内部元素宽度一致 */
            margin: 0 auto;
            /* 表单水平居中 */
        }
        #editor—wrapper {
        border: 1px solid #ccc;
        z-index: 100;
        /* 按需定义 */
    }

    #toolbar-container {
        border-bottom: 1px solid #ccc;
    }

    #editor-container {
        height: 600px;
    }
    </style>

<script src="{{ asset('jquery-3.7.1.min.js') }}"></script>
<script src="{{ asset('wangEditor.min.js') }}"></script>
<script>
        document.addEventListener('DOMContentLoaded', function() {
        var editor = new wangEditor('#editor');
       
        var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        
        // 这是一个wangEditor V4的版本语法，https://www.wangeditor.com/v4/
        editor.config.uploadImgServer = '{{ route('uploadImage') }}';
        /* 下面的uploadFileName必须设置 才可以得到以下request  array:2 [
  "_token" => "AFgq51nGyjlu13Mc953YhjEPetCw5EHDL0g2KbJ6"
  "image" => Illuminate\Http\UploadedFile {#366 */
       
        editor.config.uploadFileName = 'image';

         editor.config.uploadImgParams = {
         _token: csrfToken, // 例如 Laravel 的 CSRF 令牌         
        };
        editor.config.uploadImgMaxSize = 2 * 1024 * 1024 // 2M
        // 监听内容变化并同步到隐藏的 textarea
        console.log('1')
        editor.config.onchange = function(html) {
            console.log('2');
           // console.log(document.getElementById('hidden-content').value);
            document.getElementById('hidden-content').value = html;
        };
        // 创建编辑器
        editor.create();
        // 设置编辑器内容
    
        /* // 初始化 hidden-content 的值（可选，例如使用旧的或预设的内容）
        document.getElementById('hidden-content').value = '{{ old('$record->content') }}'; // Laravel 示例
   */      console.log('3')
      
    });
</script>

</head>

<body>
    <!-- 导航栏-->
    <div class="panel panel-default">
        <ul class="nav nav-pills">
            <li class="nav-item">
                <a class="nav-link nav-item-left" href="/home">后台管理</a>
            </li>

            <li class="nav-item">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">管理员</a>
                <ul class="dropdown-menu">
                    <li><a href="/register">注册管理员</a></li>
                    <li><a href="/home/AmendPassword">修改密码</a></li>
                    <li><a href="/home/users">管理员列表</a></li>

                </ul>
            </li>

            <li class="nav-item">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">文章管理</a>
                <ul class="dropdown-menu">
                    <li><a href="/home/PostList">文章列表</a></li>
                    <li><a href="/home/post/add">新增文章</a></li>

                </ul>
            </li>

            <li class="nav-item navbar-right">
                <a class="nav-link nav-item-right" href="/logout">{{ auth()->user()->name }} 退出</a>
            </li>
        </ul>
    </div>


    <!-- 正文-->
    @if (session('success'))
    <div class="alert alert-success" id="success-alert">
        {{ session('success') }}
    </div>
    <script src="{{ asset('jquery-3.7.1.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            setTimeout(function() {
                $('#success-alert').fadeOut(500, function() {
                    $(this).remove();
                });
            }, 1500);
        });
    </script>
    @endif

    @yield("content")



    <!-- Bootstrap core JavaScript
================================================== -->
  


</body>

</html>