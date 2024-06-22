  <div class="">
      <div class="container mt-5">
        <div class="row align-items-center">
          <div class="col">
            <h2 class="sec-title has-line">{{ $title }}</h2>
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

        @foreach($model as $tN)
          <div class="col-sm-6 col-xl-4">
            <div class="blog-style1">
              <a class="hover-line" href="{{ url('news-details/' . $tN->id)  }}"
                >
              <div class="blog-img" style="height: 200px;">
                <img src="{{ $tN->getImageUrlAttribute() }}" alt="{{$tN->title}}"   style="object-fit: fill; width: 100%; height: 100%;" />
                 @foreach($tN->categories as $category)
                     
                  @endforeach
              </div>
              </a>
              <h3 class="box-title-22">
                <a class="hover-line" href="{{ url('news-details/' . $tN->id)  }}"
                  >{{ $tN->title }}</a
                >
              </h3>
              <div class="blog-meta">
                <a href="{{ url('news-details/' . $tN->id)  }}"><i class="far fa-user"></i>By - Tnews</a>
                <a href="{{ url('news-details/' . $tN->id)  }}"
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