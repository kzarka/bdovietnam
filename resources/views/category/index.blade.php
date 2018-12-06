@extends('layouts.main')

@section('title', isset($category) ? $category->name : 'Category List')

@section('content')
@if (isset($category))
<div class="latest-post-wrap">
    <h4 class="cat-title">{{ $category->name }}</h4>
    @forelse ($collections as $collection)
    <div class="single-latest-post row align-items-center">
        <div class="col-lg-5 post-left">
            <div class="feature-img relative">
                <div class="overlay overlay-bg"></div>
                <img class="img-fluid" src="{{ asset('img/l1.jpg') }}" alt="">
            </div>
            <ul class="tags">
                <li><a href="#">{{ $category->name }}</a></li>
            </ul>
        </div>
        <div class="col-lg-7 post-right">
            <a href="{{ route('post', ['categoryIdentity' => $category->slug ?: $category->id, 'postIdentity' => $collection->post->slug ?: $collection->post->id]) }}">
                <h4>{{ $collection->post->title }}</h4>
            </a>
            <ul class="meta">
                <li><a href="#"><span class="lnr lnr-user"></span>{{ $collection->post->user->name }}</a></li>
                <li><a href="#"><span class="lnr lnr-calendar-full"></span>03 April, 2018</a></li>
                <li><a href="#"><span class="lnr lnr-bubble"></span>06 Comments</a></li>
            </ul>
            <p class="excert">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.
            </p>
        </div>
    </div>
    @empty
    <p>No users</p>
    @endforelse
    
    <div class="load-more">
        <a href="#" class="primary-btn">Load More Posts</a>
    </div>
    
</div>
@endif
@endsection


@section('js')
    <script src="{{ asset('js/categories.js') }}"></script>
@endsection