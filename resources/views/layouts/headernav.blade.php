<header class="header-area">
<div class="container">
<div class="row">
<div class="col-12">
<nav class="navbar navbar-expand-lg">
<a href="/lang/{{$lang}}" id="langbu">{{$langbutton}}</a>
<button class="navbar-toggler" type="button" 
data-toggle="collapse" data-target="#worldNav" aria-controls="worldNav" 
aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span></button>
<div class="collapse navbar-collapse" id="worldNav">
<ul class="navbar-nav ml-auto" dir="{{$tdir}}">
                                
<li class="nav-item active">
<a id="mainnv" href="/">{{ __("Home")}} <span class="sr-only">(current)</span></a>
</li>                                                             

<li class="nav-item"><a href="{{asset('page/1')}}" id="nv">{{ __("Writer")}}</a></li>
<li class="nav-item"><a href="{{asset('category/3')}}" id="nv">{{ __("News") }}</a></li>
<li class="nav-item"><a href="{{asset('category/4')}}" id="nv">{{ __("Activities") }}</a></li>
<li class="nav-item"><a href="{{asset('category/5')}}" id="nv">{{ __("Articles") }}</a></li>
<li class="nav-item"><a href="{{asset('category/6')}}" id="nv">{{ __("Studies") }}</a></li>
<li class="nav-item"><a href="{{asset('category/7')}}" id="nv">{{ __("Novels") }}</a></li>
<li class="nav-item"><a href="{{asset('category/8')}}" id="nv">{{ __("Short Stories") }}</a></li>
<li class="nav-item"><a href="{{asset('page/2')}}" id="nv">{{ __("Palestinian days")}}</a></li>
<li class="nav-item"><a href="{{asset('page/3')}}" id="nv">{{ __("Beit Daras")}}</a></li>
<li class="nav-item"><a href="{{asset('category/9')}}" id="nv">{{ __("Photos") }}</a></li>
<li class="nav-item"><a href="{{asset('category/10')}}" id="nv">{{ __("Vedio") }}</a></li>
</ul>
</div>
</nav>
</div>
</div>
</div>
</header>