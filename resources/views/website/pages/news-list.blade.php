@extends('website.layout.app')

@section('content')

 <div class="breadcumb-wrapper">
        <div class="container">
            <ul class="breadcumb-menu">
                <li><a href="{{ url('/') }}">होमपेज</a></li>
                <li>समाचार विवरण</li>
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
                @include('website.layout.sidebar')
            </div>
        </div>
    </section>

@endsection