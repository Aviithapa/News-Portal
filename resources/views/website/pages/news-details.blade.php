@extends('website.layout.app')

@section('content')


    <!--==============================
    Breadcumb
============================== -->
    <div class="breadcumb-wrapper">
        <div class="container">
            <ul class="breadcumb-menu">
                <li><a href="{{ url('/') }}">Home</a></li>
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
                                        <a href="https://facebook.com/" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                        <a href="https://twitter.com/" target="_blank"><i class="fab fa-twitter"></i></a>
                                        <a href="https://linkedin.com/" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                                        <a href="https://pinterest.com/" target="_blank"><i class="fab fa-pinterest-p"></i></a>
                                        <a href="https://instagram.com/" target="_blank"><i class="fab fa-instagram"></i></a>
                                    </div><!-- End Social Share -->
                                </div>
                            </div>
                            <div class="blog-content">
                                <div class="blog-info-wrap">
                                    {{-- <button class="blog-info print_btn">
                                        Print :
                                        <i class="fas fa-print"></i>
                                    </button>
                                    <a class="blog-info" href="mailto:">
                                        Email :
                                        <i class="fas fa-envelope"></i>
                                    </a>
                                    <button class="blog-info ms-sm-auto">15k <i class="fas fa-thumbs-up"></i></button>
                                    <span class="blog-info">126k <i class="fas fa-eye"></i></span>
                                    <span class="blog-info">12k <i class="fas fa-share-nodes"></i></span> --}}
                                </div>
                                <div class="content">
                                    {!! $newsDetails->content !!}
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
                    {{-- <div class="blog-navigation">
                        <div class="nav-btn prev">
                            <div class="img">
                                <img src="assets/img/blog/blog-nav-1.jpg" alt="blog img" class="nav-img">
                            </div>
                            <div class="media-body">
                                <h5 class="title">
                                    <a class="hover-line" href="blog-details.html">Game on! Embrace the spirit of sportsmanship</a>
                                </h5>
                                <a href="blog-details.html" class="nav-text"><i class="fas fa-arrow-left me-2"></i>Prev</a>
                            </div>
                        </div>
                        <div class="divider"></div>
                        <div class="nav-btn next">
                            <div class="media-body">
                                <h5 class="title">
                                    <a class="hover-line" href="blog-details.html">Push your limits, redefine what's possible</a>
                                </h5>
                                <a href="blog-details.html" class="nav-text">Next<i class="fas fa-arrow-right ms-2"></i></a>
                            </div>
                            <div class="img">
                                <img src="assets/img/blog/blog-nav-2.jpg" alt="blog img" class="nav-img">
                            </div>
                        </div>
                    </div>
                    <div class="blog-author">
                        <div class="auhtor-img">
                            <img src="assets/img/blog/blog-author.jpg" alt="Blog Author Image">
                        </div>
                        <div class="media-body">
                            <div class="author-top">
                                <div>
                                    <h3 class="author-name"><a class="text-inherit" href="team-details.html">Ronald Richards</a></h3>
                                    <span class="author-desig">Founder & CEO</span>
                                </div>
                                <div class="social-links">
                                    <a href="https://facebook.com/" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                    <a href="https://twitter.com/" target="_blank"><i class="fab fa-twitter"></i></a>
                                    <a href="https://linkedin.com/" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                                    <a href="https://instagram.com/" target="_blank"><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                            <p class="author-text">Adventurer and passionate travel blogger. With a backpack full of stories and a camera in hand, she takes her readers on exhilarating journeys around the world.</p>
                        </div>
                    </div> --}}
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
                                    <div class="blog-img">
                                        <img src="{{ $post->getImageUrlAttribute() }}" alt="blog image">
                                       @foreach($post->categories as $category)
                                                <a data-theme-color="{{ $category->color }}" href="{{ url('news-list/category/'. $category->id) }}" class="category">{{ $category->name }}</a>
                                        @endforeach
                                    </div>
                                    <h3 class="box-title-22"><a class="hover-line" href="{{ url('news-details/'. $post->id) }}">{{ $post->title }}</a></h3>
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
                <div class="col-xxl-3 col-lg-4 sidebar-wrap">
                    <aside class="sidebar-area">
                        <div class="widget widget_search  ">
                            <form class="search-form">
                                <input type="text" placeholder="Enter Keyword">
                                <button type="submit"><i class="far fa-search"></i></button>
                            </form>
                        </div>
                        <div class="widget widget_categories  ">
                            <h3 class="widget_title">Categories</h3>
                            <ul>
                                @foreach($newsDetails->categories as $category)
                                <li>
                                    <a href="">{{ $category->name_nepali }}</a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="widget  ">
                            <h3 class="widget_title">Recent Posts</h3>
                            <div class="recent-post-wrap">
                                <div class="recent-post">
                                    <div class="media-img">
                                        <a href="blog-details.html"><img src="assets/img/blog/recent-post-1-1.jpg" alt="Blog Image"></a>
                                    </div>
                                    <div class="media-body">
                                        <h4 class="post-title"><a class="hover-line" href="blog-details.html">Fitness: Your journey to Better, stronger you.</a></h4>
                                        <div class="recent-post-meta">
                                            <a href="blog.html"><i class="fal fa-calendar-days"></i>21 June, 2023</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="recent-post">
                                    <div class="media-img">
                                        <a href="blog-details.html"><img src="assets/img/blog/recent-post-1-2.jpg" alt="Blog Image"></a>
                                    </div>
                                    <div class="media-body">
                                        <h4 class="post-title"><a class="hover-line" href="blog-details.html">Embrace the game Ignite your sporting</a></h4>
                                        <div class="recent-post-meta">
                                            <a href="blog.html"><i class="fal fa-calendar-days"></i>22 June, 2023</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="recent-post">
                                    <div class="media-img">
                                        <a href="blog-details.html"><img src="assets/img/blog/recent-post-1-3.jpg" alt="Blog Image"></a>
                                    </div>
                                    <div class="media-body">
                                        <h4 class="post-title"><a class="hover-line" href="blog-details.html">Revolutionizing lives Through technology</a></h4>
                                        <div class="recent-post-meta">
                                            <a href="blog.html"><i class="fal fa-calendar-days"></i>23 June, 2023</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="recent-post">
                                    <div class="media-img">
                                        <a href="blog-details.html"><img src="assets/img/blog/recent-post-1-4.jpg" alt="Blog Image"></a>
                                    </div>
                                    <div class="media-body">
                                        <h4 class="post-title"><a class="hover-line" href="blog-details.html">Enjoy the Virtual Reality embrace the</a></h4>
                                        <div class="recent-post-meta">
                                            <a href="blog.html"><i class="fal fa-calendar-days"></i>25 June, 2023</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="widget  ">
                            <div class="widget-ads">
                                <a href="https://themeforest.net/user/themeholy/portfolio">
                                    <img class="w-100" src="assets/img/ads/siderbar_ads_1.jpg" alt="ads">
                                </a>
                            </div>
                        </div>
                        <div class="widget widget_tag_cloud  ">
                            <h3 class="widget_title">Popular Tags</h3>
                            <div class="tagcloud">
                                 @foreach($categories as $category)
                            
                                    <a href="">{{ $category->name_nepali }}</a>

                                @endforeach
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </section>

@endsection