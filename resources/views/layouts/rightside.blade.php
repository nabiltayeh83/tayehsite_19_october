<div class="sidebar-widget-area">
<a href="{{asset('category/3')}}"><h5 class="title">{{ __("News") }}</h5></a>
<div class="widget-content">

@php $i = 1; @endphp
                                                       
@foreach($news as $item)
@php
$title = $item->{"title".$lg};
@endphp	
@if(isset($title))
<div class="single-blog-post post-style-2 d-flex align-items-center widget-post">
<div class="post-thumbnail">
<a href="{{asset('details/'. $item->id)}}" class="headline">
<img src="{{asset('storage/img/thumbnail/'.$item->image)}}" alt=""></a>
</div>
<div class="post-content">
<a href="{{asset('details/'. $item->id)}}" class="headline">
<h5 class="mb-0">{{$title}}</h5>
</a>
</div>
</div>
@endif
@endforeach  

</div>
</div>
                        
                        

<div class="sidebar-widget-area">
<h5 class="title">{{ __("Stay Connected") }}</h5>
<div class="widget-content">
<div class="social-area d-flex justify-content-between">
<a href="#"><i class="fa fa-facebook"></i></a>
<a href="#"><i class="fa fa-twitter"></i></a>
<a href="#"><i class="fa fa-pinterest"></i></a>
<a href="#"><i class="fa fa-vimeo"></i></a>
<a href="#"><i class="fa fa-instagram"></i></a>
<a href="#"><i class="fa fa-google"></i></a>
</div>
</div>
</div>
                                                


<div class="sidebar-widget-area">
<a href="{{asset('category/5')}}"><h5 class="title">{{ __("Articles") }}</h5></a>
<div class="widget-content">

@php $i = 1; @endphp
                                                       
@foreach($articles as $item)
@php
$title = $item->{"title".$lg};
@endphp	
@if(isset($title))

<div class="single-blog-post todays-pick">
<div class="post-thumbnail">
<a href="{{asset('details/'. $item->id)}}" class="headline">
<img src="{{asset('storage/img/thumbnail/'.$item->image)}}" alt=""></a>
</div>
<div class="post-content px-0 pb-0">
<a href="{{asset('details/'. $item->id)}}" class="headline">
<h5>{{$title}}</h5>
</a>
</div>
</div>
@endif
@endforeach 

</div>
</div>



<div class="sidebar-widget-area">
<a href="{{asset('category/7')}}"><h5 class="title">{{ __("Novels") }}</h5></a>
<div class="widget-content">
                                                       
@foreach($novels as $item)
@php
$lg = "_" . Session::get('locale');
@endphp	
@if(isset($title))

<div class="single-blog-post todays-pick">
<div class="post-thumbnail">
<a href="{{asset('details/'. $item->id)}}" class="headline">
<img src="{{asset('storage/img/thumbnail/'.$item->image)}}" alt=""></a>
</div>
<div class="post-content px-0 pb-0">
<a href="{{asset('details/'. $item->id)}}" class="headline">
<h5>{{$title}}</h5>
</a>
</div>
</div>
@endif
@endforeach 

</div>
</div>



<div class="sidebar-widget-area">
<a href="{{asset('category/6')}}"><h5 class="title">{{ __("Studies") }}</h5></a>
<div class="widget-content">
                                                       
@foreach($studies as $item)
@php
$lg = "_" . Session::get('locale');
@endphp	
@if(isset($title))

<div class="single-blog-post todays-pick">
<div class="post-thumbnail">
<a href="{{asset('details/'. $item->id)}}" class="headline">
<img src="{{asset('storage/img/thumbnail/'.$item->image)}}" alt=""></a>
</div>
<div class="post-content px-0 pb-0">
<a href="{{asset('details/'. $item->id)}}" class="headline">
<h5>{{$title}}</h5>
</a>
</div>
</div>
@endif
@endforeach 

</div>
</div>