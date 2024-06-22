          <div class="navbar-custom">
            <div class="topbar container-fluid">
                <div class="d-flex align-items-center gap-1">

                    <!-- Topbar Brand Logo -->
                    <div class="logo-topbar">
                        <!-- Logo light -->
                        <a href="{{ url('dashboard') }}" class="logo-light">
                            <span class="logo-lg">
                              
                                 @if(getSiteSetting('logo_image') !== null)
                                   <img src="{{ getSiteSetting('logo_image') }}"   alt="logo"/>
                                @else
                                    <h5 class="company-name">
                                        {{ getSiteSetting('site_title') }}
                                    </h5>
                                @endif
                            </span>
                            <span class="logo-sm">
                                 @if(getSiteSetting('logo_image') !== null)
                                   <img src="{{ getSiteSetting('logo_image') }}"   alt="small logo"/>
                                @else
                                    <h5 class="company-name">
                                        {{ getSiteSetting('site_title') }}
                                    </h5>
                                @endif
                            </span>
                        </a>
                    </div>

                    <!-- Sidebar Menu Toggle Button -->
                    <button class="button-toggle-menu">
                        <i class="ri-menu-line"></i>
                    </button>
                
                </div>

                <ul class="topbar-menu d-flex align-items-center gap-3">
                    <li class="dropdown d-lg-none">
                        <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button"
                            aria-haspopup="false" aria-expanded="false">
                            <i class="ri-search-line fs-22"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-animated dropdown-lg p-0">
                            <form class="p-3">
                                <input type="search" class="form-control" placeholder="Search ..."
                                    aria-label="Recipient's username">
                            </form>
                        </div>
                    </li>

                    <li class="dropdown">
                        <a class="nav-link dropdown-toggle arrow-none nav-user" data-bs-toggle="dropdown" href="#" role="button"
                            aria-haspopup="false" aria-expanded="false">
                            <span class="account-user-avatar">
                                {{-- <img src="assets/images/users/avatar-1.jpg" alt="user-image" width="32" class="rounded-circle"> --}}
                            </span>
                            <span class="d-lg-block d-none">
                                <h5 class="my-0 fw-normal">{{ Auth::user()->name }} </h5>
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated profile-dropdown">
                            <!-- item-->
                            <div class=" dropdown-header noti-title">
                                <h6 class="text-overflow m-0">Welcome !</h6>
                            </div>

                            
                            <!-- item-->
                            <a href="{{ route('logout') }}" class="dropdown-item">
                                <i class="ri-logout-box-line fs-18 align-middle me-1"></i>
                                <span>Logout</span>
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    
    <div class="leftside-menu">

            <!-- Brand Logo Dark -->
            <a href="{{ url('dashboard') }}" class="logo logo-dark" >
                 <span class="logo-lg">
                              
                                 @if(getSiteSetting('logo_image') !== null)
                                   <img src="{{ getSiteSetting('logo_image') }}"   alt="logo"/>
                                @else
                                    <h5 class="company-name">
                                        {{ getSiteSetting('site_title') }}
                                    </h5>
                                @endif
                            </span>
                            <span class="logo-sm">
                                 @if(getSiteSetting('logo_image') !== null)
                                   <img src="{{ getSiteSetting('logo_image') }}"   alt="small logo"/>
                                @else
                                    <h5 class="company-name">
                                        {{ getSiteSetting('site_title') }}
                                    </h5>
                                @endif
                            </span>
            </a>

            <!-- Sidebar -left -->
            <div class="h-100" id="leftside-menu-container" data-simplebar style="border-top: 1px solid;">
                <!--- Sidemenu -->
                <ul class="side-nav">

                    {{-- <li class="side-nav-title">Main</li> --}}

                    <li class="side-nav-item">
                        <a href="{{ url('dashboard') }}" class="side-nav-link">
                            <i class="bi-speedometer"></i>
                            <span> Dashboard </span>
                        </a>
                    </li>

                    <li class="side-nav-item">
                        <a href="{{ route('dashboard.site-settings.index') }}" class="side-nav-link">
                            <i class="bi-calendar-week-fill"></i>
                            <span> Site Settings </span>
                        </a>
                    </li>
                     <li class="side-nav-item">
                        <a href="{{ route('news.index') }}" class="side-nav-link">
                            <i class="bi-newspaper"></i>
                            <span> News Management </span>
                        </a>
                    </li>
                     <li class="side-nav-item">
                        <a href="{{ route('category.index') }}" class="side-nav-link">
                            <i class="bi-newspaper"></i>
                            <span> Category Management </span>
                        </a>
                    </li>
                    <li class="side-nav-item">
                        <a href="{{ route('ads.index') }}" class="side-nav-link">
                            <i class="bi-newspaper"></i>
                            <span> Ads Management </span>
                        </a>
                    </li>
                    
                   
                     <li class="side-nav-item">
                        <a href="{{ url('cms/page') }}" class="side-nav-link">
                            <i class="bi-file"></i>
                            <span> Page Management </span>
                        </a>
                    </li>


                    {{-- <li class="side-nav-item">
                        <a href="{{ url('cms/post') }}" class="side-nav-link">
                            <i class="bi-markdown"></i>
                            <span> Post Management </span>
                        </a>
                    </li>
                      
                  
                     <li class="side-nav-item">
                        <a href="{{ url('cms/team') }}" class="side-nav-link">
                            <i class="bi-chat-left-dots"></i>
                            <span> Team Management </span>
                        </a>
                    </li> --}}

                      
                    
                     
                    
                  

                    <li class="side-nav-item"> 
                           <a href="{{ route('logout') }}" class="side-nav-link">
                                <i class="bi-box-arrow-right "></i>
                                <span>Logout</span>
                            </a>
                    </li>

                      
                  
                </ul>
                <!--- End Sidemenu -->

                <div class="clearfix"></div>
            </div>
        </div>
        <!-- ========== Left Sidebar End ========== -->