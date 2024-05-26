
@extends('website.layout.app')

@section('content')
   
      <!-- Start 404 
    ============================================= -->
    <div class="error-page-area overflow-hidden default-padding">
        <div class="container">
            <div class="row align-center">
                <div class="col-lg-6 thumb">
                    <img src="https://img.freepik.com/free-vector/error-404-concept-illustration_114360-1811.jpg" alt="Thumb">
                </div>
                <div class="col-lg-6" >
                    <div class="error-box" style="margin-top: 40px">
                        <h1>404</h1>
                        <h2>Sorry Page Was Not Found!</h2>
                          <a href="{{ url('/') }}" class="th-btn style2">Back to home<i class="fas fa-arrow-up-right ms-2"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End 404 -->

@endsection