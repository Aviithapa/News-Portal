@extends('admin.layout.app')

@section('content')

                    <div class="row mt-5">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="header-title">
                                        @if(isset($model))
                                        Edit
                                        @else
                                        Create
                                        @endif
                                         Ads</h4>
                                    <p class="text-muted mb-0">
                                    </p>
                                </div>
                                <div class="card-body">
                                       @if(isset($model))
                                             <form method="POST" action="{{ route('ads.update', ["ad" => $model->id]) }}" enctype="multipart/form-data">
                                                 @method('PUT')
                                        @else
                                            <form method="POST" action="{{ route('ads.store') }}" enctype="multipart/form-data">
                                        @endif
                                        @csrf
                              
                                        <div class="row"> 
                                         
                                            <div class="col-lg-6 col-md-6 col-sm-12"> 
                                                <div class="mb-3">
                                                    <label class="form-label" for="validationCustom01">Title</label>
                                                    <input type="text" class="form-control" placeholder="Title" name="title"  required value="{{ isset($model) ? $model->title :old('title') }}">
                                                      @if($errors->any())
                                                         {{ $errors->first('title') }}
                                                      @endif
                                                </div>
                                            </div> 
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="mb-3">
                                                    <label class="form-label" for="validationCustom01">Link </label>
                                                    <input type="text" class="form-control" id="validationCustom01" placeholder="Type" name="link" value="{{ isset($model) ? $model->link :old('link') }}">
                                                     @if($errors->any())
                                                         {{ $errors->first('link') }}
                                                      @endif
                                                </div>
                                            </div>

                                           <div class="col-lg-3 col-md-3 col-sm-6"> 
                                                <div class="mb-3 form-check">
                                                    <input type="checkbox" class="form-check-input @error('is_active') is-invalid @enderror" id="is_active" name="is_active" value="1" {{ isset($model) && $model->is_active ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="is_active">Is Active</label>
                                                    @error('is_active')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                           
                                            <div class="form-group mb-3">
                                                 @if(isset($model) && $model->getImageUrlAttribute())  
                                                    <div class="col-lg-3 col-md-3 col-sm-6" style="position: relative;"> 
                                                        <img src="{{ $model->getImageUrlAttribute()}}" style="height: 200px;"/>    
                                                    </div>
                                                @endif
                                               <label class="form-label" for="inputFile">Select Image File:</label>
                                               <input 
                                                type="file" 
                                                name="image" 
                                                id="inputFile"
                                                accept="images/*"
                                                class="form-control @error('cover') is-invalid @enderror">
                                            </div>
                                        </div>
                                            
                                        <button class="btn btn-primary mt-5" type="submit">Submit form</button>
                                    </form>

                                </div> <!-- end card-body-->
                            </div> <!-- end card-->
                        </div> <!-- end col-->
                    </div>
                    <!-- end row -->


@endsection