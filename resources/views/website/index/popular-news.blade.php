<section class="space">
    <div class="container">
      <div class="row">
        <div class="col-xl-9">
          <div class="row align-items-center">
            <div class="col">
              <h2 class="sec-title has-line">{{$title}}</h2>
            </div>
            <div class="col-auto">
              
            </div>
          </div>
          <div class="filter-active">
            @foreach($model as $iPN)
            <div class="border-blog2 filter-item cat1">
              <a class="hover-line" href="{{ url('news-details/' . $iPN->id)  }}"
                >
              <div class="blog-style4">
                <div class="blog-img">
                  <img src="{{ $iPN->getImageUrlAttribute() }}" alt={{$iPN->title}} />
                </div>
                <div class="blog-content">
                  <h3 class="box-title-24">
                    <a class="hover-line" href="{{ url('news-details/' . $iPN->id)  }}"
                      >{{$iPN->title}}</a
                    >
                  </h3>
                  <p class="blog-text">
                    {{substr($iPN->description, 0, 200) . '...'}}
                  </p>
                  <div class="blog-meta">
                    <a href="#"
                      ><i class="far fa-user"></i>By - Shree Bindu</a
                    >
                    <a href="#"
                      ><i class="fal fa-calendar-days"></i>
                      {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $iPN->created_at)->format('d M, Y') }}
                      </a
                    >
                  </div>
                </div>
              </div>
              </a>
            </div>
            @endforeach
          </div>
        </div>
        <div class="col-xl-3 mt-35 mt-xl-0 mb-10 sidebar-wrap">
          <div class="sidebar-area">
            <div class="widget mb-30">
              <div class="widget-ads">
                <a href="#">
                  <img
                    class="w-100"
                    src="{{ getAdsImage('popular-news') }}"
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
          </div>
        </div>
      </div>
    </div>
  </section>
