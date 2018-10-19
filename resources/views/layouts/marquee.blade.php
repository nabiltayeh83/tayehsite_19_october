<div class="hero-post-area">
<div class="container">
<div class="row">
<div class="col-12">
<div class="hero-post-slide">

@php $i = 1; @endphp                                                       
@foreach($marquee as $item)
@php
$title = $item->{"title".$lg};
@endphp	
@if(isset($title))	
<div class="single-slide d-flex align-items-center">
<div class="post-number"><p>{{$i++}}</p></div>
<div class="post-title">
<a href="{{asset('details/'. $item->id)}}">{{$title}}</a>
</div>
</div>
@endif
@endforeach                            
</div>
</div>
</div>
</div>
</div>