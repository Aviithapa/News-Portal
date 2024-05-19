<div>
        <div class="container">
            <div class="news-area">
                <div class="title">Breaking News :</div>
                <div class="news-wrap">
                    <div class="row slick-marquee">
                        @foreach($breakingNews as $bN)
                        <div class="col-auto">
                            <a href="{{ url('news-details/' . $bN->id)  }}" class="breaking-news">{{ $bN->title }}</a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>