@extends("admin.layout.main")

@section("content")
<!-- 正文 const $content = $('content'); $content.val(editor.txt.html()); -->

<!-- Main content -->
<div class="container">
    <div class="panel panel-default" id="panel">
        <div class="panel-heading">管理后台</div>
        <div class="panel-body d-flex justify-content-center align-items-center" style="height: 100%;">
            <!-- 添加Flexbox样式 -->
            <form class="my-form" method="POST" action="/home/post/EditSubmit/{{ $record->id }}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>标题</label>
                    <input name="title" type="text" class="form-control" style=" " placeholder="这里是标题" value="{{$record->title}}">
                </div>
                <div class="form-group">
                    <label>内容</label> </div>
                <!-- WangEditor 的容器 -->
                <div id="editor">
                {!!$record->content!!}
                </div>
              <!-- 隐藏的 textarea 用于表单提交 -->
              <textarea id="hidden-content" name="content" style="display:none;"></textarea>
            </div>
        <div class="form-group">
            <button class="btn btn-primary" style="margin-top:0px;position: absolute;left: 50%;transform: translateX(-50%);">提交</button>
        </div>

        </form>
        <br>
        @include("admin.layout.error")
        <a href="/home" class="return" type="submit">返回主页>></a>

    </div>
</div>
</div>
@endsection