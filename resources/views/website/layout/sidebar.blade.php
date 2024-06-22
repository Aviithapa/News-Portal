<div class="col-xxl-3 col-lg-4 sidebar-wrap">
    <aside class="sidebar-area">
        <div class="widget widget_search  ">
            <form class="search-form">
                <input type="text" placeholder="Enter Keyword">
                <button type="submit"><i class="far fa-search"></i></button>
            </form>
        </div>
        @isset($newsDetails->categories)
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
        @endisset
        <div class="widget  ">
            <h3 class="widget_title">Recent Posts</h3>
            <div class="recent-post-wrap">
                @foreach($recentPosts as $rP)
                <div class="recent-post">
                    <div class="media-img">
                        <a href=""><img src="{{ $rP->getImageUrlAttribute() }}" alt={{$rP->title}}></a>
                    </div>
                    <div class="media-body">
                        <h4 class="post-title">
                            <a class="hover-line" href="{{ url('news-details/' . $rP->id)  }}"
                                >{{$rP->title}}</a
                              >
                        </h4>
                        <div class="recent-post-meta">
                            <a href="{{ url('news-details/' . $rP->id)  }}"><i class="fal fa-calendar-days"></i>
                                {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $rP->created_at)->format('d M, Y') }}
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        {{-- <div class="widget  ">
            <div class="widget-ads">
                <a href="https://themeforest.net/user/themeholy/portfolio">
                    <img class="w-100" src="assets/img/ads/siderbar_ads_1.jpg" alt="ads">
                </a>
            </div>
        </div> --}}
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