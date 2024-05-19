
@extends('website.layout.app')

@section('content')
    <div class="breadcrumb-area bg-gray text-center shadow dark text-light bg-cover" style="background-image: url(assets/img/2440x1578.png);">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <h1>Error Page</h1>
                    <ul class="breadcrumb">
                        <li><a href="#"><i class="fas fa-home"></i> Home</a></li>
                        <li class="active">404</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
      <!-- Start 404 
    ============================================= -->
    <div class="error-page-area overflow-hidden default-padding">
        <div class="container">
            <div class="row align-center">
                <div class="col-lg-6 thumb">
                    <img src="https://img.freepik.com/free-vector/error-404-concept-illustration_114360-1811.jpg" alt="Thumb">
                </div>
                <div class="col-lg-6">
                    <div class="error-box">
                        <h1>404</h1>
                        <h2>Sorry Page Was Not Found!</h2>
                        <a class="btn circle btn-md btn-gradient" href="{{ url('/') }}">Back to home</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End 404 -->

@endsection