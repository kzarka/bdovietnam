@extends('layouts.max-width')

@section('title', 'Classes')

@section('content')
<!-- Start Classes Area -->
<div class="black_class lozad" data-background-image="https://akamai-webcdn.kgstatic.net/renewal/static/images/bg_class.jpg" data-loaded="true" style="background-image: url(&quot;https://akamai-webcdn.kgstatic.net/renewal/static/images/bg_class.jpg&quot;);">
    <div class="inner_class"><!-- 각성일 경우 normal 제거 -->
        <h3 class="screen_out">CLASSES</h3>
        <ul class="list_class obj">
            @foreach ($classes as $class)
            <li>
                <a href="javascript:;" class="link_class link_{{ $class->index }}" data-class="{{ $class->index }}">
                    {{ $class->name }}
                </a>
            </li>
            @endforeach
        </ul>
        <div class="info_class">
            @foreach ($classes as $class)
            <div class="detail_class detail_{{ $class->index }}"><!-- 각성시 awake 클래스 추가 -->
                <strong class="tit_class obj"><span class="ico_mark"></span>{{ $class->name }}<span class="txt_awake">AWAKENING</span></strong>
                <p class="desc_normal obj">{{ $class->desc_normal }}</p>
                <p class="desc_awake obj" style="">{{ $class->desc_awaken }}</p>
                <div class="char_normal obj">
                    <div class="bg_cloud lozad" style="background-image: url('https://akamai-webcdn.kgstatic.net/renewal/static/images/class/bg_cloud.png');"></div>
                    <img src="https://akamai-webcdn.kgstatic.net/renewal/static/images/class/front_{{ $class->index }}.png" class="front_char lozad" alt="{{ $class->name }} image">
                    <img src="https://akamai-webcdn.kgstatic.net/renewal/static/images/class/back_{{ $class->index }}.png" class="back_char lozad" alt="{{ $class->name }} awakening image">
                </div>
                <div class="char_awake obj" style="">
                    <div class="bg_cloud lozad" style="background-image: url('https://akamai-webcdn.kgstatic.net/renewal/static/images/class/bg_cloud.png');"></div>
                    <img src="https://akamai-webcdn.kgstatic.net/renewal/static/images/class/front_{{ $class->index }}_awake.png" class="front_char lozad" alt="Dark Knight awakening image">
                    <img src="https://akamai-webcdn.kgstatic.net/renewal/static/images/class/back_{{ $class->index }}_awake.png" class="back_char lozad" alt="Dark Knight image">
                </div>
                <a href="javascript:;" class="img_black btn_trigger">Awakening On / Off</a>
            </div>
            @endforeach
        </div>
        <!-- normal -->
        <a href="" id="combat_link" class="btn_black btn_video obj movie_link awake cboxElement scroll_on">
            <span class="inner_btn">
                WATCH COMBAT VIDEO
                <span class="img_black ico_play"></span>
            </span>
        </a>
    </div>
</div>
<!-- End Classes Area -->
<div class="tit_article"></div>
@endsection


@section('js')
    <script src="{{ asset('js/classes.js') }}"></script>
@endsection
