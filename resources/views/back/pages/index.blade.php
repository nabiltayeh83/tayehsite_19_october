@extends('layouts.admin')

@section('title', 'إدارة الصفحات')



@section('content')

<div class="panel panel-default">


    <!-- / .panel-heading -->
    
    
    <div class="panel-body">

 
<div class="table-responsive">    
<table class="table table-striped table-bordered table-hover">
<thead>
<tr>
<th width="7%">#</th>
<th>الصفحة بالعربي</th>
<th>الصفحة بالإنجليزي</th>
<th width="12%">الصورة</th>
<th width="8%">فعال</th>
<th width="8%"></th>
</tr>
</thead>
<tbody>
@php $i = 1; @endphp
@foreach($results as $result)

<tr>
<td>{{$i++}}</td>
<td><b>{{$result->title_ar}}</td>
<td><b>{{$result->title_en}}</td>
<td>


@php
  if($result->image){
@endphp

<img class="thumbnail" style="max-height:100px; max-width:100px;" 
src="{{asset('storage/img/'.$result->image )}}">

@php
  }
@endphp

</td>
<td>
<input type="checkbox" value="{{$result->id}}" class="cbActive" {{$result->is_active?"checked":""}} >
</td>



<td>
	<a href="{{ asset('admin/pages/'.$result->id.'/edit') }}" class="btn btn-primary">
    <span class="glyphicon glyphicon-edit"></span></a>  
</td>


</tr>
@endforeach
</tbody>
</table>

</div>
<!-- / .table-responisve -->
    

    </div>
    <!-- / panel-body -->

</div>

<script>
    $(function(){
        $(".cbActive").click(function(){
            var id=$(this).val();
            $.get("/admin/pages/active/"+id);
        });
    });
</script>

@endsection