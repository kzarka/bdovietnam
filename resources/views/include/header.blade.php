<?php
use App\Models\Categories;
$guide_categories = Categories::find(2)->children;
?>
<div class="header-top">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-6 col-6 header-top-left no-padding">
				<ul>
					<li><a href="#"><i class="fa fa-facebook"></i></a></li>
					<li><a href="#"><i class="fa fa-twitter"></i></a></li>
					<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
					<li><a href="#"><i class="fa fa-behance"></i></a></li>
				</ul>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-6 header-top-right no-padding">
				<ul>
					<li><a href="tel:+440 012 3654 896"><span class="lnr lnr-phone-handset"></span><span>+113</span></a></li>
					<li><a href="mailto:support@colorlib.com"><span class="lnr lnr-envelope"></span><span>support@bdovietnam.com</span></a></li>
				</ul>
			</div>
		</div>
	</div>
</div>
<div class="logo-wrap">
	<div class="container">
		<div class="row justify-content-between align-items-center">
			<div class="col-lg-4 col-md-4 col-sm-12 logo-left no-padding">
				<a href="/"><img class="img-fluid" src="{{ $logo->url ?: $logo->default_url }}" alt="BDOVietnam"></a>
			</div>
			<div class="col-lg-8 col-md-8 col-sm-12 logo-right no-padding ads-banner">
				<img class="img-fluid" src="{{ $top_ads->url ?: $top_ads->default_url }}" alt="">
			</div>
		</div>
	</div>
</div>
<div class="container main-menu" id="main-menu">
	<div class="row align-items-center justify-content-between">
		<nav id="nav-menu-container">
			<ul class="nav-menu">
				<li class="menu-active"><a href="/">Home</a></li>
				<li><a href="{{ route('category_list') }}">Category</a></li>
				<li class="menu-has-children"><a href="#">Hướng Dẫn</a>
				<ul>
					@foreach ($guide_categories as $category)
					<li><a href="{{ route('category', $category->slug ?: $category->id) }}">{{ $category->name }}</a></li>
					@endforeach
				</ul>
			</li>
			<li><a href="{{ route('about') }}">About</a></li>
			<li><a href="{{ route('class') }}">Classes</a></li>
			<li><a href="{{ route('contact') }}">Contact</a></li>
		</ul>
		</nav><!-- #nav-menu-container -->
		<div class="navbar-right">
			<form class="Search">
				<input type="text" class="form-control Search-box" name="Search-box" id="Search-box" placeholder="Search">
				<label for="Search-box" class="Search-box-label">
					<span class="lnr lnr-magnifier"></span>
				</label>
				<span class="Search-close">
					<span class="lnr lnr-cross"></span>
				</span>
			</form>
		</div>
	</div>
</div>

<section class="top-post-area pt-10">
	<div class="container no-padding">
		<div class="row">
			<div class="col-lg-12">
				<div class="timer-top">
					<div id="time_span" style="font-size: 12pt;display: inline-block;text-align: left;font-weight: bold;"></div>
					<div id="night_span" style="font-size: 10pt; text-align: left; display: inline-block; text-transform: uppercase; padding-left: 30px; font-weight: bold; color: rgb(255, 255, 255);"></div>
					<div id="daily_span" style="font-size: 10pt; text-align: left; display: inline-block; text-transform: uppercase; padding-left: 30px; color: rgb(255, 255, 255); font-weight: bold;"></div>
					<div id="imperial_span" style="font-size: 10pt; text-align: left; display: inline-block; text-transform: uppercase; padding-left: 30px; color: rgb(255, 255, 255); font-weight: bold;"></div>
				</div>
			</div>
		</div>
	</div>
</section>
