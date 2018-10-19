@extends('layouts.admin')

@section('title', 'إدارة المقالات')

@section('content')

<div class="panel panel-default">

	<div class="panel-heading">
     
<form method="get" action="{{ asset('admin/articles') }}" class="row">
        <div class="col-sm-3">
        <input autofocus name="key" id="key" type="text" required="required" class="form-control" placeholder="ابحث ...">
      	</div>
            
      	<div class="col-sm-1">
         <button class="btn btn-primary" type="submit">إبحث!</button>
        </div>
        
        <div class="col-sm-8 text-left">
            <a class="btn btn-success" href="{{asset('admin/articles/create')}}">
            <i class="glyphicon glyphicon-plus"></i>
            اضافة مقال جديد
        </a>
        </div>
    </form>    
    
    </div>
    <!-- / .panel-heading -->
    
    
    <div class="panel-body">
	
@if(isset($key))    
<h3>البحث عن / {{$key}}</h3><br />
@endif
 
<div class="table-responsive">    
<table class="table table-striped table-bordered table-hover">
<thead>
<tr>
<th width="5%">#</th>
<th>العنوان</th>
<th width="12%">القسم</th>
<th width="10%">الصورة</th>
<th width="7%">فعال</th>
<th width="5%"></th>
<th width="5%"></th>
</tr>
</thead>
<tbody>
@php $i = 1; @endphp
@foreach($results as $result)

<tr>
<td>{{$i++}}</td>
<td><b>{{$result->title_ar}}<br>{{$result->title_en}}</b></td>
<td>{{$result->category->name_ar}}</td>
<td><img class="thumbnail" style="max-height:100px; max-width:100px;" 
src="{{asset('storage/img/'.$result->image )}}"></td>
<td>
 
<input type="checkbox" value="{{$result->id}}" class="cbActive" {{$result->is_active?"checked":""}} >
</td>


<td>
	<a href="{{ asset('admin/articles/'.$result->id.'/edit') }}" class="btn btn-primary">
    <span class="glyphicon glyphicon-edit"></span></a>  
</td>


<td>    
	<a href="{{ asset('admin/articles/delete/'.$result->id) }}" class="btn Confirm btn-danger">
	<span class="glyphicon glyphicon-trash"></span></a>
</td>

</tr>
@endforeach
</tbody>
</table>
{{$results->links()}}

</div>
<!-- / .table-responisve -->
    

    </div>
    <!-- / panel-body -->

</div>

<script>
    $(function(){
        $(".cbActive").click(function(){
            var id=$(this).val();
            $.get("/admin/articles/active/"+id);
        });
    });
</script>




@endsection