@extends('website.layout.app')

@section('content')


    <!--==============================
    Breadcumb
============================== -->
    <div class="breadcumb-wrapper">
        <div class="container">
            <ul class="breadcumb-menu">
                <li><a href="{{ url('/') }}">होमपेज</a></li>
                <li>{{ $newsDetails->title }}</li>
            </ul>
        </div>
    </div><!--==============================
    Blog Area
==============================-->




    <section class="th-blog-wrapper blog-details space-top space-extra-bottom">
        <div class="container">
            <div class="row">
                <div class="col-12">
                       @foreach($newsDetails->categories as $category)
                            <a data-theme-color="{{ $category->color }}" href="{{ url('news-list/category/'. $category->id) }}" class="category">{{ $category->name }}</a>
                        @endforeach
            
                    <h2 class="blog-title">{{ $newsDetails->title }}</h2>
                    <div class="blog-meta">
                        <a class="author" href="author.html"><i class="far fa-user"></i>By - Tnews</a>
                        <a href="blog.html"><i class="fal fa-calendar-days"></i> {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $newsDetails->created_at)->format('d M, Y') }}</a>
                        <span><i class="far fa-book-open"></i>5 Mins Read</span>
                    </div>
                    <div class="blog-img mb-40" style="height: 300px">
                        <img src="{{ $newsDetails->getImageUrlAttribute() }}" alt="{{ $newsDetails->title }}" style="object-fit: contain; width: 100%; height: 100%;"  >
                    </div>
                </div>
                <div class="col-xxl-9 col-lg-8">
                    <div class="th-blog blog-single">
                        <div class="blog-content-wrap">
                            <div class="share-links-wrap">
                                <div class="share-links">
                                    <span class="share-links-title">Share Post:</span>
                                    <div class="multi-social">
                                        <a href="{{ getSiteSetting('social_fb') }}" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                        <a href="{{ getSiteSetting('social_twitter') }}" target="_blank"><i class="fab fa-twitter"></i></a>
                                        <a href="{{ getSiteSetting('social_twitter') }}" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                                        <a href="{{ getSiteSetting('social_instagram') }}" target="_blank"><i class="fab fa-instagram"></i></a>
                                        <a href="{{ getSiteSetting('social_youtube') }}" target="_blank"><i class="fab fa-youtube"></i></a>
                                    </div><!-- End Social Share -->
                                </div>
                            </div>
                            <div class="blog-content">
                                <div class="blog-info-wrap">
                                   
                                </div>
                                <div class="content">
                                    {!! $newsDetails->content !!}
                                </div>
                                <div class="widget mb-30">
                                    <div class="widget-ads">
                                      <a href="{{  getAdDetail('details-page') }}">
                                        <img
                                          class="w-100"
                                          src="{{ getAdsImage('details-page') }}"
                                          alt="ads"
                                        />
                                      </a>
                                    </div>
                                  </div>
                                <div class="blog-tag">
                                    <h6 class="title">Related Tag :</h6>
                                    <div class="tagcloud">
                                            @foreach($newsDetails->categories as $category)
                                                 <a href="{{ url('news-list/category/'. $category->id) }}">{{ $category->name_nepali }}</a>
                                            @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                 
                    <div class="related-post-wrapper pt-30 mb-30">
                        <div class="row align-items-center">
                            <div class="col">
                                <h2 class="sec-title has-line">Related Post</h2>
                            </div>
                            <div class="col-auto">
                                <div class="sec-btn">
                                    <div class="icon-box">
                                        <button data-slick-prev="#related-post-slide" class="slick-arrow default"><i class="far fa-arrow-left"></i></button>
                                        <button data-slick-next="#related-post-slide" class="slick-arrow default"><i class="far fa-arrow-right"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row slider-shadow th-carousel" id="related-post-slide" data-slide-show="3" data-lg-slide-show="2" data-md-slide-show="2" data-sm-slide-show="2">
                           
                           @foreach($relatedPosts as $post)
                            <div class="col-sm-6 col-xl-4">
                                <div class="blog-style1">
                                    <div class="blog-img" style="height: 125px">
                                        <img src="{{ $post->getImageUrlAttribute() }}" alt="blog image" style="object-fit: contain;">
                                    </div>
                                    <h3 class="box-title-22"><a class="hover-line" href="{{ url('news-details/'. $post->id) }}">{{ truncateText($post->title) }}</a></h3>
                                    <div class="blog-meta">
                                        <a href="#"><i class="far fa-user"></i>By - Shree Bindu</a>
                                        <a href="#"><i class="fal fa-calendar-days"></i>
                                         {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $post->created_at)->format('d M, Y') }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                @include('website.layout.sidebar')
            </div>
        </div>
    </section>

@endsection