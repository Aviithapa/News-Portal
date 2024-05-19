
@extends('website.layout.app')

@section('content')


    <!-- Start of Application form 
    ============================================= -->
    <div class="contact-form-area default-padding">
        <div class="container">
            <div class="row">
                <!-- Start Contact Form -->
                <div class="col-md-12 contact-form">
                    <div class="content">
                        <div class="heading">
                            <h3>Membership Form</h3>
                        </div>
                        <form action="{{ url('#') }}" method="POST" class="contact-form">
                            <div class="form-section row">
                                <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Name of Member:</label>
                                            <input class="form-control" id="name" name="name" placeholder="Name of member" type="text" required value="{{ old('name') }}">
                                              @if($errors->any())
                                                <span class="alert-error">{{ $errors->first('name') }}</span>
                                              @endif
                                        </div>
                                </div>
                                 <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Name of Member Nepali:</label>
                                            <input class="form-control" id="name" name="name_nepali" placeholder="Name of member in nepali" type="text" required value="{{ old('name_nepali') }}">
                                            @if($errors->any())
                                                <span class="alert-error">{{ $errors->first('name_nepali') }}</span>
                                            @endif
                                        </div>
                                </div>
                                 <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Date of birth Nepali (YYYY-MM-DD) B.S.:</label>
                                            <input class="form-control" id="date_of_birth_nepali" name="date_of_birth_nepali" placeholder="YYYY-MM-DD" type="text" required value="{{ old('date_of_birth_nepali') }}">
                                            @if($errors->any())
                                                <span class="alert-error">{{ $errors->first('date_of_birth_nepali') }}</span>
                                            @endif
                                        </div>
                                </div>
                                  <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Material Status:</label>
                                            <select class="form-control" name="marital_status" id="marital_status" required >
                                                <option value="{{ old('marital_status') }}">Select Material Status</option>
                                                <option value="MARRIED">Married</option>
                                                <option value="UN-MARRIED">Un-married</option>
                                                <option value="DIVORCED">Divorced</option>
                                            </select>
                                            @if($errors->any())
                                                <span class="alert-error">{{ $errors->first('marital_status') }}</span>
                                            @endif
                                        </div>
                                </div>
                                 <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Gender:</label>
                                            <select class="form-control" name="sex" id="sex" required >
                                                <option value="{{ old('sex') }}">Select Gender</option>
                                                <option value="MALE">Male</option>
                                                <option value="FEMALE">Female</option>
                                                <option value="OTHER">Other</option>
                                            </select>
                                            @if($errors->any())
                                                <span class="alert-error">{{ $errors->first('sex') }}</span>
                                            @endif
                                        </div>
                                </div>
                                 <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Resident Number:</label>
                                            <input class="form-control" id="resident_number" name="resident_number" placeholder="Residental Number" type="text" required value="{{ old('resident_number') }}">
                                            @if($errors->any())
                                                <span class="alert-error">
                                                    {{ $errors->first('resident_number') }}
                                                </span>
                                            @endif
                                        </div>
                                </div>
                                 <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Mobile Number:</label>
                                            <input class="form-control" id="mobile_number" name="mobile_number" placeholder="Mobile Number" type="text" required value="{{ old('mobile_number') }}">
                                            @if($errors->any())
                                                <span class="alert-error">
                                                    {{ $errors->first('mobile_number') }}
                                                </span>
                                            @endif
                                        </div>
                                </div>
                                  <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Office Number:</label>
                                            <input class="form-control" id="office_number" name="office_number" placeholder="Office Number" type="text" required value="{{ old('office_number') }}">
                                            @if($errors->any())
                                                <span class="alert-error">
                                                    {{ $errors->first('office_number') }}
                                                </span>
                                            @endif
                                        </div>
                                </div>
                                <div class="col-md-12">
                                    <h4>Address</h4>
                                    <h5>Permanent Address</h5>
                                </div>
                                 <div class="col-md-4">
                                       <div class="form-select">
                                        <label>Province:</label>
                                        <select class="form-control" name="marital_status" id="marital_status">
                                            <option value="">Married</option>
                                            <option  value="">Un-married</option>
                                        </select>
                                        </div>
                                </div>
                                 <div class="col-md-4">
                                       <div class="form-select">
                                        <label>District:</label>
                                        <select class="form-control" name="marital_status" id="marital_status">
                                            <option value="">Married</option>
                                            <option  value="">Un-married</option>
                                        </select>
                                        </div>
                                </div>
                                   <div class="col-md-4">
                                       <div class="form-select">
                                        <label>Municipality/VDC:</label>
                                        <select class="form-control" name="marital_status" id="marital_status">
                                            <option value="">Married</option>
                                            <option  value="">Un-married</option>
                                        </select>
                                        </div>
                                </div>
                                  <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Town:</label>
                                            <input class="form-control" id="office_number" name="office_number" placeholder="Office Number" type="text" required value="{{ old('office_number') }}">
                                            @if($errors->any())
                                                <span class="alert-error">
                                                    {{ $errors->first('office_number') }}
                                                </span>
                                            @endif
                                        </div>
                                </div>
                                  <div class="col-md-4">
                                        <div class="form-group">
                                            <label>House Number:</label>
                                            <input class="form-control" id="office_number" name="office_number" placeholder="Office Number" type="text" required value="{{ old('office_number') }}">
                                            @if($errors->any())
                                                <span class="alert-error">
                                                    {{ $errors->first('office_number') }}
                                                </span>
                                            @endif
                                        </div>
                                </div>
                              
                                 <div class="col-md-12">
                                    <h5>Present Address</h5>
                                </div>
                                 <div class="col-md-4">
                                       <div class="form-select">
                                        <label>Province:</label>
                                        <select class="form-control" name="marital_status" id="marital_status">
                                            <option value="">Married</option>
                                            <option  value="">Un-married</option>
                                        </select>
                                        </div>
                                </div>
                                 <div class="col-md-4">
                                       <div class="form-select">
                                        <label>District:</label>
                                        <select class="form-control" name="marital_status" id="marital_status">
                                            <option value="">Married</option>
                                            <option  value="">Un-married</option>
                                        </select>
                                        </div>
                                </div>
                                   <div class="col-md-4">
                                       <div class="form-select">
                                        <label>Municipality/VDC:</label>
                                        <select class="form-control" name="marital_status" id="marital_status">
                                            <option value="">Married</option>
                                            <option  value="">Un-married</option>
                                        </select>
                                        </div>
                                </div>
                                  <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Town:</label>
                                            <input class="form-control" id="office_number" name="office_number" placeholder="Office Number" type="text" required value="{{ old('office_number') }}">
                                            @if($errors->any())
                                                <span class="alert-error">
                                                    {{ $errors->first('office_number') }}
                                                </span>
                                            @endif
                                        </div>
                                </div>
                                  <div class="col-md-4">
                                        <div class="form-group">
                                            <label>House Number:</label>
                                            <input class="form-control" id="office_number" name="office_number" placeholder="Office Number" type="text" required value="{{ old('office_number') }}">
                                            @if($errors->any())
                                                <span class="alert-error">
                                                    {{ $errors->first('office_number') }}
                                                </span>
                                            @endif
                                        </div>
                                </div>
                              
                                 <div class="col-md-12">
                                    <h4>Identity Card</h4>
                                </div>
                                  
                                   
                                  <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Citizenship Number:</label>
                                            <input class="form-control" id="office_number" name="office_number" placeholder="Office Number" type="text" required value="{{ old('office_number') }}">
                                            @if($errors->any())
                                                <span class="alert-error">
                                                    {{ $errors->first('office_number') }}
                                                </span>
                                            @endif
                                        </div>
                                </div>
                                  <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Password Number:</label>
                                            <input class="form-control" id="office_number" name="office_number" placeholder="Office Number" type="text" required value="{{ old('office_number') }}">
                                            @if($errors->any())
                                                <span class="alert-error">
                                                    {{ $errors->first('office_number') }}
                                                </span>
                                            @endif
                                        </div>
                                </div>
                                <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Driving Licence No:</label>
                                            <input class="form-control" id="office_number" name="office_number" placeholder="Office Number" type="text" required value="{{ old('office_number') }}">
                                            @if($errors->any())
                                                <span class="alert-error">
                                                    {{ $errors->first('office_number') }}
                                                </span>
                                            @endif
                                        </div>
                                </div>
                              
                            
                                
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="form-group">
                                        <label>Permanent Address:</label>
                                            <input class="form-control" id="permanentAddress" name="permanent_address" placeholder="Permanent Address" type="email">
                                            <span class="alert-error"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="form-group">
                                        <label>Temporary Address:</label>
                                            <input class="form-control" id="temporaryAddress" name="temporary_address" placeholder="Temporary Address" type="text">
                                            <span class="alert-error"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3" style="margin-right: 10px;">
                                    <div class="row">
                                        <div class="form-group">
                                            <label>Date of Birth:</label>
                                            <input class="form-control" id="dateOfBirth" name="date_of_birth" placeholder="" type="date">
                                            <span class="alert-error"></span>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-3">
                                    <div class="row">
                                        <div class="form-select">
                                            <label>Sex:</label>
                                            <select class="form-control" name="sex" id="sex">
                                            <option  value="">Male</option>
                                            <option  value="">Female</option>
                                            <option  value="">Others</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="form-group">
                                        <label>Name Of Father/Husband:</label>
                                            <input class="form-control" id="nameOfFather" name="name_of_father" placeholder="Name Of Father or Husband" type="text">
                                            <span class="alert-error"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="form-group">
                                            <label>Name Of Gurardian (in case of minor):</label>
                                            <input class="form-control" id="nameOfGurardian" name="name_of_gurardian" placeholder="Gurardian Name" type="text">
                                            <span class="alert-error"></span>
                                        </div>
                                    </div>
                                </div>  
                                <div class="col-md-12">
                                    <div>
                                    <h4>Contact Phone No:</h4>
                                    </div>
                                    <div class="col-md-3"style="margin-right: 10px;">
                                    <div class="row">
                                        <div class="form-group">
                                            <label>Resident Number:</label>
                                            <input class="form-control" id="residentNumber" name="resident_number" placeholder="Resident Phone number" type="text">
                                            <span class="alert-error"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3" style="margin-right: 10px;">
                                    <div class="row">
                                        <div class="form-group">
                                        <label>Office Number:</label>
                                            <input class="form-control" id="nameOfGurardian" name="name_of_gurardian" placeholder="Office Phone Number" type="text">
                                            <span class="alert-error"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="row">
                                        <div class="form-group">
                                            <label>Mobile Number:</label>
                                            <input class="form-control" id="mobileNumber" name="mobile_number" placeholder="Mobile Phone Number" type="text">
                                            <span class="alert-error"></span>
                                        </div>
                                    </div>
                                    </div>
                                </div>  
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="form-group">
                                            <label>Occupation:</label>
                                            <input class="form-control" id="occupation" name="occupation" placeholder="occupation" type="text">
                                            <span class="alert-error"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-7" style="margin-right: 10px;">
                                    <div class="row">
                                        <div class="form-group">
                                            <label>Name Of Nominee:</label>
                                            <input class="form-control" id="nameOfNominee" name="name_of_nominee" placeholder="Name of Nominee" type="text">
                                            <span class="alert-error"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="row">
                                        <div class="form-group">
                                            <label>Relation To Me:</label>
                                            <input class="form-control" id="relationToMe" name="relation_to_me" placeholder="Relation" type="text">
                                            <span class="alert-error"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="form-group">
                                        <label>Address:</label>
                                            <input class="form-control" id="nominee'sAddress" name="nominee's_address" placeholder="Nominee's Address" type="text">
                                            <span class="alert-error"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <button type="submit" name="submit" id="submit">
                                                Previous
                                            </button>
                                        </div>
                                    </div>
                                                <div class="col-md-6">
                                                    <div class="row next">
                                                        <button type="submit" name="submit" id="submit">
                                                            Next
                                                        </button>
                                                    </div>
                                                </div>
                                                <!-- Alert Message -->
                                                <div class="col-md-12 alert-notification">
                                                    <div id="message" class="alert-msg"></div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                     </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Application form -->

@endsection


@push('scripts')
 <script>
   $(document).ready(function() {
    $('.js-example-basic-single').select2();
});

 </script>
    
@endpush