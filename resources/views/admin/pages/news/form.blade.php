@extends('admin.layout.app')

@section('content')


<style type="text/css">
        .dropdown-toggle{
            height: 40px;
            width: 400px !important;
        }
        .bootstrap-select:not([class*="col-"]):not([class*="form-control"]):not(.input-group-btn) {
            width: 100% !important;
        }
        .bootstrap-select > .dropdown-toggle{
             width: 100% !important;
        }
    </style>

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
                                         News</h4>
                                    <p class="text-muted mb-0">
                                    </p>
                                </div>
                                <div class="card-body">
                                       @if(isset($model))
                                             <form method="POST" action="{{ route('news.update', ["news" => $model->id]) }}" enctype="multipart/form-data">
                                                 @method('PUT')
                                        @else
                                            <form method="POST" action="{{ route('news.store') }}" enctype="multipart/form-data">
                                        @endif
                                        @csrf
                              
                                        <div class="row"> 
                                         
                                            <div class="col-lg-6 col-md-6 col-sm-12"> 
                                                <div class="mb-3">
                                                    <label class="form-label" for="validationCustom01">Title</label>
                                                    <input type="text" class="form-control" placeholder="Title" name="title"  required value="{{ isset($model) ? $model->title :old('title') }}"">
                                                      @if($errors->any())
                                                         {{ $errors->first('name') }}
                                                      @endif
                                                </div>
                                            </div> 
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="mb-3">
                                                    <label class="form-label" for="validationCustom01">Type </label>
                                                    <input type="text" class="form-control" id="validationCustom01" placeholder="Type" name="type" value="News Management" disabled>
                                                     @if($errors->any())
                                                         {{ $errors->first('email') }}
                                                      @endif
                                                </div>
                                            </div>

                                             

                                             <div class="form-group mb-3">
                                                <label> Excerpt </label> <span>**Note : If this is video news then please paste the you tube link here</span>
                                                <textarea class="form-control"  placeholder="Enter the Description" rows="5" name="excerpt">{{ isset($model) ? $model->excerpt :old('excerpt') }}</textarea>
                                            </div>

                                             <div class="form-group mb-3">
                                                <label> Content </label>
                                                <textarea class="form-control" id="task-textarea" placeholder="Enter the Description" rows="10" name="content">{{ isset($model) ? $model->content :old('content') }}</textarea>
                                            </div>

                                           <div class="col-lg-3 col-md-3 col-sm-6"> 
                                                <div class="mb-3 form-check">
                                                    <input type="checkbox" class="form-check-input @error('is_top_news') is-invalid @enderror" id="is_top_news" name="is_top_news" value="1" {{ isset($model) && $model->is_top_news ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="is_top_news">Is Top News</label>
                                                    @error('is_top_news')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-lg-3 col-md-3 col-sm-6"> 
                                                <div class="mb-3 form-check">
                                                    <input type="checkbox" class="form-check-input @error('is_featured_post') is-invalid @enderror" id="is_featured_post" name="is_featured_post" value="1" {{ isset($model) && $model->is_featured_post ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="is_featured_post">Is Featured Post</label>
                                                    @error('is_featured_post')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <!-- is_breaking_news checkbox -->
                                            <div class="col-lg-3 col-md-3 col-sm-6"> 
                                                <div class="mb-3 form-check">
                                                    <input type="checkbox" class="form-check-input @error('is_breaking_news') is-invalid @enderror" id="is_breaking_news" name="is_breaking_news" value="1" {{ isset($model) && $model->is_breaking_news ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="is_breaking_news">Is Breaking News</label>
                                                    @error('is_breaking_news')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <!-- is_trending_news checkbox -->
                                            <div class="col-lg-3 col-md-3 col-sm-6"> 
                                                <div class="mb-3 form-check">
                                                    <input type="checkbox" class="form-check-input @error('is_trending_news') is-invalid @enderror" id="is_trending_news" name="is_trending_news" value="1" {{ isset($model) && $model->is_trending_news ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="is_trending_news">Is Trending News</label>
                                                    @error('is_trending_news')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                           <div class="col-lg-12 col-md-12 col-sm-12"> 
                                                <div class="mb-3">
                                                    <label class="form-label" for="validationCustom02">Select News Categories</label> <br />
                                                    <select class="form-select" name="categories[]" id="select" multiple style="width: 100%;">
                                                        <option value="">Select News Category</option>
                                                        @foreach($categories as $category)
                                                            <option value="{{ $category->id }}" 
                                                                    {{ isset($model) && $model->categories->contains($category) ? 'selected' : '' }}>
                                                                {{ $category->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @if($errors->has('categories'))
                                                        <div class="text-danger">{{ $errors->first('categories') }}</div>
                                                    @endif
                                                </div>
                                            </div>

                                             <div class="col-lg-12 col-md-12 col-sm-12"> 
                                                <div class="mb-3">
                                                    <label class="form-label" for="validationCustom02">Select News Type</label> <br />
                                                    <select class="form-select" name="news_type"  style="width: 100%;">
                                                        <option value="">Select News Type</option>
                                                        <option value="text" {{ isset($model) && $model->news_type === 'text' ? 'selected' : '' }}>Text</option>
                                                        <option value="video" {{ isset($model) && $model->news_type === 'video' ? 'selected' : '' }}>Video</option>
                                                    </select>
                                                    @if($errors->has('news_type'))
                                                        <div class="text-danger">{{ $errors->first('news_type') }}</div>
                                                    @endif
                                                </div>
                                            </div>

                                           
                                            <div class="form-group mb-3">
                                                 @if(isset($model) && $model->getImageUrlAttribute())  
                                                    <div class="col-lg-3 col-md-3 col-sm-6" style="position: relative;"> 
                                                        <img src="{{ $model->getImageUrlAttribute()}}" style="height: 200px;"/>    
                                                    </div>
                                                @endif      
                                               <label class="form-label" for="inputFile">Select Cover File:</label>
                                               <input 
                                                type="file" 
                                                name="cover" 
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


@push('scripts')
      @include('admin.parties.ckeditor')
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
   
      <script type="text/javascript">
    $(document).ready(function() {
        $('#select').selectpicker();
    });
</script>

@endpush
