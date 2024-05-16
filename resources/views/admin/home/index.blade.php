@extends("admin.layout.main")

@section("content")
<style>
    .home {
        text-align: center;
        font-size: 20px;
    }

    .pannel-home {
        margin-top: 26vh;
        height: 48vh;
    }
</style>
<!-- Main content -->
<div class="container">
    <!-- @if (Gate::allows('access-frost-home'))
<button>Admin Page Button</button>
@endif -->

    <div class="panel panel-default" id="show-panel">

        <div class="panel-body pannel-home">
            <div class="">


                <p class="home">Keep it Simple <a href="#"></a></p>
                <!-- <img src="images/FROST.jpg" alt="FROST" width="300" height="200"> -->



            </div>
        </div>
    </div>
</div>
@endsection