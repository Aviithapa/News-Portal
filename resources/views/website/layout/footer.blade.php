 <footer class="footer-wrapper footer-layout1" data-bg-src="assets/img/bg/footer_bg_1.png">
        <div class="widget-area">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-md-6 col-xl-3">
                        <div class="widget footer-widget">
                            <div class="th-widget-about">
                                <div class="about-logo">
                                     <img class="light-img" src="{{ getSiteSetting('logo_image') }}"  alt={{ getSiteSetting('site_title') }} style="height:100px"/>

                                </div>
                                 {!! getSiteSetting('meta_description')   !!}
                                <div class="th-social style-black">
                                    <a href="{{ getSiteSetting('social_fb') }}" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                        <a href="{{ getSiteSetting('social_twitter') }}" target="_blank"><i class="fab fa-twitter"></i></a>
                                        <a href="{{ getSiteSetting('social_twitter') }}" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                                        <a href="{{ getSiteSetting('social_instagram') }}" target="_blank"><i class="fab fa-instagram"></i></a>
                                        <a href="{{ getSiteSetting('social_youtube') }}" target="_blank"><i class="fab fa-youtube"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-auto">
                        <div class="widget widget_nav_menu footer-widget">
                            <h3 class="widget_title">Categories</h3>
                            <div class="menu-all-pages-container">
                                <ul class="menu">
                                     @foreach($categories as $category)
                                  <li><a href="">{{ $category->name_nepali }}</a></li>
                                @endforeach
                                   
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-auto">
                        <div class="widget footer-widget">
                            <h3 class="widget_title">Recent Posts</h3>
                            <div class="recent-post-wrap">
                                @foreach($recentPostsFotter as $rPF)
                                <div class="recent-post">
                                    <div class="media-img" style="height: 100px;">
                                        <a href="{{ url('news-details/' . $rPF->id)  }}"><img src="{{ $rPF->getImageUrlAttribute() }}" alt="{{$rPF->title}}" style="object-fit: contain;"></a>
                                    </div>
                                    <div class="media-body">
                                        <h4 class="post-title"><a class="hover-line" href="{{ url('news-details/' . $rPF->id)  }}">
                                           {{ truncateText($rPF->title)}}
                                        </a></h4>
                                        <div class="recent-post-meta">
                                            <a href="{{ url('news-details/' . $rPF->id)  }}"><i class="fal fa-calendar-days"></i>
                                                {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $rPF->created_at)->format('d M, Y') }}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3">
                        <div class="widget widget_tag_cloud footer-widget">
                            <h3 class="widget_title">Popular Tags</h3>
                            <div class="tagcloud">
                                @foreach($categories as $category)
                                  <a href="">{{ $category->name_nepali }}</a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-wrap">
            <div class="container">
                <div class="row jusity-content-between align-items-center">
                    <div class="col-lg-5">
                        <p class="copyright-text">Copyright <i class="fal fa-copyright"></i> 2024 <a href="{{ url('/') }}">{{ getSiteSetting('site_title') }}</a>. All Rights Reserved.</p>
                    </div>
                    <div class="col-lg-auto ms-auto d-none d-lg-block">
                        <div class="footer-links">
                            <ul>
                                <li><a href="{{ url('/') }}">Home</a></li>
                                <li><a href="{{ url('/') }}">About Us</a></li>
                                <li><a href="{{ url('/') }}">Faq</a></li>
                                <li><a href="{{ url('/') }}">Contact Us</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>


     <!-- Scroll To Top -->
    <div class="scroll-top">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919, 307.919; stroke-dashoffset: 307.919;"></path>
        </svg>
    </div>
   