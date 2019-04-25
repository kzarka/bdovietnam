@extends('layouts.main')

@section('title', isset($post->id) ? $post->title : 'Post not found' )

@section('content')
<div class="single-post-wrap">
    @if (isset($post->id))
    @if ($post->top_image)
    <div class="feature-img-thumb relative">
        <div class="overlay overlay-bg post-banner">
            <ul class="tags">
                @if ($post->category)
                <li><a href="{{ route('category', $post->category->slug ?: $post->category->id) }}">{{ $post->category->name }}</a></li>
                @else
                <li><a href="{{ route('category', $post->firstCategorySlug()) }}">{{ $post->firstCategoryName() }}</a></li>
                @endif
            </ul>
        </div>
        <img class="img-fluid" src="{{ $post->top_image }}" alt="">
    </div>
    @endif
    <div class="content-wrap">
        @if (!$post->top_image)
        <ul class="tags">
            @if ($post->category)
            <li><a href="{{ route('category', $post->category->slug ?: $post->category->id) }}">{{ $post->category->name }}</a></li>
            @else
            <li><a href="{{ route('category', $post->firstCategorySlug()) }}">{{ $post->firstCategoryName() }}</a></li>
            @endif
        </ul>
        @endif
        <a href="" class="post-title">
            <h3>{{ $post->title }}</h3>
        </a>
        <ul class="meta post-meta">
            <li><a href="#"><span class="lnr lnr-calendar-full"></span>{{ $post->created_at }}</a></li>
            <li><a href="#"><span class="lnr lnr-user"></span>{{ $post->getAuthorName() }}</a></li>
            <li><a href="#"><span class="lnr lnr-eye"></span>{{ $post->view_count }} lượt xem</a></li>
            <li><a href="#"><span class="lnr lnr-bubble"></span>06 </a></li>
        </ul>
        <div class="post-content">
        {!! $post->content !!}
        </div>
        <div class="navigation-wrap justify-content-between d-flex">
            <a class="prev" href="#"><span class="lnr lnr-arrow-left"></span>Prev Post</a>
            <a class="next" href="#">Next Post<span class="lnr lnr-arrow-right"></span></a>
        </div>
        <!-- Comments area -->
        <!-- 
        <div class="comment-sec-area">
            <div class="container">
                <div class="row flex-column">
                    <h6>05 Comments</h6>
                    <div class="comment-list">
                        <div class="single-comment justify-content-between d-flex">
                            <div class="user justify-content-between d-flex">
                                <div class="thumb">
                                    <img src="/img/blog/c1.jpg" alt="">
                                </div>
                                <div class="desc">
                                    <h5><a href="#">Emilly Blunt</a></h5>
                                    <p class="date">December 4, 2017 at 3:12 pm </p>
                                    <p class="comment">
                                        Never say goodbye till the end comes!
                                    </p>
                                </div>
                            </div>
                            <div class="reply-btn">
                                <a href="" class="btn-reply text-uppercase">reply</a>
                            </div>
                        </div>
                    </div>
                    <div class="comment-list left-padding">
                        <div class="single-comment justify-content-between d-flex">
                            <div class="user justify-content-between d-flex">
                                <div class="thumb">
                                    <img src="/img/blog/c2.jpg" alt="">
                                </div>
                                <div class="desc">
                                    <h5><a href="#">Emilly Blunt</a></h5>
                                    <p class="date">December 4, 2017 at 3:12 pm </p>
                                    <p class="comment">
                                        Never say goodbye till the end comes!
                                    </p>
                                </div>
                            </div>
                            <div class="reply-btn">
                                <a href="" class="btn-reply text-uppercase">reply</a>
                            </div>
                        </div>
                    </div>
                    <div class="comment-list">
                        <div class="single-comment justify-content-between d-flex">
                            <div class="user justify-content-between d-flex">
                                <div class="thumb">
                                    <img src="/img/blog/c3.jpg" alt="">
                                </div>
                                <div class="desc">
                                    <h5><a href="#">Emilly Blunt</a></h5>
                                    <p class="date">December 4, 2017 at 3:12 pm </p>
                                    <p class="comment">
                                        Never say goodbye till the end comes!
                                    </p>
                                </div>
                            </div>
                            <div class="reply-btn">
                                <a href="" class="btn-reply text-uppercase">reply</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
    </div>
    <div class="comment-form">
        <h4>Post Comment</h4>
        <form>
            <div class="form-group form-inline">
                <div class="form-group col-lg-6 col-md-12 name">
                    <input type="text" class="form-control" id="name" placeholder="Enter Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Name'">
                </div>
                <div class="form-group col-lg-6 col-md-12 email">
                    <input type="email" class="form-control" id="email" placeholder="Enter email address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'">
                </div>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="subject" placeholder="Subject" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Subject'">
            </div>
            <div class="form-group">
                <textarea class="form-control mb-10" rows="5" name="message" placeholder="Messege" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Messege'" required=""></textarea>
            </div>
            <a href="#" class="primary-btn text-uppercase">Post Comment</a>
        </form>
    </div>
    @endif
</div>
@endsection


@section('js')
    <script src="{{ asset('js/categories.js') }}"></script>
@endsection
