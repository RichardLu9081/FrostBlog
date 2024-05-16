@extends("admin.layout.main")

@section("content")
<!-- @if (session('success'))
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
@endif -->
<!-- @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif -->

<!-- Main content -->
<div class="container">
    <!-- @if (Gate::allows('access-frost-home'))
<button>Admin Page Button</button>
@endif -->
    <div class="panel panel-default" id="panel">
        <div class="panel-heading">管理后台</div>
        <div class="panel-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th width="20">ID</th>
                        <th width="400">标题</th>
                        <th width="220">创建时间</th>
                        <th width="10"></th>
                        <th width="10"></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($records as $record)
                    <tr>
                        <td>{{ $record->id }}</td>
                        <td>{{ $record->title }}</td>
                        <td>{{ $record->created_at }}</td>
                        <td>
                            <a href="{{ route('post.edit',$record->id) }}" class="btn btn-primary">编辑</a>
                        </td>
                        <td>
                            <form action="{{ route('post.destroy', $record->id)}}" method="post">
                                @CSRF
                                @method("delete")
                                <button type="submit" class="btn btn-danger" onclick="return confirm('确认删除？')">删除</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="100" class="text-center">暂无</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            {{ $records->links() }}

        </div>
    </div>
</div>
@endsection