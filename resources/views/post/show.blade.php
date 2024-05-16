@extends("layout.main")

@section("content")

<div class="container">
    <div class="panel panel-default" id="show-panel">
        <div class="panel-heading">文章</div>
        <div class="panel-body">
            <div class="">
                <div class="">
                    <div style="">
                        <h2 class="">{{$post->title}}</h2>
                    </div>
                    <p class="">{{$post->created_at->toFormattedDateString()}}  <a href="#"></a></p>

                    <p>{!! $post->content !!}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


