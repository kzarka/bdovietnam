<!-- Start top-post Area -->
<section class="top-post-area pt-10">
    <div class="container no-padding">
        <div class="row small-gutters">
            @if(Request::is('/'))
            @if($news->count() > 0)
            @php 
                $first_news = $news->shift(); 
                $first_news = $first_news->post;
            @endphp
            <div class="col-lg-8 top-post-left">
                <div class="feature-image-thumb relative">
                    <div class="overlay overlay-bg"></div>
                    <img class="img-fluid" src="{{ $first_news->thumbnail }}" alt="">
                </div>
                <div class="top-post-details">
                    <ul class="tags">
                        <li>
                            <a href="{{ route('category', $first_news->firstCategoryName()) }}">
                                {{ $first_news->firstCategoryName() }}
                            </a>
                        </li>
                    </ul>
                    <a href="{{ $first_news->url() }}">
                        <h3>{{ $first_news->title }}</h3>
                    </a>
                    <ul class="meta">
                        <li><a href="#"><span class="lnr lnr-user"></span>{{ $first_news->user->name }}</a></li>
                        <li><a href="#"><span class="lnr lnr-calendar-full"></span>{{ $first_news->created_at }}</a></li>
                        <li><a href="#"><span class="lnr lnr-bubble"></span>06 Comments</a></li>
                    </ul>
                </div>
            </div>
            @endif

            @if($news->count() > 0)
            @foreach ($news as $post)
            <div class="col-lg-4 top-post-right">
                <div class="single-top-post">
                    <div class="feature-image-thumb relative">
                        <div class="overlay overlay-bg"></div>
                        <img class="img-fluid" src="{{ $post->post->thumbnail }}" alt="">
                    </div>
                    <div class="top-post-details">
                        <ul class="tags">
                            <li>
                                <a href="{{ route('category', $post->post->firstCategoryName()) }}">
                                    {{ $post->post->firstCategoryName() }}
                                </a>
                            </li>
                        </ul>
                        <a href="{{ $post->post->url() }}">
                            <h4>{{ $post->post->title }}</h4>
                        </a>
                        <ul class="meta">
                            <li><a href="#"><span class="lnr lnr-user"></span>{{ $post->post->user->name }}</a></li>
                            <li><a href="#"><span class="lnr lnr-calendar-full"></span>{{ $post->created_at }}</a></li>
                            <li><a href="#"><span class="lnr lnr-bubble"></span>06 Comments</a></li>
                        </ul>
                    </div>
                </div>
                @endforeach
            </div>
            @endif
            @else
            {{ Breadcrumbs::render($breadcrumb['name'], $breadcrumb['object']) }}
            @endif
            @include('include.tips')
        </div>
    </div>
</section>
<!-- End top-post Area -->