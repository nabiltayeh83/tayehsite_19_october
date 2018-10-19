@php
if($lg == '_en'){ $talign = "left"; $tdir = "ltr"; }
else{ $talign = "right"; $tdir = "rtl";}
@endphp

<div class="row">
<div class="col-lg-12 text-right sidebar-widget-area"> 
<h5 class="title" dir="{{$tdir}}" align="{{$talign}}"> {{ __("Home") }} /  
@if(Route::currentRouteName() != 'homepage')


@php
echo $category->{"name".$lg};
@endphp

@endif
</h5>
</div>
                    
@if(isset($results))
<div class="tab-pane fade show active" id="world-tab-1" role="tabpanel" aria-labelledby="tab1">

@foreach($results as $r) 	

@php
$title = $r->{"title".$lg};
@endphp

<div class="single-blog-post post-style-4 d-flex align-items-center">
<div class="post-thumbnail">
<a href="{{asset('details/'. $r->id)}}">
<img src="{{asset('storage/img/thumbnail/'.$r->image)}}" alt="">
</a>
</div>
<div class="post-content">
<a href="{{asset('details/'. $r->id)}}" class="headline">
<h5 id="h3title"><b>{{$title}}</b></h5>
</a>
</div>
</div>

@endforeach  			
</div>
@endif		
   
<div class="col-lg-12 text-right">
{{$results->links()}}
</div>
   
</div>			