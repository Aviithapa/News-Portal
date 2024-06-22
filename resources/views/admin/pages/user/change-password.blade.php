@extends('admin.layout.app')

@section('content')



                    <div class="row mt-5">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="header-title">
                                         Change Password
                                        </h4>
                                    <p class="text-muted mb-0">
                                    </p>
                                </div>
                                <div class="card-body">
                                    
                                        <form method="POST" action="{{ route('user.password.change') }}">
                                        @csrf
                              
                                        <div class="row"> 
                                         
                                            <div class="col-lg-6 col-md-6 col-sm-12"> 
                                                <div class="mb-3">
                                                    <label class="form-label" for="validationCustom01">Current Password</label>
                                                    <input type="text" class="form-control" placeholder="Current Password" name="current_password"  value="{{ old('current_password') }}" required >
                                                      @if($errors->any())
                                                         {{ $errors->first('current_password') }}
                                                      @endif
                                                </div>
                                            </div> 
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="mb-3">
                                                    <label class="form-label" for="validationCustom01">New Password ** Must be 8 character</label>
                                                    <input type="text" class="form-control" placeholder="New Password" name="new_password" value="{{ old('new_password') }}" required>
                                                     @if($errors->any())
                                                         {{ $errors->first('new_password') }}
                                                      @endif
                                                </div>
                                            </div>
                                            
                                          
                                        </div>
                                            
                                        <button class="btn btn-primary" type="submit">Change Password</button>
                                    </form>

                                </div> <!-- end card-body-->
                            </div> <!-- end card-->
                        </div> <!-- end col-->
                    </div>
                    <!-- end row -->


@endsection