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
                                         Category</h4>
                                    <p class="text-muted mb-0">
                                    </p>
                                </div>
                                <div class="card-body">
                                       @if(isset($model))
                                             <form method="POST" action="{{ route('category.update', ["category" => $model->id]) }}">
                                                 @method('PUT')
                                        @else
                                            <form method="POST" action="{{ route('category.store') }}">
                                        @endif
                                        @csrf
                              
                                        <div class="row"> 
                                         
                                            <div class="col-lg-6 col-md-6 col-sm-12"> 
                                                <div class="mb-3">
                                                    <label class="form-label" for="validationCustom01">Name</label>
                                                    <input type="text" class="form-control" placeholder="Name" name="name"  required value={{ isset($model) ? $model->name :old('name') }}>
                                                      @if($errors->any())
                                                         {{ $errors->first('name') }}
                                                      @endif
                                                </div>
                                            </div> 

                                             <div class="col-lg-6 col-md-6 col-sm-12"> 
                                                <div class="mb-3">
                                                    <label class="form-label" for="validationCustom01">Name Nepali</label>
                                                    <input type="text" class="form-control" placeholder="Name Nepali" name="name_nepali"  required value={{ isset($model) ? $model->name_nepali :old('name_nepali') }}>
                                                      @if($errors->any())
                                                         {{ $errors->first('name_nepali') }}
                                                      @endif
                                                </div>
                                            </div> 

                                            <div class="col-lg-6 col-md-6 col-sm-12"> 
                                                <div class="mb-3">
                                                    <label class="form-label" for="validationCustom02">Is Child Of</label>
                                                    <select class="form-select" name="parent_id">
                                                        <option value="">Select Parent Category</option>
                                                        <option value="" {{ isset($model) && is_null($model->parent_id) ? 'selected' : '' }}>No Parent</option>
                                                        @foreach($categories as $category)
                                                            <option value="{{ $category->id }}" {{ isset($model) && $model->parent_id == $category->id ? 'selected' : '' }}>
                                                                {{ $category->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @if($errors->has('parent_id'))
                                                        <div class="text-danger">{{ $errors->first('parent_id') }}</div>
                                                    @endif
                                                </div>
                                            </div>

                                             <div class="col-lg-6 col-md-6 col-sm-12"> 
                                                <div class="mb-3">
                                                    <label class="form-label" for="validationCustom01">Tag Color</label>
                                                    <input type="color" class="form-control" id="tag-color" name="color" value="{{ isset($model) ? $model->color : old('color') }}">
                                                    
                                                    @error('tag_color')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
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


@push('scripts')
      @include('admin.parties.ckeditor')
@endpush
