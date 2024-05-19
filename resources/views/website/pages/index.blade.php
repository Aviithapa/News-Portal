
@extends('website.layout.app')

@section('content')

   


    <!--==============================
Blog Area  
==============================-->
    <section class="space">
      <div class="container">
        <div class="row">
          <div class="col-xl-3">
            <div class="row gy-4">

      @foreach($isTrendingNews as $iTN)
              <div
                class="col-xl-12 col-sm-6 border-blog dark-theme img-overlay2"
              >
                <div class="blog-style3">
                  <div class="blog-img" style="height: 200px">
                        <img
                          src="{{ $iTN->getImageUrlAttribute() }}"
                          alt="{{ $iTN->title }}"
                          style="object-fit: contain; width: 100%; height: 100%;" 
                        />
                  </div>
                  <div class="blog-content">
                   @foreach($iTN->categories as $category)
                     <a data-theme-color="{{ $category->color }}" href="{{ url('news-list/category/'. $category->id) }}" class="category">{{ $category->name }}</a>
                  @endforeach
                    <h3 class="box-title-22">
                      <a class="hover-line" href="{{ url('news-details/' . $iTN->id)  }}"
                        >{{ $iTN->title }}</a
                      >
                    </h3>
                    <div class="blog-meta">
                      <a href="author.html"
                        ><i class="far fa-user"></i>By - Tnews</a
                      >
                      <a href="blog.html"
                        ><i class="fal fa-calendar-days"></i>
                            {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $iTN->created_at)->format('d M, Y') }}
                        </a
                      >
                    </div>
                  </div>
                </div>
              </div>

              @endforeach
         
            </div>
          </div>
          <div class="col-xl-6 mt-4 mt-xl-0">
            <div class="dark-theme img-overlay2">
              <div class="blog-style3">
                <div class="blog-img"  style="height: 400px">
                  <img src="{{ $isFeaturedPost->getImageUrlAttribute() }}" alt="blog image"  style="object-fit: contain; width: 100%; height: 100%;" />
                </div>
                <div class="blog-content">
                  @foreach($isFeaturedPost->categories as $category)
                      <a data-theme-color="{{ $category->color }}" href="blog.html" class="category">{{ $category->name }}</a>
                  @endforeach
                
               
                  <h3 class="box-title-30">
                    <a class="hover-line" href="{{ url('news-details/' . $isFeaturedPost->id)  }}"
                      >{{ $isFeaturedPost->title }}</a
                    >
                  </h3>
                  <div class="blog-meta">
                    <a href="author.html"
                      ><i class="far fa-user"></i>By - Tnews</a
                    >
                    <a href="blog.html"
                      ><i class="fal fa-calendar-days"></i>
                            {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $isFeaturedPost->created_at)->format('d M, Y') }}
                      
                      </a
                    >
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 mt-35 mt-xl-0">
            <div class="nav tab-menu indicator-active" role="tablist">
              <button
                class="tab-btn active"
                id="nav-one-tab"
                data-bs-toggle="tab"
                data-bs-target="#nav-one"
                type="button"
                role="tab"
                aria-controls="nav-one"
                aria-selected="true"
              >
                Top News
              </button>
              <button
                class="tab-btn"
                id="nav-two-tab"
                data-bs-toggle="tab"
                data-bs-target="#nav-two"
                type="button"
                role="tab"
                aria-controls="nav-two"
                aria-selected="false"
              >
                Recent News
              </button>
            </div>
            <div class="tab-content">
              <!-- Single item -->
              <div
                class="tab-pane fade show active"
                id="nav-one"
                role="tabpanel"
                aria-labelledby="nav-one-tab"
              >
                <div class="row gy-4">
                  @foreach($isTopRated as $iTP)
                  <div class="col-xl-12 col-md-6 border-blog">
                    <div class="blog-style2">
                      <div class="blog-img">
                        <img
                          src="{{ $iTP->getImageUrlAttribute() }}"
                          alt="{{ $iTP->title }}"
                        />
                      </div>
                      <div class="blog-content">
                       @foreach($iTP->categories as $category)
                            <a data-theme-color="{{ $category->color }}" href="blog.html" class="category">{{ $category->name }}</a>
                        @endforeach
                        <h3 class="box-title-18">
                          <a class="hover-line" href="{{ url('news-details/' . $iTP->id)  }}"
                            >{{  $iTP->title }}</a
                          >
                        </h3>
                        <div class="blog-meta">
                          <a href="blog.html"
                            ><i class="fal fa-calendar-days"></i>
                            {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $iTP->created_at)->format('d M, Y') }}
                            </a
                          >
                        </div>
                      </div>
                    </div>
                  </div>
                  @endforeach
                </div>
              </div>
              <!-- Single item -->
              <div
                class="tab-pane fade"
                id="nav-two"
                role="tabpanel"
                aria-labelledby="nav-two-tab"
              >
                <div class="row gy-4">
                  <div class="col-xl-12 col-md-6 border-blog">
                    <div class="blog-style2">
                      <div class="blog-img">
                        <img
                          src="assets/img/blog/blog_3_3.jpg"
                          alt="blog image"
                        />
                      </div>
                      <div class="blog-content">
                        <a
                          data-theme-color="#00D084"
                          href="blog.html"
                          class="category"
                          >Life Style</a
                        >
                        <h3 class="box-title-18">
                          <a class="hover-line" href="blog-details.html"
                            >Style your life news For modern living</a
                          >
                        </h3>
                        <div class="blog-meta">
                          <a href="blog.html"
                            ><i class="fal fa-calendar-days"></i>27 Mar, 2023</a
                          >
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-xl-12 col-md-6 border-blog">
                    <div class="blog-style2">
                      <div class="blog-img">
                        <img
                          src="assets/img/blog/blog_3_4.jpg"
                          alt="blog image"
                        />
                      </div>
                      <div class="blog-content">
                        <a
                          data-theme-color="#4E4BD0"
                          href="blog.html"
                          class="category"
                          >Sports</a
                        >
                        <h3 class="box-title-18">
                          <a class="hover-line" href="blog-details.html"
                            >Score big with the Latest sports news.</a
                          >
                        </h3>
                        <div class="blog-meta">
                          <a href="blog.html"
                            ><i class="fal fa-calendar-days"></i>20 Mar, 2023</a
                          >
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-xl-12 col-md-6 border-blog">
                    <div class="blog-style2">
                      <div class="blog-img">
                        <img
                          src="assets/img/blog/blog_3_5.jpg"
                          alt="blog image"
                        />
                      </div>
                      <div class="blog-content">
                        <a
                          data-theme-color="#868101"
                          href="blog.html"
                          class="category"
                          >Action</a
                        >
                        <h3 class="box-title-18">
                          <a class="hover-line" href="blog-details.html"
                            >Adventure awaits, seize the moment</a
                          >
                        </h3>
                        <div class="blog-meta">
                          <a href="blog.html"
                            ><i class="fal fa-calendar-days"></i>15 Mar, 2023</a
                          >
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-xl-12 col-md-6 border-blog">
                    <div class="blog-style2">
                      <div class="blog-img">
                        <img
                          src="assets/img/blog/blog_3_6.jpg"
                          alt="blog image"
                        />
                      </div>
                      <div class="blog-content">
                        <a
                          data-theme-color="#868101"
                          href="blog.html"
                          class="category"
                          >Thriller</a
                        >
                        <h3 class="box-title-18">
                          <a class="hover-line" href="blog-details.html"
                            >brace yourself for thrilling adventure.</a
                          >
                        </h3>
                        <div class="blog-meta">
                          <a href="blog.html"
                            ><i class="fal fa-calendar-days"></i>25 Mar, 2023</a
                          >
                        </div>
                      </div>
                    </div>
                  </div>
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
                <button
                  data-slick-prev="#blog-slide1"
                  class="slick-arrow default"
                >
                  <i class="far fa-arrow-left"></i>
                </button>
                <button
                  data-slick-next="#blog-slide1"
                  class="slick-arrow default"
                >
                  <i class="far fa-arrow-right"></i>
                </button>
              </div>
            </div>
          </div>
        </div>
        <div
          class="row th-carousel"
          id="blog-slide1"
          data-slide-show="4"
          data-lg-slide-show="3"
          data-md-slide-show="2"
          data-sm-slide-show="2"
        >

        @foreach($trendingNews as $tN)
          <div class="col-sm-6 col-xl-4">
            <div class="blog-style1">
              <div class="blog-img" style="height: 200px">
                <img src="{{ $tN->getImageUrlAttribute() }}" alt="blog image"   style="object-fit: fit; width: 100%; height: 100%;"  />
                 @foreach($tN->categories as $category)
                      <a data-theme-color="{{ $category->color }}" href="blog.html" class="category">{{ $category->name }}</a>
                  @endforeach
              </div>
              <h3 class="box-title-22">
                <a class="hover-line" href="{{ url('news-details/' . $tN->id)  }}"
                  >{{ $tN->title }}</a
                >
              </h3>
              <div class="blog-meta">
                <a href="author.html"><i class="far fa-user"></i>By - Tnews</a>
                <a href="blog.html"
                  ><i class="fal fa-calendar-days"></i>
                  {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $iTP->created_at)->format('d M, Y') }}
                  </a
                >
              </div>
            </div>
          </div>
        @endforeach
        </div>
      </div>
    </div>
    @foreach($columnCategories as $category)
      @include('website.index.category', ['model' => $category->news , 'title' => $category->name])
    @endforeach


    <section class="space">
      <div class="container">
        <div class="row">
          <div class="col-xl-8">
            <h2 class="sec-title has-line">International News</h2>
            <div class="row gy-4">
              <div class="col-sm-6 border-blog two-column">
                <div class="blog-style1">
                  <div class="blog-img">
                    <img src="assets/img/blog/blog_4_1.jpg" alt="blog image" />
                    <a
                      data-theme-color="#FF9500"
                      href="blog.html"
                      class="category"
                      >Politics</a
                    >
                  </div>
                  <h3 class="box-title-24">
                    <a class="hover-line" href="blog-details.html"
                      >Relaxation redefined, your beach Resort sanctuary</a
                    >
                  </h3>
                  <div class="blog-meta">
                    <a href="author.html"
                      ><i class="far fa-user"></i>By - Tnews</a
                    >
                    <a href="blog.html"
                      ><i class="fal fa-calendar-days"></i>25 Mar, 2023</a
                    >
                  </div>
                </div>
              </div>
              <div class="col-sm-6 border-blog two-column">
                <div class="blog-style1">
                  <div class="blog-img">
                    <img src="assets/img/blog/blog_4_2.jpg" alt="blog image" />
                    <a
                      data-theme-color="#4E4BD0"
                      href="blog.html"
                      class="category"
                      >Sports</a
                    >
                  </div>
                  <h3 class="box-title-24">
                    <a class="hover-line" href="blog-details.html"
                      >Game on! Embrace the spirit of Competition them</a
                    >
                  </h3>
                  <div class="blog-meta">
                    <a href="author.html"
                      ><i class="far fa-user"></i>By - Tnews</a
                    >
                    <a href="blog.html"
                      ><i class="fal fa-calendar-days"></i>23 Mar, 2023</a
                    >
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-4 mt-35 mt-xl-0">
            <div class="nav tab-menu indicator-active" role="tablist">
              <button
                class="tab-btn active"
                id="nav2-one-tab"
                data-bs-toggle="tab"
                data-bs-target="#nav2-one"
                type="button"
                role="tab"
                aria-controls="nav2-one"
                aria-selected="true"
              >
                Tranding
              </button>
              <button
                class="tab-btn"
                id="nav2-two-tab"
                data-bs-toggle="tab"
                data-bs-target="#nav2-two"
                type="button"
                role="tab"
                aria-controls="nav2-two"
                aria-selected="false"
              >
                Recent
              </button>
              <button
                class="tab-btn"
                id="nav2-three-tab"
                data-bs-toggle="tab"
                data-bs-target="#nav2-three"
                type="button"
                role="tab"
                aria-controls="nav2-three"
                aria-selected="false"
              >
                Popular
              </button>
            </div>
            <div class="tab-content">
              <!-- Single item -->
              <div
                class="tab-pane fade show active"
                id="nav2-one"
                role="tabpanel"
                aria-labelledby="nav2-one-tab"
              >
                <div class="row gy-4">
                  <div class="col-xl-12 col-md-6 border-blog">
                    <div class="blog-style2">
                      <div class="blog-img">
                        <img
                          src="assets/img/blog/blog_3_2_1.jpg"
                          alt="blog image"
                        />
                      </div>
                      <div class="blog-content">
                        <a
                          data-theme-color="#4E4BD0"
                          href="blog.html"
                          class="category"
                          >Sports</a
                        >
                        <h3 class="box-title-20">
                          <a class="hover-line" href="blog-details.html"
                            >Fast breaks, slam dunks Basketball thrills.</a
                          >
                        </h3>
                        <div class="blog-meta">
                          <a href="blog.html"
                            ><i class="fal fa-calendar-days"></i>25 Mar, 2023</a
                          >
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-xl-12 col-md-6 border-blog">
                    <div class="blog-style2">
                      <div class="blog-img">
                        <img
                          src="assets/img/blog/blog_3_2_2.jpg"
                          alt="blog image"
                        />
                      </div>
                      <div class="blog-content">
                        <a
                          data-theme-color="#00D084"
                          href="blog.html"
                          class="category"
                          >Health</a
                        >
                        <h3 class="box-title-20">
                          <a class="hover-line" href="blog-details.html"
                            >Life, a canvas, paint your Masterpiece.</a
                          >
                        </h3>
                        <div class="blog-meta">
                          <a href="blog.html"
                            ><i class="fal fa-calendar-days"></i>25 Mar, 2023</a
                          >
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-xl-12 col-md-6 border-blog">
                    <div class="blog-style2">
                      <div class="blog-img">
                        <img
                          src="assets/img/blog/blog_3_2_3.jpg"
                          alt="blog image"
                        />
                      </div>
                      <div class="blog-content">
                        <a
                          data-theme-color="#E7473C"
                          href="blog.html"
                          class="category"
                          >Fitness</a
                        >
                        <h3 class="box-title-20">
                          <a class="hover-line" href="blog-details.html"
                            >Fuel your fire, embrace Fitness goals.</a
                          >
                        </h3>
                        <div class="blog-meta">
                          <a href="blog.html"
                            ><i class="fal fa-calendar-days"></i>11 Mar, 2023</a
                          >
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Single item -->
              <div
                class="tab-pane fade"
                id="nav2-two"
                role="tabpanel"
                aria-labelledby="nav2-two-tab"
              >
                <div class="row gy-4">
                  <div class="col-xl-12 col-md-6 border-blog">
                    <div class="blog-style2">
                      <div class="blog-img">
                        <img
                          src="assets/img/blog/blog_3_2_2.jpg"
                          alt="blog image"
                        />
                      </div>
                      <div class="blog-content">
                        <a
                          data-theme-color="#00D084"
                          href="blog.html"
                          class="category"
                          >Health</a
                        >
                        <h3 class="box-title-20">
                          <a class="hover-line" href="blog-details.html"
                            >Life, a canvas, paint your Masterpiece.</a
                          >
                        </h3>
                        <div class="blog-meta">
                          <a href="blog.html"
                            ><i class="fal fa-calendar-days"></i>11 Mar, 2023</a
                          >
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-xl-12 col-md-6 border-blog">
                    <div class="blog-style2">
                      <div class="blog-img">
                        <img
                          src="assets/img/blog/blog_3_2_3.jpg"
                          alt="blog image"
                        />
                      </div>
                      <div class="blog-content">
                        <a
                          data-theme-color="#E7473C"
                          href="blog.html"
                          class="category"
                          >Fitness</a
                        >
                        <h3 class="box-title-20">
                          <a class="hover-line" href="blog-details.html"
                            >Fuel your fire, embrace Fitness goals.</a
                          >
                        </h3>
                        <div class="blog-meta">
                          <a href="blog.html"
                            ><i class="fal fa-calendar-days"></i>14 Mar, 2023</a
                          >
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-xl-12 col-md-6 border-blog">
                    <div class="blog-style2">
                      <div class="blog-img">
                        <img
                          src="assets/img/blog/blog_3_2_4.jpg"
                          alt="blog image"
                        />
                      </div>
                      <div class="blog-content">
                        <a
                          data-theme-color="#59C2D6"
                          href="blog.html"
                          class="category"
                          >Fashion</a
                        >
                        <h3 class="box-title-20">
                          <a class="hover-line" href="blog-details.html"
                            >Fashion is an art, express Yourself beautifully</a
                          >
                        </h3>
                        <div class="blog-meta">
                          <a href="blog.html"
                            ><i class="fal fa-calendar-days"></i>17 Mar, 2023</a
                          >
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Single item -->
              <div
                class="tab-pane fade"
                id="nav2-three"
                role="tabpanel"
                aria-labelledby="nav2-three-tab"
              >
                <div class="row gy-4">
                  <div class="col-xl-12 col-md-6 border-blog">
                    <div class="blog-style2">
                      <div class="blog-img">
                        <img
                          src="assets/img/blog/blog_3_2_3.jpg"
                          alt="blog image"
                        />
                      </div>
                      <div class="blog-content">
                        <a
                          data-theme-color="#E7473C"
                          href="blog.html"
                          class="category"
                          >Fitness</a
                        >
                        <h3 class="box-title-20">
                          <a class="hover-line" href="blog-details.html"
                            >Fuel your fire, embrace Fitness goals.</a
                          >
                        </h3>
                        <div class="blog-meta">
                          <a href="blog.html"
                            ><i class="fal fa-calendar-days"></i>26 Mar, 2023</a
                          >
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-xl-12 col-md-6 border-blog">
                    <div class="blog-style2">
                      <div class="blog-img">
                        <img
                          src="assets/img/blog/blog_3_2_4.jpg"
                          alt="blog image"
                        />
                      </div>
                      <div class="blog-content">
                        <a
                          data-theme-color="#59C2D6"
                          href="blog.html"
                          class="category"
                          >Fashion</a
                        >
                        <h3 class="box-title-20">
                          <a class="hover-line" href="blog-details.html"
                            >Fashion is an art, express Yourself beautifully</a
                          >
                        </h3>
                        <div class="blog-meta">
                          <a href="blog.html"
                            ><i class="fal fa-calendar-days"></i>24 Mar, 2023</a
                          >
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-xl-12 col-md-6 border-blog">
                    <div class="blog-style2">
                      <div class="blog-img">
                        <img
                          src="assets/img/blog/blog_3_2_5.jpg"
                          alt="blog image"
                        />
                      </div>
                      <div class="blog-content">
                        <a
                          data-theme-color="#E8137D"
                          href="blog.html"
                          class="category"
                          >Sports</a
                        >
                        <h3 class="box-title-20">
                          <a class="hover-line" href="blog-details.html"
                            >Tune in, turn up, and let the Music speak</a
                          >
                        </h3>
                        <div class="blog-meta">
                          <a href="blog.html"
                            ><i class="fal fa-calendar-days"></i>12 Mar, 2023</a
                          >
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <div class="space dark-theme bg-title-dark">
      <div class="container">
        <h2 class="sec-title has-line">Latest Video Playlist</h2>
        <div class="row">
          <div class="col-xl-4 col-lg-2">
            <div class="blog-tab" data-asnavfor=".blog-tab-slide">

              @foreach($videos as $video)
            
              <div class="tab-btn">
                <div class="blog-style2">
                  <div class="blog-img img-100">
                    <img src="{{ $video->getImageUrlAttribute() }}" alt="blog image" height="50"  style="object-fit: contain; width: 100%; height: 100%;"  />
              
                    <div class="icon">
                      <i class="fal fa-waveform-lines"></i>
                    </div>
                    <a
                      href="{{ $video->excerpt }}"
                      class="play-btn popup-video"
                      ><i class="fas fa-play"></i
                    ></a>
                  </div>
                  <div class="blog-content">
                    @foreach($video->categories as $category)
                      <a data-theme-color="{{ $category->color }}" href="blog.html" class="category">{{ $category->name }}</a>
                   @endforeach
                    <h3 class="box-title-20">
                      <a class="hover-line" href="{{ url('news-details/' . $video->id)  }}"
                        >{{ $video->title }}</a
                      >
                    </h3>
                    <div class="blog-meta">
                      <a href="blog.html"
                        ><i class="fal fa-calendar-days"></i>
                        </a
                      >
                    </div>
                  </div>
                </div>
              </div>

              @endforeach
              
            </div>
          </div>
          <div class="col-xl-8 col-lg-10">
            <div
              class="blog-tab-slide th-carousel"
              data-fade="true"
              data-slide-show="1"
              data-md-slide-show="1"
            >
            @foreach($videos as $video)
              <div class="">
                <div class="blog-style8">
                  <div class="blog-img" style="height: 500px">
                    <img src="{{ $video->getImageUrlAttribute() }}" alt="blog image"    style="object-fit: cover; width: 100%; height: 100%;" />
                    <a
                      href="{{ $video->excerpt }}"
                      class="play-btn popup-video"
                      ><i class="fas fa-play"></i
                    ></a>
                  </div>
                  <h3 class="box-title-30">
                    <a class="hover-line" href="{{ url('news-details/' . $video->id)  }}"
                      >{{ $video->title }}</a
                    >
                  </h3>
                  <div class="blog-meta">
                   @foreach($video->categories as $category)
                      <a data-theme-color="{{ $category->color }}" href="blog.html" class="category">{{ $category->name }}</a>
                   @endforeach
                    >
                    <a href="author.html"
                      ><i class="far fa-user"></i>By - Tnews</a
                    >
                    <a href="blog.html"
                      ><i class="fal fa-calendar-days"></i>
                          {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $iTP->created_at)->format('d M, Y') }}
                      </a
                    >
                  </div>
                </div>
              </div>
              @endforeach

            </div>
          </div>
        </div>
      </div>
    </div>
  
    <!--==============================
