@extends("admin.layout.main")

@section("content")

<!-- Main content -->
<div class="container">
    <div class="panel panel-default" id="panel">
        <div class="panel-heading">管理后台</div>
        <div class="panel-body">
            <form class="form-signin" method="POST" action="/home/user/EditSubmit/{{ $record->id }}">
                @csrf
                @method('PUT')
                <h2 class="form-signin-heading">编辑用户</h2>
                <label for="name" class="sr-only">名字</label>
                <input type="text" name="name" value="{{ $record->name }}" id="name" class="form-control" placeholder="名字" required autofocus>
                <label for="inputEmail" class="sr-only">邮箱</label>
                <input type="email" name="email" value="{{ $record->email }}" id="inputEmail" class="form-control" placeholder="邮箱" required autofocus>
                <label for="inputPassword" class="sr-only">密码</label>
                <input type="password" name="password" value="" id="inputPassword" class="form-control" placeholder="输入密码" required>
                <label class="sr-only">重复密码</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="重复输入密码" required>

                @include("admin.layout.error")
                <button class="btn btn-lg btn-primary btn-block btn-register" type="submit">确认</button>
                <a href="/home" class="return" type="submit">返回主页>></a>
            </form>

        </div>
    </div>
</div>
@endsection