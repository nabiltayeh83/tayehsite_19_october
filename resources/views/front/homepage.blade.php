@extends('layouts.master_ar')


@section('content')


<div class="post-content-area mb-50">

<div class="world-catagory-area">
<ul class="nav nav-tabs" id="myTab" role="tablist">
<a href="{{asset('category/4')}}"><li class="title">{{ __("Activities") }}</li></a>                                   
</ul>

<div class="tab-content" id="myTabContent">

<div class="tab-pane fade show active" id="world-tab-1" role="tabpanel" aria-labelledby="tab1">
<div class="row">

<div class="col-12 col-md-6">
@if($activities[0])
<div class=" wow fadeInUpBig" data-wow-delay="0.1s">
@php
$title = $activities[0]->{"title".$lg};
@endphp	
<div class="single-blog-post">
<div class="post-thumbnail">
<a href="{{asset('details/'. $activities[0]->id)}}" class="headline">
<img src="{{asset('storage/img/thumbnail/'.$activities[0]->image)}}" alt=""></a>
</div>
<div class="post-content">
<a href="{{asset('details/'. $activities[0]->id)}}" class="headline"><h5>{{$title}}</h5></a>
</div>
</div>
</div>
@endif
</div>


<div class="col-12 col-md-6">
@for($i=1; $i<=4; $i++) 
@php
$title = $activities[$i]->{"title".$lg};
@endphp                                 
@if(isset($title))                                                 
<div class="single-blog-post post-style-2 d-flex align-items-center wow fadeInUpBig" data-wow-delay="0.5s">
<div class="post-thumbnail">
<a href="{{asset('details/'. $activities[$i]->id)}}" class="headline">
<img src="{{asset('storage/img/thumbnail/'.$activities[$i]->image)}}" alt=""></a>
</div>
<div class="post-content">
<a href="{{asset('details/'. $activities[$i]->id)}}" class="headline">
<h5>{{$title}}</h5></a>
</div>
</div>
@endif
@endfor
                                            
</div>

</div>
</div>
</div>
</div>




<div class="world-catagory-area mt-50">
<ul class="nav nav-tabs" id="myTab2" role="tablist">
<a href="{{asset('category/9')}}"><li class="title">{{ __("Photos") }}</li></a>
</ul>

<div class="tab-content" id="myTabContent2">

<div class="tab-pane fade show active" id="world-tab-10" role="tabpanel" aria-labelledby="tab10">
<div class="row">

@for($i=0; $i<=1; $i++)
@php
$title = $photos[$i]->{"title".$lg};
@endphp
@if(isset($title))
<div class="col-12 col-md-6">
<div class="single-blog-post wow fadeInUpBig" data-wow-delay="0.2s">
<div class="post-thumbnail">
<a href="{{asset('details/'. $photos[$i]->id)}}" class="headline">
<img src="{{asset('storage/img/thumbnail/'.$photos[$i]->image)}}" alt=""></a>
</div>
<div class="post-content">
<a href="{{asset('details/'. $photos[$i]->id)}}" class="headline">
<h5>{{$title}}</h5></a>
</div>
</div>
</div>
@endif
@endfor


<div class="col-12">

<div data-wow-delay="0.4s">
<div class="single-cata-slide">
<div class="row">
                                                        
@for($i=2; $i<=5; $i++)
@php
$title = $photos[$i]->{"title".$lg};
@endphp
@if(isset($title))
<div class="col-12 col-md-6">
<div class="single-blog-post post-style-2 d-flex align-items-center mb-1">
<div class="post-thumbnail">
<a href="{{asset('details/'. $photos[$i]->id)}}" class="headline">
<img src="{{asset('storage/img/thumbnail/'.$photos[$i]->image)}}" alt=""></a>
</div>
<div class="post-content">
<a href="{{asset('details/'. $photos[$i]->id)}}" class="headline">
<h5>{{$title}}</h5></a>
</div></div></div>
@endif
@endfor

</div>
</div>                               

</div>
</div>
</div>
</div>
                                
</div>
</div>


<div class="world-catagory-area mt-50">
<div class="title">
<a href="{{asset('category/8')}}"><h5>{{ __("Short Stories") }}</h5></a>
</div>

@foreach($shortstories as $item)
@php
$title = $item->{"title".$lg};
@endphp	
@if(isset($title))

<div class="single-blog-post post-style-4 d-flex align-items-center wow fadeInUpBig" data-wow-delay="0.5s">
<div class="post-thumbnail">
<a href="{{asset('details/'. $item->id)}}">
<img src="{{asset('storage/img/thumbnail/'.$item->image)}}" alt=""></a>
</div>
<div class="post-content">
<a href="{{asset('details/'. $item->id)}}" class="headline">
<h5>{{$title}}</h5>
</a>
</div>
</div>

@endif
@endforeach

</div>




<div class="world-catagory-area mt-50">
<ul class="nav nav-tabs" id="myTab2" role="tablist">
<a href="{{asset('category/10')}}"><li class="title">{{ __("Vedio") }}</li></a>
</ul>

<div class="tab-content" id="myTabContent2">

<div class="tab-pane fade show active" id="world-tab-10" role="tabpanel" aria-labelledby="tab10">
<div class="row">

@for($i=0; $i<=1; $i++)
@php
$title = $vedio[$i]->{"title".$lg};
$title = $vedio[$i]->{"title".$lg};
@endphp
@if(isset($title))
<div class="col-12 col-md-6">
<div class="single-blog-post wow fadeInUpBig" data-wow-delay="0.2s">
<div class="post-thumbnail">
<a href="{{asset('details/'. $vedio[$i]->id)}}" class="headline">
<img src="{{asset('storage/img/thumbnail/'.$vedio[$i]->image)}}" alt=""></a>
</div>
<div class="post-content">
<a href="{{asset('details/'. $vedio[$i]->id)}}" class="headline">
<h5>{{$title}}</h5></a>
</div>
</div>
</div>
@endif
@endfor

</div>
</div>
                                
</div>
</div>


</div>

@endsection