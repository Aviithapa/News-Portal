
@extends('website.layout.app')

@section('content')
   



    <!-- ==========signin Section start Here========== -->
    <div class="account padding-top padding-bottom mt-5 mb-5">
        <div class="container">
            <div class="row g-5 align-items-center flex-md-row-reverse">
                <div class="col-lg-5">
                    <div class="account__wrapper">
                       <form action="{{ url('/login') }}" method="POST">
                            <div class="form-group col-md-12 mb-4">
                               <input type="email" class="form-control" name="email" id="email" placeholder="Email Address">
                            </div>
                            <div class="form-group col-md-12 mb-4">
                                <input type="password" name="password"  class="form-control"
                                    placeholder="Password">
                            </div>
                           
                           <div class="form-btn col-12">
                                    <button class="th-btn">Login<i class="fas fa-arrow-up-right ms-2"></i></button>
                           </div>
                        </form>
                      
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="account-img">
                        <img src="assets/images/account/sign-in.png" alt="shape-image">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ==========signin Section ends Here========== -->

@endsection