Blog Area  
==============================-->
    <section class="space">
      <div class="container">
        <div class="row">
          <div class="col-xl-9">
            <div class="row align-items-center">
              <div class="col">
                <h2 class="sec-title has-line">Popular News</h2>
              </div>
              <div class="col-auto">
                
              </div>
            </div>
            <div class="filter-active">
              <div class="border-blog2 filter-item cat1">
                <div class="blog-style4">
                  <div class="blog-img">
                    <img src="assets/img/blog/blog_6_1.jpg" alt="blog image" />
                  </div>
                  <div class="blog-content">
                    <a
                      data-theme-color="#007BFF"
                      href="blog.html"
                      class="category"
                      >Travel</a
                    >
                    <h3 class="box-title-24">
                      <a class="hover-line" href="blog-details.html"
                        >From catwalk to campaigns, modeling news revealed
                        Vibrant</a
                      >
                    </h3>
                    <p class="blog-text">
                      Quisque eget ex rutrum, consequat odio in, tempor purus.
                      Mauris neque quam, Tellentesque sit amet rutrum ut,
                      gravida sit amet felis.
                    </p>
                    <div class="blog-meta">
                      <a href="author.html"
                        ><i class="far fa-user"></i>By - Tnews</a
                      >
                      <a href="blog.html"
                        ><i class="fal fa-calendar-days"></i>15 Mar, 2023</a
                      >
                    </div>
                  </div>
                </div>
              </div>

              <div class="border-blog2 filter-item cat4">
                <div class="blog-style4">
                  <div class="blog-img">
                    <img src="assets/img/blog/blog_6_2.jpg" alt="blog image" />
                  </div>
                  <div class="blog-content">
                    <a
                      data-theme-color="#59C2D6"
                      href="blog.html"
                      class="category"
                      >Fashion</a
                    >
                    <h3 class="box-title-24">
                      <a class="hover-line" href="blog-details.html"
                        >Explore, wander, immerse: let your travels paint
                        stories of life</a
                      >
                    </h3>
                    <p class="blog-text">
                      Quisque eget ex rutrum, consequat odio in, tempor purus.
                      Mauris neque quam, Tellentesque sit amet rutrum ut,
                      gravida sit amet felis.
                    </p>
                    <div class="blog-meta">
                      <a href="author.html"
                        ><i class="far fa-user"></i>By - Tnews</a
                      >
                      <a href="blog.html"
                        ><i class="fal fa-calendar-days"></i>10 Mar, 2023</a
                      >
                    </div>
                  </div>
                </div>
              </div>

              <div class="border-blog2 filter-item cat2">
                <div class="blog-style4">
                  <div class="blog-img">
                    <img src="assets/img/blog/blog_6_3.jpg" alt="blog image" />
                  </div>
                  <div class="blog-content">
                    <a
                      data-theme-color="#FF9500"
                      href="blog.html"
                      class="category"
                      >Politics</a
                    >
                    <h3 class="box-title-24">
                      <a class="hover-line" href="blog-details.html"
                        >Vote with conviction, champion change Shape the destiny
                        of politics</a
                      >
                    </h3>
                    <p class="blog-text">
                      Quisque eget ex rutrum, consequat odio in, tempor purus.
                      Mauris neque quam, Tellentesque sit amet rutrum ut,
                      gravida sit amet felis.
                    </p>
                    <div class="blog-meta">
                      <a href="author.html"
                        ><i class="far fa-user"></i>By - Tnews</a
                      >
                      <a href="blog.html"
                        ><i class="fal fa-calendar-days"></i>11 Mar, 2023</a
                      >
                    </div>
                  </div>
                </div>
              </div>

              <div class="border-blog2 filter-item cat1">
                <div class="blog-style4">
                  <div class="blog-img">
                    <img src="assets/img/blog/blog_6_4.jpg" alt="blog image" />
                  </div>
                  <div class="blog-content">
                    <a
                      data-theme-color="#007BFF"
                      href="blog.html"
                      class="category"
                      >Travel</a
                    >
                    <h3 class="box-title-24">
                      <a class="hover-line" href="blog-details.html"
                        >From catwalk to campaigns, modeling news Revealed get
                        popular</a
                      >
                    </h3>
                    <p class="blog-text">
                      Quisque eget ex rutrum, consequat odio in, tempor purus.
                      Mauris neque quam, Tellentesque sit amet rutrum ut,
                      gravida sit amet felis.
                    </p>
                    <div class="blog-meta">
                      <a href="author.html"
                        ><i class="far fa-user"></i>By - Tnews</a
                      >
                      <a href="blog.html"
                        ><i class="fal fa-calendar-days"></i>14 Mar, 2023</a
                      >
                    </div>
                  </div>
                </div>
              </div>

              <div class="border-blog2 filter-item cat3">
                <div class="blog-style4">
                  <div class="blog-img">
                    <img src="assets/img/blog/blog_6_5.jpg" alt="blog image" />
                  </div>
                  <div class="blog-content">
                    <a
                      data-theme-color="#E7473C"
                      href="blog.html"
                      class="category"
                      >Fitness</a
                    >
                    <h3 class="box-title-24">
                      <a class="hover-line" href="blog-details.html"
                        >Embrace the grind, sweat, dedication Witness your
                        fitness transformation.</a
                      >
                    </h3>
                    <p class="blog-text">
                      Quisque eget ex rutrum, consequat odio in, tempor purus.
                      Mauris neque quam, Tellentesque sit amet rutrum ut,
                      gravida sit amet felis.
                    </p>
                    <div class="blog-meta">
                      <a href="author.html"
                        ><i class="far fa-user"></i>By - Tnews</a
                      >
                      <a href="blog.html"
                        ><i class="fal fa-calendar-days"></i>22 Mar, 2023</a
                      >
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 mt-35 mt-xl-0 mb-10 sidebar-wrap">
            <div class="sidebar-area">
              <div class="widget mb-30">
                <div class="widget-ads">
                  <a href="https://themeforest.net/user/themeholy/portfolio">
                    <img
                      class="w-100"
                      src="assets/img/ads/siderbar_ads_1.jpg"
                      alt="ads"
                    />
                  </a>
                </div>
              </div>
              <div
                class="widget newsletter-widget2 mb-30"
                data-bg-src="assets/img/bg/particle_bg_1.png"
              >
                <h3 class="box-title-24">Subscribe Our Newsletter</h3>
                <form class="newsletter-form">
                  <input
                    class="form-control"
                    type="email"
                    placeholder="Enter Email"
                    required=""
                  />
                  <button type="submit" class="th-btn btn-fw">
                    Subscribe Now
                  </button>
                </form>
              </div>
              <div class="nav tab-menu indicator-active" role="tablist">
                <button
                  class="tab-btn active"
                  id="nav3-one-tab"
                  data-bs-toggle="tab"
                  data-bs-target="#nav3-one"
                  type="button"
                  role="tab"
                  aria-controls="nav3-one"
                  aria-selected="true"
                >
                  Top Rated
                </button>
                <button
                  class="tab-btn"
                  id="nav3-two-tab"
                  data-bs-toggle="tab"
                  data-bs-target="#nav3-two"
                  type="button"
                  role="tab"
                  aria-controls="nav3-two"
                  aria-selected="false"
                >
                  Tranding
                </button>
                <button
                  class="tab-btn"
                  id="nav3-three-tab"
                  data-bs-toggle="tab"
                  data-bs-target="#nav3-three"
                  type="button"
                  role="tab"
                  aria-controls="nav3-three"
                  aria-selected="false"
                >
                  Recent
                </button>
              </div>
              <div class="tab-content">
                <!-- Single item -->
                <div
                  class="tab-pane fade show active"
                  id="nav3-one"
                  role="tabpanel"
                  aria-labelledby="nav3-one-tab"
                >
                  <div class="row gy-4">
                    <div class="col-xl-12 col-md-6 border-blog">
                      <div class="blog-style2">
                        <div class="blog-img">
                          <img
                            src="assets/img/blog/blog_3_1.jpg"
                            alt="blog image"
                          />
                        </div>
                        <div class="blog-content">
                          <a
                            data-theme-color="#FF9500"
                            href="blog.html"
                            class="category"
                            >Politics</a
                          >
                          <h3 class="box-title-18">
                            <a class="hover-line" href="blog-details.html"
                              >Stay informed, Navigate the world</a
                            >
                          </h3>
                          <div class="blog-meta">
                            <a href="blog.html"
                              ><i class="fal fa-calendar-days"></i>17 Mar,
                              2023</a
                            >
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="col-xl-12 col-md-6 border-blog">
                      <div class="blog-style2">
                        <div class="blog-img">
                          <img
                            src="assets/img/blog/blog_3_2.jpg"
                            alt="blog image"
                          />
                        </div>
                        <div class="blog-content">
                          <a
                            data-theme-color="#007BFF"
                            href="blog.html"
                            class="category"
                            >Travel</a
                          >
                          <h3 class="box-title-18">
                            <a class="hover-line" href="blog-details.html"
                              >Your beach resort Sanctuary.</a
                            >
                          </h3>
                          <div class="blog-meta">
                            <a href="blog.html"
                              ><i class="fal fa-calendar-days"></i>15 Mar,
                              2023</a
                            >
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="col-xl-12 col-md-6 border-blog">
                      <div class="blog-style2">
                        <div class="blog-img">
                          <img
                            src="assets/img/blog/blog_3_3.jpg"
                            alt="blog image"
                          />
                        </div>
                        <div class="blog-content">
                          <a
                            data-theme-color="#00D084"
                            href="blog.html"
                            class="category"
                            >Life Style</a
                          >
                          <h3 class="box-title-18">
                            <a class="hover-line" href="blog-details.html"
                              >Style your life news For modern living</a
                            >
                          </h3>
                          <div class="blog-meta">
                            <a href="blog.html"
                              ><i class="fal fa-calendar-days"></i>27 Mar,
                              2023</a
                            >
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="col-xl-12 col-md-6 border-blog">
                      <div class="blog-style2">
                        <div class="blog-img">
                          <img
                            src="assets/img/blog/blog_3_4.jpg"
                            alt="blog image"
                          />
                        </div>
                        <div class="blog-content">
                          <a
                            data-theme-color="#4E4BD0"
                            href="blog.html"
                            class="category"
                            >Sports</a
                          >
                          <h3 class="box-title-18">
                            <a class="hover-line" href="blog-details.html"
                              >Score big with the Latest sports news.</a
                            >
                          </h3>
                          <div class="blog-meta">
                            <a href="blog.html"
                              ><i class="fal fa-calendar-days"></i>18 Mar,
                              2023</a
                            >
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Single item -->
                <div
                  class="tab-pane fade"
                  id="nav3-two"
                  role="tabpanel"
                  aria-labelledby="nav3-two-tab"
                >
                  <div class="row gy-4">
                    <div class="col-xl-12 col-md-6 border-blog">
                      <div class="blog-style2">
                        <div class="blog-img">
                          <img
                            src="assets/img/blog/blog_3_2.jpg"
                            alt="blog image"
                          />
                        </div>
                        <div class="blog-content">
                          <a
                            data-theme-color="#007BFF"
                            href="blog.html"
                            class="category"
                            >Travel</a
                          >
                          <h3 class="box-title-18">
                            <a class="hover-line" href="blog-details.html"
                              >Your beach resort Sanctuary.</a
                            >
                          </h3>
                          <div class="blog-meta">
                            <a href="blog.html"
                              ><i class="fal fa-calendar-days"></i>30 Mar,
                              2023</a
                            >
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="col-xl-12 col-md-6 border-blog">
                      <div class="blog-style2">
                        <div class="blog-img">
                          <img
                            src="assets/img/blog/blog_3_3.jpg"
                            alt="blog image"
                          />
                        </div>
                        <div class="blog-content">
                          <a
                            data-theme-color="#00D084"
                            href="blog.html"
                            class="category"
                            >Life Style</a
                          >
                          <h3 class="box-title-18">
                            <a class="hover-line" href="blog-details.html"
                              >Style your life news For modern living</a
                            >
                          </h3>
                          <div class="blog-meta">
                            <a href="blog.html"
                              ><i class="fal fa-calendar-days"></i>26 Mar,
                              2023</a
                            >
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="col-xl-12 col-md-6 border-blog">
                      <div class="blog-style2">
                        <div class="blog-img">
                          <img
                            src="assets/img/blog/blog_3_4.jpg"
                            alt="blog image"
                          />
                        </div>
                        <div class="blog-content">
                          <a
                            data-theme-color="#4E4BD0"
                            href="blog.html"
                            class="category"
                            >Sports</a
                          >
                          <h3 class="box-title-18">
                            <a class="hover-line" href="blog-details.html"
                              >Score big with the Latest sports news.</a
                            >
                          </h3>
                          <div class="blog-meta">
                            <a href="blog.html"
                              ><i class="fal fa-calendar-days"></i>13 Mar,
                              2023</a
                            >
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="col-xl-12 col-md-6 border-blog">
                      <div class="blog-style2">
                        <div class="blog-img">
                          <img
                            src="assets/img/blog/blog_3_5.jpg"
                            alt="blog image"
                          />
                        </div>
                        <div class="blog-content">
                          <a
                            data-theme-color="#868101"
                            href="blog.html"
                            class="category"
                            >Action</a
                          >
                          <h3 class="box-title-18">
                            <a class="hover-line" href="blog-details.html"
                              >Adventure awaits, seize the moment</a
                            >
                          </h3>
                          <div class="blog-meta">
                            <a href="blog.html"
                              ><i class="fal fa-calendar-days"></i>19 Mar,
                              2023</a
                            >
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Single item -->
                <div
                  class="tab-pane fade"
                  id="nav3-three"
                  role="tabpanel"
                  aria-labelledby="nav3-three-tab"
                >
                  <div class="row gy-4">
                    <div class="col-xl-12 col-md-6 border-blog">
                      <div class="blog-style2">
                        <div class="blog-img">
                          <img
                            src="assets/img/blog/blog_3_3.jpg"
                            alt="blog image"
                          />
                        </div>
                        <div class="blog-content">
                          <a
                            data-theme-color="#00D084"
                            href="blog.html"
                            class="category"
                            >Life Style</a
                          >
                          <h3 class="box-title-18">
                            <a class="hover-line" href="blog-details.html"
                              >Style your life news For modern living</a
                            >
                          </h3>
                          <div class="blog-meta">
                            <a href="blog.html"
                              ><i class="fal fa-calendar-days"></i>29 Mar,
                              2023</a
                            >
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="col-xl-12 col-md-6 border-blog">
                      <div class="blog-style2">
                        <div class="blog-img">
                          <img
                            src="assets/img/blog/blog_3_4.jpg"
                            alt="blog image"
                          />
                        </div>
                        <div class="blog-content">
                          <a
                            data-theme-color="#4E4BD0"
                            href="blog.html"
                            class="category"
                            >Sports</a
                          >
                          <h3 class="box-title-18">
                            <a class="hover-line" href="blog-details.html"
                              >Score big with the Latest sports news.</a
                            >
                          </h3>
                          <div class="blog-meta">
                            <a href="blog.html"
                              ><i class="fal fa-calendar-days"></i>29 Mar,
                              2023</a
                            >
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="col-xl-12 col-md-6 border-blog">
                      <div class="blog-style2">
                        <div class="blog-img">
                          <img
                            src="assets/img/blog/blog_3_5.jpg"
                            alt="blog image"
                          />
                        </div>
                        <div class="blog-content">
                          <a
                            data-theme-color="#868101"
                            href="blog.html"
                            class="category"
                            >Action</a
                          >
                          <h3 class="box-title-18">
                            <a class="hover-line" href="blog-details.html"
                              >Adventure awaits, seize the moment</a
                            >
                          </h3>
                          <div class="blog-meta">
                            <a href="blog.html"
                              ><i class="fal fa-calendar-days"></i>30 Mar,
                              2023</a
                            >
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="col-xl-12 col-md-6 border-blog">
                      <div class="blog-style2">
                        <div class="blog-img">
                          <img
                            src="assets/img/blog/blog_3_6.jpg"
                            alt="blog image"
                          />
                        </div>
                        <div class="blog-content">
                          <a
                            data-theme-color="#868101"
                            href="blog.html"
                            class="category"
                            >Thriller</a
                          >
                          <h3 class="box-title-18">
                            <a class="hover-line" href="blog-details.html"
                              >brace yourself for thrilling adventure.</a
                            >
                          </h3>
                          <div class="blog-meta">
                            <a href="blog.html"
                              ><i class="fal fa-calendar-days"></i>30 Mar,
                              2023</a
                            >
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <div class="space-bottom">
      <div class="container">
        <div class="row align-items-center">
          <div class="col">
            <h2 class="sec-title has-line">Featured Post</h2>
          </div>
          <div class="col-auto">
            <div class="sec-btn">
              <div class="icon-box">
                <button
                  data-slick-prev="#blog-slide3"
                  class="slick-arrow default"
                >
                  <i class="far fa-arrow-left"></i>
                </button>
                <button
                  data-slick-next="#blog-slide3"
                  class="slick-arrow default"
                >
                  <i class="far fa-arrow-right"></i>
                </button>
              </div>
            </div>
          </div>
        </div>
        <div
          class="row th-carousel"
          id="blog-slide3"
          data-slide-show="3"
          data-lg-slide-show="2"
          data-md-slide-show="2"
          data-sm-slide-show="1"
        >
        @foreach($featuredPosts as $fP)
          <div class="col-sm-6 col-xl-4">
            <div class="blog-style1">
              
                  
                <img src="{{ $fP->getImageUrlAttribute() }}" alt="blog image" />
              @foreach($fP->categories as $category)
                            <a data-theme-color="{{ $category->color }}" href="blog.html" class="category">{{ $category->name }}</a>
                        @endforeach
                
              </div>
              <h3 class="box-title-24">
                <a class="hover-line" href="{{ url('news-details/' . $fP->id)  }}"
                  >{{ $fP->title }}</a
                >
              </h3>
              <div class="blog-meta">
                <a href="author.html"><i class="far fa-user"></i>By - Tnews</a>
                <a href="blog.html"
                  ><i class="fal fa-calendar-days"></i> {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $iTP->created_at)->format('d M, Y') }}</a
                >
              </div>
            </div>
          </div>
         @endforeach
      
          
        </div>
      </div>
    </div>
                 
@endsection