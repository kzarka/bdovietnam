<?php

?>
<div class="sidebars-area">
    <div class="single-sidebar-widget editors-pick-widget">
        <h6 class="title">{{ $is_post ? 'Cùng Chủ Đề' : 'Random' }}</h6>
        <div class="editors-pick-post">
            @if ($top_sidebar_posts && $top_sidebar_posts->count() > 0)

            @php $post_first = $top_sidebar_posts->shift(); @endphp
            <div class="feature-img-wrap relative">
                <div class="feature-img relative">
                    <div class="overlay overlay-bg"></div>
                    <img class="img-fluid" src="{{ $post_first->thumbnail }}" alt="">
                </div>
                <ul class="tags">
                    <li>
                        <a href="{{ route('category', $post_first->firstCategorySlug()) }}">
                            {{ $post_first->firstCategoryName() }}
                        </a>
                    </li>
                </ul>
            </div>
            <div class="details">
                <a href="{{ $post_first->url() }}">
                    <h4 class="mt-20">{{ $post_first->title }}.</h4>
                </a>
                <ul class="meta">
                    <li><a href="#"><span class="lnr lnr-user"></span>{{ $post_first->user->name }}</a></li>
                    <li><a href="#"><span class="lnr lnr-calendar-full"></span>{{ $post_first->created_at }}</a></li>
                    <li><a href="#"><span class="lnr lnr-bubble"></span>06 </a></li>
                </ul>
                <p class="excert">
                    {{ $post_first->excert }}
                </p>
            </div>
            @endif

            @if ($top_sidebar_posts && $top_sidebar_posts->count() > 0)
            @foreach ($top_sidebar_posts as $post)
            <div class="post-lists">
                <div class="single-post d-flex flex-row">
                    <div class="thumb">
                        <img src="{{ $post->thumbnail }}" alt="">
                    </div>
                    <div class="detail">
                        <a href="{{ $post->url() }}"><h6>{{ $post->title }}</h6></a>
                        <ul class="meta">
                            <li><a href="#"><span class="lnr lnr-calendar-full"></span>{{ $post->created_at }}</a></li>
                            <li><a href="#"><span class="lnr lnr-bubble"></span>06</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            @endforeach
            @endif
        </div>
    </div>
    <div class="single-sidebar-widget ads-widget">
        <img class="img-fluid" src="{{ $sidebar_ads->url ?: $sidebar_ads->default_url }}" alt="">
    </div>
    <div class="single-sidebar-widget newsletter-widget">
        <h6 class="title">Newsletter</h6>
        <p>
            Here, I focus on a range of items
            andfeatures that we use in life without
            giving them a second thought.
        </p>
        <div class="form-group d-flex flex-row">
            <div class="col-autos">
                <div class="input-group">
                    <input class="form-control" placeholder="Email Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email Address'" type="text">
                </div>
            </div>
            <a href="#" class="bbtns">Subcribe</a>
        </div>
        <p>
            You can unsubscribe us at any time
        </p>
    </div>
    <div class="single-sidebar-widget most-popular-widget">
        <h6 class="title">Most Popular</h6>
        @if ($popular && $popular->count() > 0)
        @foreach ($popular as $post)
        <div class="single-list flex-row d-flex">
            <div class="thumb">
                <img src="{{ $post->thumbnail }}" alt="">
            </div>
            <div class="details">
                <a href="{{ $post->url() }}">
                    <h6>{{ $post->title }}</h6>
                </a>
                <ul class="meta">
                    <li><a href="#"><span class="lnr lnr-calendar-full"></span>{{ $post->created_at }}</a></li>
                    <li><a href="#"><span class="lnr lnr-bubble"></span>06</a></li>
                </ul>
            </div>
        </div>
        @endforeach

        @endif
    </div>
    <div class="single-sidebar-widget social-network-widget">
        <h6 class="title">Social Networks</h6>
        <ul class="social-list">
            <li class="d-flex justify-content-between align-items-center fb">
                <div class="icons d-flex flex-row align-items-center">
                    <i class="fa fa-facebook" aria-hidden="true"></i>
                    <p>983 Likes</p>
                </div>
                <a href="#">Like our page</a>
            </li>
            <li class="d-flex justify-content-between align-items-center tw">
                <div class="icons d-flex flex-row align-items-center">
                    <i class="fa fa-twitter" aria-hidden="true"></i>
                    <p>983 Followers</p>
                </div>
                <a href="#">Follow Us</a>
            </li>
            <li class="d-flex justify-content-between align-items-center yt">
                <div class="icons d-flex flex-row align-items-center">
                    <i class="fa fa-youtube-play" aria-hidden="true"></i>
                    <p>983 Subscriber</p>
                </div>
                <a href="#">Subscribe</a>
            </li>
            <li class="d-flex justify-content-between align-items-center rs">
                <div class="icons d-flex flex-row align-items-center">
                    <i class="fa fa-rss" aria-hidden="true"></i>
                    <p>983 Subscribe</p>
                </div>
                <a href="#">Subscribe</a>
            </li>
        </ul>
    </div>
</div>