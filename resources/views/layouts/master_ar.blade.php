@php
if($lg == '_en'){ $talign = "left"; $tdir = "ltr"; $langbutton = "عربي"; $lang = "ar"; }
else{ $talign = "right"; $tdir = "rtl"; $langbutton = "English"; $lang = "en"; }
@endphp


<!DOCTYPE html>
<html lang="{{$lang}}">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ __("Novelist Abdullah Tayeh") }}</title>
    <link rel="stylesheet" href="{{asset('style.css')}}">
    <link href="{{asset('front-theme/fonts/cairo/cairo.css')}}" rel="stylesheet">
</head>

<body style="font-family:cairo;">
    
@include('layouts.headernav')

<div class="hero-area">
 <div class="hero-slides owl-carousel">
   <div class="single-hero-slide bg-img background-overlay" style="background-image: 
   url({{asset('img/blog-img/bg2.jpeg')}});"></div>
   <div class="single-hero-slide bg-img background-overlay" style="background-image: 
   url({{asset('img/blog-img/bg1.jpeg')}});"></div>
 </div>       
@include('layouts.marquee')
</div>


<div class="main-content-wrapper section-padding-100">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12 col-lg-8" dir="{{$tdir}}" align="{{$talign}}">
      @yield('content')
      </div>
      
      <div class="col-12 col-md-8 col-lg-4">
        <div class="post-sidebar-area wow fadeInUpBig" data-wow-delay="0.2s" dir="{{$tdir}}" 
        align="{{$talign}}">
        @include('layouts.rightside')
        </div>
      </div>
    </div>


</div>
</div>

<footer class="footer-area">@include('layouts.footer')</footer>

    <script src="{{asset('js/jquery/jquery-2.2.4.min.js')}}"></script>
    <script src="{{asset('js/popper.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/plugins.js')}}"></script>
    <script src="{{asset('js/active.js')}}"></script>

</body></html>