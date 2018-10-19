@extends('layouts.admin')

@section('title', 'إضافة تصنيف')



@section('content')

<div class="panel panel-default">


<div class="panel-body">
	
{!! Form::open(['route' => 'categories.store', 'method' => 'POST', 'files' => 'true' , 'class' => 'form-horizontal', 
'id' => 'artical_form']) !!}
{{csrf_field()}}


<div class="form-group">
{{ Form::label('title_itm', 'التصنيف بالعربي', ['class' => 'col-sm-2']) }}
<div class="col-sm-10">
{{ Form::text('name_ar', old('name_ar'), ['class' => 'form-control']) }}
</div></div>


<div class="form-group">
{{ Form::label('title_itm', 'التصنيف بالإنجليزي', ['class' => 'col-sm-2']) }}
<div class="col-sm-10">
{{ Form::text('name_en', old('name_en'), ['class' => 'form-control', 'style' => 'direction:ltr;']) }}
</div></div>


<div class="form-group">
{{ Form::label('is_active', 'فعال', ['class' => 'col-sm-2']) }}
<div class="col-sm-10">
{{ Form::checkbox('is_active', 1, 1, ['id' => 'is_active']) }}
</div></div>


<div class="form-group">
<div class="col-sm-offset-2 col-sm-10">
{{ Form::submit('حفظ', ['class' => 'btn btn-primary']) }}
<a href="{{ asset('admin/categories/') }}" class="btn btn-default">إلغاء</a>
</div></div>


{!! Form::close() !!}
 

</div>
<!-- / panel-body -->

</div>

@endsection