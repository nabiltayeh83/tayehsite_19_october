@extends('layouts.admin')

@section('title', 'إضافة مقال')



@section('content')

<div class="panel panel-default">


<div class="panel-body">
	
{!! Form::open(['route' => 'articles.store', 'method' => 'POST', 'files' => 'true' , 'class' => 'form-horizontal', 
'id' => 'artical_form']) !!}
{{csrf_field()}}


<div class="form-group">
{{ Form::label('title_itm', 'العنوان باللغة العربية', ['class' => 'col-sm-2']) }}
<div class="col-sm-10">
{{ Form::text('title_ar', old('title_ar'), ['class' => 'form-control']) }}
</div></div>


<div class="form-group">
{{ Form::label('title_itm', 'العنوان باللغة الإنجليزية', ['class' => 'col-sm-2']) }}
<div class="col-sm-10">
{{ Form::text('title_en', old('title_en'), ['class' => 'form-control', 'style' => 'direction:ltr;']) }}
</div></div>


<div class="form-group">
{{ Form::label('title_itm', 'التفاصيل باللغة العربية', ['class' => 'col-sm-2']) }}
<div class="col-sm-10">
{{ Form::textarea('details_ar', old('details_ar'), ['class' => 'form-control ckeditor', 
'style' => 'height:70px;', 'id' => 'details_ar']) }}
</div></div>


<div class="form-group">
{{ Form::label('title_itm', 'التفاصيل باللغة الإنجليزية', ['class' => 'col-sm-2']) }}
<div class="col-sm-10">
{{ Form::textarea('details_en', old('details_en'), ['class' => 'form-control ckeditor', 
'id' => 'details_en', 'dir' => 'rtl']) }}
</div></div>


<div class="form-group">
{{ Form::label('title_itm', 'التصنيف', ['class' => 'col-sm-2']) }}
<div class="col-sm-10">
{{ Form::select('category_id', $categories, 1, ['class' => 'form-control', 'style' => 'padding:2px;']) }}
</div></div>


<div class="form-group">
{{ Form::label('title_itm', 'صورة', ['class' => 'col-sm-2']) }}
<div class="col-sm-10">
<input type="file" class="form-control" name="photo" required="required" />

</div></div>


<div class="form-group">
{{ Form::label('title_itm', 'إرفاق ملف', ['class' => 'col-sm-2']) }}
<div class="col-sm-10">
<input type="file" class="form-control" name="file1"/>
</div></div>



<div class="form-group">
{{ Form::label('comment_status', 'التعليقات', ['class' => 'col-sm-2']) }}
<div class="col-sm-10">
{{ Form::checkbox('comment_status', 1, 1, ['id' => 'comment_status']) }}
</div></div>

<div class="form-group">
{{ Form::label('is_active', 'فعال', ['class' => 'col-sm-2']) }}
<div class="col-sm-10">
{{ Form::checkbox('is_active', 1, 1, ['id' => 'is_active']) }}
</div></div>


<div class="form-group">
<div class="col-sm-offset-2 col-sm-10">
{{ Form::submit('حفظ', ['class' => 'btn btn-primary']) }}
<a href="{{ asset('admin/articles/') }}" class="btn btn-default">إلغاء</a>
</div></div>


{!! Form::close() !!}
 

</div>
<!-- / panel-body -->

</div>


@endsection