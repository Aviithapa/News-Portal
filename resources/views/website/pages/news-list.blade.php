@extends('website.layout.app')

@section('content')

 <div class="breadcumb-wrapper">
        <div class="container">
            <ul class="breadcumb-menu">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li>News Details</li>
            </ul>
        </div>
    </div>


      <section class="th-blog-wrapper space-top space-extra-bottom">
        <div class="container">
            <div class="row">
                <div class="col-xxl-9 col-lg-8">
                    @foreach($newsDetails as $post)
                    <div class="th-blog blog-single has-post-thumbnail">
                        <div class="blog-img">
                            <a href="{{ url('news-details/'. $post->id) }}"><img src="{{ $post->getImageUrlAttribute() }}" alt="Blog Image" style="object-fit: contain;"></a>
                        </div>
                        <div class="blog-content">
                            <div class="blog-meta">
                                <a class="author" href="#"><i class="far fa-user"></i>By - Shree Bindu</a>
                                <a href="#"><i class="fal fa-calendar-days"></i>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $post->created_at)->format('d M, Y') }}</a>
                            </div>
                            <h2 class="blog-title box-title-30"><a href="{{ url('news-details/'. $post->id) }}">{{ $post->title }}</a>
                            </h2>
                            <p class="blog-text">{{ $post->excerpt }}</p>
                            <a href="{{ url('news-details/'. $post->id) }}" class="th-btn style2">Read More<i class="fas fa-arrow-up-right ms-2"></i></a>
                        </div>
                    </div>
                    @endforeach

               
                      
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
                                <li>
                                    <a data-bg-src="assets/img/bg/category_bg_1_1.jpg" href="blog.html">Sports</a>
                                </li>
                                <li>
                                    <a data-bg-src="assets/img/bg/category_bg_1_2.jpg" href="blog.html">Business</a>
                                </li>
                                <li>
                                    <a data-bg-src="assets/img/bg/category_bg_1_3.jpg" href="blog.html">Politics</a>
                                </li>
                                <li>
                                    <a data-bg-src="assets/img/bg/category_bg_1_4.jpg" href="blog.html">Health</a>
                                </li>
                                <li>
                                    <a data-bg-src="assets/img/bg/category_bg_1_5.jpg" href="blog.html">Technology</a>
                                </li>
                                <li>
                                    <a data-bg-src="assets/img/bg/category_bg_1_6.jpg" href="blog.html">Entertainment</a>
                                </li>
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
                                <a href="blog.html">Sports</a>
                                <a href="blog.html">Politics</a>
                                <a href="blog.html">Business</a>
                                <a href="blog.html">Music</a>
                                <a href="blog.html">Food</a>
                                <a href="blog.html">Technology</a>
                                <a href="blog.html">Travels</a>
                                <a href="blog.html">Health</a>
                                <a href="blog.html">Fashions</a>
                                <a href="blog.html">Animal</a>
                                <a href="blog.html">Weather</a>
                                <a href="blog.html">Movies</a>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </section>

@endsection