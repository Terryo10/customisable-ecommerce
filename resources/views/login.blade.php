@extends('layouts.whole')
@section('content')
<!-- PAGE BANNER SECTION -->
<div class="page-banner-section section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="page-banner-content">
                    <h1>Login page</h1>
                    <ul class="breadcrumb">
                        <li><a href="/">Home</a></li>
                        <li class="active">login page</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- PAGE SECTION START -->
<div class="page-section section pt-120 pb-120">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-10 col-12 mx-auto">
                <form method="GET" action="/login-google">
                    @csrf

                    <button name="login" class="btn btn-success" type="submit" style="color:white;">Login with
                        google</button>
                </form>
                <form style="margin-top:10px" method="GET" action="/login-google">
                    @csrf

                    <button name="login" class="btn btn-warning" type="submit">Login with FaceBook</button>
                </form>

            </div>
        </div>
    </div>
</div>
<!-- PAGE SECTION END -->
@endsection