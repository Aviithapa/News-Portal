<!--==============================
    Mobile Menu
  ============================== -->
<div class="th-menu-wrapper">
    <div class="th-menu-area text-center">
        <button class="th-menu-toggle"><i class="fal fa-times"></i></button>
        <div class="mobile-logo">
            @if (getSiteSetting('logo_image') !== null)
                <a href="{{ url('/') }}">
                    <img class="light-img" src="{{ getSiteSetting('logo_image') }}"
                        alt="{{ getSiteSetting('site_title') }}" alt="logo" style="height: 60px;" />
                </a>
            @else
                <h5 class="company-name">
                    {{ getSiteSetting('site_title') }}
                </h5>
            @endif

        </div>
        <div class="th-mobile-menu">
            <ul>
                <li class="">
                    <a href="{{ url('/') }}">होमपेज</a>
                </li>
                @if (isset($menu))
                    @foreach ($menu as $me)
                        <li><a href="{{ url('/news-list/category/' . $me->id) }}">{{ $me->name_nepali }}</a></li>
                    @endforeach
                @endif


            </ul>
        </div>
    </div>
</div>


<header class="th-header header-layout1">
    <div class="header-top">
        <div class="container">
            <div class="row justify-content-center justify-content-lg-between align-items-center gy-2">
                <div class="col-auto d-none d-lg-block">
                    <div class="header-links">
                        <ul>
                            <li><i class="fal fa-calendar-days"></i><a href="#"><?php echo date('d F, Y'); ?></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-auto">
                    <div class="header-links">
                        <ul>
                            <li>
                                <div class="social-links">
                                    <a href="{{ getSiteSetting('social_fb') }}" target="_blank"><i
                                            class="fab fa-facebook-f"></i></a>
                                    <a href="{{ getSiteSetting('social_twitter') }}" target="_blank"><i
                                            class="fab fa-twitter"></i></a>
                                    <a href="{{ getSiteSetting('social_twitter') }}" target="_blank"><i
                                            class="fab fa-linkedin-in"></i></a>
                                    <a href="{{ getSiteSetting('social_instagram') }}" target="_blank"><i
                                            class="fab fa-instagram"></i></a>
                                    <a href="{{ getSiteSetting('social_youtube') }}" target="_blank"><i
                                            class="fab fa-youtube"></i></a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-middle" style="padding: 0px; height:120px !important;">
        <div class="container" style="display: flex; justify-content:center; align-items:center;">
            <div class="row justify-content-center justify-content-lg-between align-center">
                <div class="col-lg-4" style="align-content: center;">
                    @if (getAdDetail('heading-top-left'))
                        <div class="header-ads">
                            <a href="{{ getAdDetail('heading-top-left') }}" target="_blank">
                                <img class="light-img" src="{{ getAdsImage('heading-top-left') }}" alt="ads"
                                    style="height: 80px;  margin-top: 20px;">
                                <img class="dark-img" src="assets/img/ads/ads_banner_1_dark.jpg" alt="ads">
                            </a>
                        </div>
                    @endif
                </div>
                <div class="col-auto d-none d-lg-block">
                    <div class="col-auto">
                        <div class="header-logo">
                            @if (getSiteSetting('logo_image') !== null)
                                <a href="{{ url('/') }}" style="justify-content:center; align-content: center;">
                                    <img class="light-img" src="{{ getSiteSetting('logo_image') }}"
                                        alt={{ getSiteSetting('site_title') }} alt="logo"
                                        style="height: 80px;  margin-top: 20px;" />
                                </a>
                            @else
                                <h5 class="company-name">
                                    {{ getSiteSetting('site_title') }}
                                </h5>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-lg-4" style="align-content: center;">
                    @if (getAdDetail('heading-top-right'))
                        <div class="header-ads">
                            <a href="{{ getAdDetail('heading-top-right') }}" target="_blank">
                                <img class="light-img" src="{{ getAdsImage('heading-top-right') }}" alt="ads"
                                    style="height: 80px;  margin-top: 20px;">
                                <img class="dark-img" src="assets/img/ads/ads_banner_1_dark.jpg" alt="ads">
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="sticky-wrapper">
        <!-- Main Menu Area -->
        <div class="menu-area">
            <div class="container">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto d-lg-none d-block">
                        <div class="header-logo">
                            @if (getSiteSetting('logo_image') !== null)
                                <a href="{{ url('/') }}">
                                    <img class="light-img" src="{{ getSiteSetting('logo_image') }}"
                                        alt={{ getSiteSetting('site_title') }} alt="logo" style="height: 40px;" />
                                </a>
                            @else
                                <h5 class="company-name">
                                    {{ getSiteSetting('site_title') }}
                                </h5>
                            @endif
                        </div>
                    </div>
                    <div class="col-auto">
                        <nav class="main-menu d-none d-lg-inline-block">
                            <ul>
                                <li class="">
                                    <a href="{{ url('/') }}">होमपेज</a>
                                </li>
                                @if (isset($menu))
                                    @foreach ($menu as $me)
                                        <li><a
                                                href="{{ url('/news-list/category/' . $me->id) }}">{{ $me->name }}</a>
                                        </li>
                                    @endforeach
                                @endif


                            </ul>
                        </nav>
                    </div>
                    <div class="col-auto">
                        <div class="header-button">
                            <button type="button" class="simple-icon searchBoxToggler"><i
                                    class="far fa-search"></i></button>

                            <a href="#" class="icon-btn sideMenuToggler d-none d-lg-block"><i
                                    class="far fa-bars"></i></a>
                            <button type="button" class="th-menu-toggle d-block d-lg-none"><i
                                    class="far fa-bars"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
