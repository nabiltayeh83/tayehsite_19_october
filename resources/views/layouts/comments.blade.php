@php
if(Session::get('locale') == "ar"){
$face_lang = "ar_AR";
}else{ $face_lang = "en_US"; }
@endphp


<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/{{$face_lang}}/sdk.js#xfbml=1&version=v2.12&appId=543275406064707&autoLogAppEvents=1';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div class="fb-comments" data-href="{{Request::url()}}" data-width="100%" data-numposts="8"></div>
