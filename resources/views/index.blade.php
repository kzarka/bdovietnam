@extends('layouts.main')

@section('title', 'Home Page')

@section('content')
<!-- Start latest-post Area -->
<div class="latest-post-wrap">
    <h4 class="cat-title">Latest News</h4>
    @forelse ($lastest as $post)
    <div class="single-latest-post row align-items-center">
        <div class="col-lg-5 post-left">
            <div class="feature-img relative">
                <div class="overlay overlay-bg"></div>
                <img class="img-fluid" src="img/l1.jpg" alt="">
            </div>
            <ul class="tags">
                <li><a href="{{ route('category', $post->firstCategoryName()) }}">
                    {{ $post->firstCategoryName() }}
                    </a>
                </li>
            </ul>
        </div>
        <div class="col-lg-7 post-right">
            <a href="{{ $post->url() }}">
                <h4>{{ $post->title }}</h4>
            </a>
            <ul class="meta">
                <li><a href="#"><span class="lnr lnr-user"></span>{{ $post->user->name }}</a></li>
                <li><a href="#"><span class="lnr lnr-calendar-full"></span>03 April, 2018</a></li>
                <li><a href="#"><span class="lnr lnr-bubble"></span>06 Comments</a></li>
            </ul>
            <p class="excert">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.
            </p>
        </div>
    </div>
    @empty

    @endforelse
</div>
<!-- End latest-post Area -->

<!-- Start banner-ads Area -->
<div class="col-lg-12 ad-widget-wrap mt-30 mb-30">
    <img class="img-fluid" src="img/banner-ad.jpg" alt="">
</div>
<!-- End banner-ads Area -->

<!-- Start popular-post Area -->
<div class="popular-post-wrap">
    <h5 class="title">Popular Posts</h5>
    @if ($popular->count() > 0)

    @php $popular_first = $popular->shift(); @endphp
    <div class="feature-post relative">
        <div class="feature-img relative">
            <div class="overlay overlay-bg"></div>
            <img class="img-fluid" src="img/f1.jpg" alt="">
        </div>
        <div class="details">
            <ul class="tags">
                <li>
                    <a href="{{ route('category', $popular_first->firstCategoryName()) }}">
                        {{ $popular_first->firstCategoryName() }}
                    </a>
                </li>
            </ul>
            <a href="{{ $post->url() }}">
                <h3>{{ $popular_first->title }}</h3>
            </a>
            <ul class="meta">
                <li><a href="#"><span class="lnr lnr-user"></span>{{ $popular_first->user->name }}</a></li>
                <li><a href="#"><span class="lnr lnr-calendar-full"></span>03 April, 2018</a></li>
                <li><a href="#"><span class="lnr lnr-bubble"></span>06 Comments</a></li>
            </ul>
        </div>
    </div>
    @endif

    @if ($popular->count() > 0)
    <div class="row mt-20 medium-gutters">
        @foreach ($popular as $post)
        <div class="col-lg-6 single-popular-post">
            <div class="feature-img-wrap relative">
                <div class="feature-img relative">
                    <div class="overlay overlay-bg"></div>
                    <img class="img-fluid" src="img/f2.jpg" alt="">
                </div>
                <ul class="tags">
                    <li>
                        <a href="{{ route('category', $post->firstCategoryName()) }}">
                            {{ $post->firstCategoryName() }}
                        </a>
                    </li>
                </ul>
            </div>
            <div class="details">
                <a href="{{ $post->url() }}">
                    <h4>{{ $post->title }}</h4>
                </a>
                <ul class="meta">
                    <li><a href="#"><span class="lnr lnr-user"></span>{{ $post->user->name }}</a></li>
                    <li><a href="#"><span class="lnr lnr-calendar-full"></span>03 April, 2018</a></li>
                    <li><a href="#"><span class="lnr lnr-bubble"></span>06 </a></li>
                </ul>
                <p class="excert">
                    Lorem ipsum dolor sit amet, consecteturadip isicing elit, sed do eiusmod tempor incididunt ed do eius.
                </p>
            </div>
        </div>
        @endforeach
    </div>
    @endif

</div>
<!-- End popular-post Area -->
<!-- Start relavent-story-post Area -->
<div class="relavent-story-post-wrap mt-30">
    <h5 class="title">Relavent Stories</h5>
    <div class="relavent-story-list-wrap">
        <div class="single-relavent-post row align-items-center">
            <div class="col-lg-5 post-left">
                <div class="feature-img relative">
                    <div class="overlay overlay-bg"></div>
                    <img class="img-fluid" src="img/r1.jpg" alt="">
                </div>
                <ul class="tags">
                    <li><a href="#">Lifestyle</a></li>
                </ul>
            </div>
            <div class="col-lg-7 post-right">
                <a href="image-post.html">
                    <h4>A Discount Toner Cartridge Is
                    Better Than Ever.</h4>
                </a>
                <ul class="meta">
                    <li><a href="#"><span class="lnr lnr-user"></span>Mark wiens</a></li>
                    <li><a href="#"><span class="lnr lnr-calendar-full"></span>03 April, 2018</a></li>
                    <li><a href="#"><span class="lnr lnr-bubble"></span>06 Comments</a></li>
                </ul>
                <p class="excert">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.
                </p>
            </div>
        </div>
        <div class="single-relavent-post row align-items-center">
            <div class="col-lg-5 post-left">
                <div class="feature-img relative">
                    <div class="overlay overlay-bg"></div>
                    <img class="img-fluid" src="img/r2.jpg" alt="">
                </div>
                <ul class="tags">
                    <li><a href="#">Science</a></li>
                </ul>
            </div>
            <div class="col-lg-7 post-right">
                <a href="image-post.html">
                    <h4>A Discount Toner Cartridge Is
                    Better Than Ever.</h4>
                </a>
                <ul class="meta">
                    <li><a href="#"><span class="lnr lnr-user"></span>Mark wiens</a></li>
                    <li><a href="#"><span class="lnr lnr-calendar-full"></span>03 April, 2018</a></li>
                    <li><a href="#"><span class="lnr lnr-bubble"></span>06 Comments</a></li>
                </ul>
                <p class="excert">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.
                </p>
            </div>
        </div>
        <div class="single-relavent-post row align-items-center">
            <div class="col-lg-5 post-left">
                <div class="feature-img relative">
                    <div class="overlay overlay-bg"></div>
                    <img class="img-fluid" src="img/r3.jpg" alt="">
                </div>
                <ul class="tags">
                    <li><a href="#">Travel</a></li>
                </ul>
            </div>
            <div class="col-lg-7 post-right">
                <a href="image-post.html">
                    <h4>A Discount Toner Cartridge Is
                    Better Than Ever.</h4>
                </a>
                <ul class="meta">
                    <li><a href="#"><span class="lnr lnr-user"></span>Mark wiens</a></li>
                    <li><a href="#"><span class="lnr lnr-calendar-full"></span>03 April, 2018</a></li>
                    <li><a href="#"><span class="lnr lnr-bubble"></span>06 Comments</a></li>
                </ul>
                <p class="excert">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.
                </p>
            </div>
        </div>
    </div>
</div>
<!-- End relavent-story-post Area -->
@endsection
