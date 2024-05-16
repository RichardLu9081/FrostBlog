@extends("admin.layout.main")

@section("content")

<!-- Main content -->
<div class="container">
    <!-- @if (Gate::allows('access-frost-home'))
<button>Admin Page Button</button>
@endif -->
    <div class="panel panel-default" id="panel">
        <div class="panel-heading">管理后台</div>
        <div class="panel-body">
            <form class="form-signin" method="POST" action="/home/AmendPassword">
                @csrf
                <h2 class="form-signin-heading">修改密码</h2>

                <label for="inputPassword" class="sr-only">密码</label>
                <input type="password" name="password" value="{{ old('password') }}" id="inputPassword" class="form-control" placeholder="输入密码" required>
                <label class="sr-only">重复密码</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="重复输入密码" required>

                @include("admin.layout.error")
                <button class="btn btn-lg btn-primary btn-block btn-register" type="submit">确定</button>
                <a href="/home" class="return" type="submit">返回主页>></a>
            </form>

        </div>
    </div>
</div>
@endsection