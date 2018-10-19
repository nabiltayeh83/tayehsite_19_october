<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Session;

class Controller extends BaseController
{
	
protected $pnum = 12;
	
public function sitelang(){
if(Session::get('locale') == '' || !Session::get('locale') || (Session::get('locale') == 'ar'))
{ $lg = "_ar"; }
else{ $lg = "_en"; }
return $lg;
}
	
	
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
