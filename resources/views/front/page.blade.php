@extends('layouts.master_ar')

@section('content')

@php
if(Session::get('locale') == '' || !Session::get('locale') || (Session::get('locale') == 'ar'))
{
 $lg = "_ar"; 
}

  else{ 
   $lg = "_en"; 
  }
@endphp

<div class="row sidebar-widget-area">
<div style="width:100%;">
<h5 class="title">{{ __("Home") }} / 
@php
echo $title    = $results->{"title".$lg};
$details  = $results->{"details".$lg};
@endphp
</h5>  
</div>             
@if(isset($results))
<div class="widget-content">   

@php if($results->image){  @endphp

<img style="width:100%;" src="{{asset('storage/img/'.$results->image)}}" 
class="img-responsive img-thumbnail img-rounded" >
<br>

@php } @endphp



@php
$det =  str_replace("<p>", "<p id='postdetails'>",$details);
$det1 =  str_replace("<img", "<br><img class='img-responsive img-thumbnail img-rounded'",
$det);

$det2 =  str_replace('width:', ' width1:', $det1);
$det3 =  str_replace('width=', ' width1=', $det2);

$det4 =  str_replace('height:', ' height1:', $det3);
$det5 =  str_replace('height=', ' height1=', $det4);
@endphp

{!!$det5!!}<br><br>

@include('layouts.comments')

</div>
@endif		   
</div>

@endsection