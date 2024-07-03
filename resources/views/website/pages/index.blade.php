@extends('website.layout.app')

@section('content')




    <!--==============================
                        Blog Area
                        ==============================-->
    <section class="space" style="padding-top: 30px;">
        <div class="container">
            <div class="row">
                <div class="col-xl-9">
                    <div class="row">
                        <div class="col-xl-4">
                            <div class="row gy-4">

                                @foreach ($isTrendingNews as $iTN)
                                    <div class="col-xl-12 col-sm-6 border-blog dark-theme img-overlay2">
                                        <a class="hover-line" href="{{ url('news-details/' . $iTN->id) }}">
                                            <div class="blog-style3">
                                                <div class="blog-img" style="height: 200px">
                                                    <img src="{{ $iTN->getImageUrlAttribute() }}" alt="{{ $iTN->title }}"
                                                        style=" width: 100%; height: 100%;" />
                                                </div>
                                                <div class="blog-content">
                                                    <h3 class="box-title-22">
                                                        <a class="hover-line"
                                                            href="{{ url('news-details/' . $iTN->id) }}">{{ truncateText($iTN->title) }}</a>
                                                    </h3>
                                                    <div class="blog-meta">
                                                        <a href="#"><i class="far fa-user"></i>By - Shree Bindu</a>
                                                        <a href="#"><i class="fal fa-calendar-days"></i>
                                                            {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $iTN->created_at)->format('d M, Y') }}
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                        <div class="col-xl-8 mt-4 mt-xl-0">
                            <div class="dark-theme img-overlay2">
                                <a class="hover-line" href="{{ url('news-details/' . $isFeaturedPost->id) }}">
                                    <div class="blog-style3">
                                        <div class="blog-img" style="height: 450px">
                                            <img src="{{ $isFeaturedPost->getImageUrlAttribute() }}"
                                                alt="{{ $isFeaturedPost->title }}" style="width: 100%; height: 100%;" />
                                        </div>
                                        <div class="blog-content">
                                            <h3 class="box-title-30">
                                                <a class="hover-line"
                                                    href="{{ url('news-details/' . $isFeaturedPost->id) }}">{{ truncateText($isFeaturedPost->title) }}</a>
                                            </h3>
                                            <div class="blog-meta">
                                                <a href="#"><i class="far fa-user"></i>By - Shree Bindu</a>
                                                <a href="#"><i class="fal fa-calendar-days"></i>
                                                    {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $isFeaturedPost->created_at)->format('d M, Y') }}

                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        @if (getAdDetail('banner-bottom'))
                            <div class="header-ads" style="margin-top: 20px;">
                                <a href="{{ getAdDetail('banner-bottom') }}" target="_blank">
                                    <img src="{{ getAdsImage('banner-bottom') }}" alt="ads"
                                        style="object-fit:contain; width: 100%;">
                                </a>
                            </div>
                        @endif


                    </div>
                </div>
                <div class="col-xl-3 mt-35 mt-xl-0">
                    <div class="nav tab-menu indicator-active" role="tablist">
                        <button class="tab-btn active" id="nav-one-tab" data-bs-toggle="tab" data-bs-target="#nav-one"
                            type="button" role="tab" aria-controls="nav-one" aria-selected="true">
                            Top News
                        </button>
                        <button class="tab-btn" id="nav-two-tab" data-bs-toggle="tab" data-bs-target="#nav-two"
                            type="button" role="tab" aria-controls="nav-two" aria-selected="false">
                            Recent News
                        </button>
                    </div>
                    <div class="tab-content">
                        <!-- Single item -->
                        <div class="tab-pane fade show active" id="nav-one" role="tabpanel" aria-labelledby="nav-one-tab">
                            <div class="row gy-4">
                                @foreach ($isTopRated as $iTP)
                                    <div class="col-xl-12 col-md-6 border-blog">
                                        <a class="hover-line" href="{{ url('news-details/' . $iTP->id) }}">
                                            <div class="blog-style2">
                                                <div class="blog-img">
                                                    <img src="{{ $iTP->getImageUrlAttribute() }}"
                                                        alt="{{ $iTP->title }}" />
                                                </div>
                                                <div class="blog-content">
                                                    <h3 class="box-title-18">
                                                        <a class="hover-line"
                                                            href="{{ url('news-details/' . $iTP->id) }}">{{ truncateText($iTP->title) }}</a>
                                                    </h3>
                                                    <div class="blog-meta">
                                                        <a href="#"><i class="fal fa-calendar-days"></i>
                                                            {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $iTP->created_at)->format('d M, Y') }}
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <!-- Single item -->
                        <div class="tab-pane fade" id="nav-two" role="tabpanel" aria-labelledby="nav-two-tab">
                            <div class="row gy-4">
                                @foreach ($recentPosts as $rP)
                                    <div class="col-xl-12 col-md-6 border-blog">
                                        <a class="hover-line" href="{{ url('news-details/' . $rP->id) }}">
                                            <div class="blog-style2">
                                                <div class="blog-img">
                                                    <img src="{{ $rP->getImageUrlAttribute() }}"
                                                        alt="{{ $rP->title }}" />
                                                </div>
                                                <div class="blog-content">

                                                    <h3 class="box-title-18">
                                                        <a class="hover-line"
                                                            href="{{ url('news-details/' . $rP->id) }}">{{ truncateText($rP->title) }}</a>
                                                    </h3>
                                                    <div class="blog-meta">
                                                        <a href="{{ url('news-details/' . $rP->id) }}"><i
                                                                class="fal fa-calendar-days"></i>
                                                            {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $rP->created_at)->format('d M, Y') }}
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="">
        <div class="container">
            <div class="row align-items-center">
                <div class="col">
                    <h2 class="sec-title has-line">Trending News</h2>
                </div>
                <div class="col-auto">
                    <div class="sec-btn">
                        <div class="icon-box">
                            <button data-slick-prev="#blog-slide1" class="slick-arrow default">
                                <i class="far fa-arrow-left"></i>
                            </button>
                            <button data-slick-next="#blog-slide1" class="slick-arrow default">
                                <i class="far fa-arrow-right"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row th-carousel" id="blog-slide1" data-slide-show="4" data-lg-slide-show="3"
                data-md-slide-show="2" data-sm-slide-show="2">

                @foreach ($trendingNews as $tN)
                    <div class="col-sm-6 col-xl-4">
                        <div class="blog-style1">
                            <div class="blog-img" style="height: 200px">
                                <img src="{{ $tN->getImageUrlAttribute() }}" alt="{{ $tN->title }}"
                                    style="object-fit: fit; width: 100%; height: 100%;" />

                            </div>
                            <h3 class="box-title-22">
                                <a class="hover-line"
                                    href="{{ url('news-details/' . $tN->id) }}">{{ truncateText($tN->title) }}</a>
                            </h3>
                            <div class="blog-meta">
                                <a href="#"><i class="far fa-user"></i>By - Shree Bindu</a>
                                <a href="#"><i class="fal fa-calendar-days"></i>
                                    {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $tN->created_at)->format('d M, Y') }}
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    @foreach ($columnCategories as $category)
        @include('website.index.category', ['model' => $category->news, 'title' => $category->name])
    @endforeach


    <section class="space">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <h2 class="sec-title has-line">International News</h2>
                    <div class="row gy-4">
                        @foreach ($internationalNews as $iN)
                            <div class="col-sm-4 border-blog two-column">
                                <a class="hover-line" href="{{ url('news-details/' . $iN->id) }}">
                                    <div class="blog-style1">
                                        <div class="blog-img">
                                            <img src="{{ $iN->getImageUrlAttribute() }}" alt="{{ $iN->title }}" />
                                        </div>
                                        <h3 class="box-title-24">
                                            <a class="hover-line"
                                                href="{{ url('news-details/' . $iN->id) }}">{{ $iN->title }}</a>
                                        </h3>
                                        <div class="blog-meta">
                                            <a href="{{ url('news-details/' . $iN->id) }}"><i class="far fa-user"></i>By
                                                - Shree Bindu</a>
                                            <a href="{{ url('news-details/' . $iN->id) }}"><i
                                                    class="fal fa-calendar-days"></i>
                                                {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $iN->created_at)->format('d M, Y') }}
                                            </a>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @if (getAdDetail('above-video'))
                <div class="header-ads" style="margin-top: 20px;">
                    <a href="{{ getAdDetail('above-video') }}" target="_blank">
                        <img src="{{ getAdsImage('above-video') }}" alt="ads"
                            style="object-fit:contain; width: 100%;">
                    </a>
                </div>
            @endif
        </div>

    </section>

    @if ($videos->count() > 0)
        <div class="space dark-theme bg-title-dark">
            <div class="container">
                <h2 class="sec-title has-line">Latest Video Playlist</h2>
                <div class="row">
                    <div class="col-xl-4 col-lg-2">
                        <div class="blog-tab" data-asnavfor=".blog-tab-slide">

                            @foreach ($videos as $video)
                                <div class="tab-btn">
                                    <div class="blog-style2">
                                        <div class="blog-img img-100">
                                            <img src="{{ $video->getImageUrlAttribute() }}" alt={{ $video->title }}
                                                height="50" style="object-fit: contain; width: 100%; height: 100%;" />

                                            <div class="icon">
                                                <i class="fal fa-waveform-lines"></i>
                                            </div>
                                            <a href="{{ $video->excerpt }}" class="play-btn popup-video"><i
                                                    class="fas fa-play"></i></a>
                                        </div>
                                        <div class="blog-content">
                                            <h3 class="box-title-20">
                                                <a class="hover-line"
                                                    href="{{ url('news-details/' . $video->id) }}">{{ $video->title }}</a>
                                            </h3>
                                            <div class="blog-meta">
                                                <a href="#"><i class="fal fa-calendar-days"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                    <div class="col-xl-8 col-lg-10">
                        <div class="blog-tab-slide th-carousel" data-fade="true" data-slide-show="1"
                            data-md-slide-show="1">
                            @foreach ($videos as $video)
                                <div class="">
                                    <div class="blog-style8">

                                        <div class="blog-img" style="height: 500px">
                                            <img src="{{ $video->getImageUrlAttribute() }}" alt="blog image"
                                                style="object-fit: cover; width: 100%; height: 100%;" />
                                            <a href="{{ $video->excerpt }}" class="play-btn popup-video"><i
                                                    class="fas fa-play"></i></a>
                                        </div>
                                        <h3 class="box-title-30">
                                            <a class="hover-line"
                                                href="{{ url('news-details/' . $video->id) }}">{{ $video->title }}</a>
                                        </h3>
                                        <div class="blog-meta">
                                            >
                                            <a href="#"><i class="far fa-user"></i>By - Shree Bindu</a>
                                            <a href="#"><i class="fal fa-calendar-days"></i>
                                                {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $iTP->created_at)->format('d M, Y') }}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif


    @include('website.index.popular-news', ['model' => $isPopularNews, 'title' => 'Popular News'])

    <!--==============================
                        Blog Area
                        ==============================-->

    @include('website.index.category', ['model' => $featuredPosts, 'title' => 'Featured Post'])
    <div class="space-bottom">

    </div>

@endsection
