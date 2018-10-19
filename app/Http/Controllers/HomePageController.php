<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\{
	Article,
	Category,
	Page
	};

class HomePageController extends Controller
{
	
    
	public function __invoke(){
		
		$results = Article::where('is_active', 1)
				   ->where('is_deleted', 0)
				   ->orderBy('id', 'desc')
				   ->paginate($this->pnum);
				   
		$lg = $this->sitelang();
		 
		return view('front.homepage', compact('results','lg'));
	}
	
	
	
	public function category($id){
	$results = Article::where('category_id', $id)
			   ->where('is_active', 1)
	           ->where('is_deleted', 0)
			   ->orderBy('id', 'desc')
			   ->paginate($this->pnum);
	$category = Category::find($id);			   
	
	$lg = $this->sitelang();	
	return view('front.byCategory', compact('results','category','lg'));		   
			   
	}

	
	
	public function details($id){
		$results = Article::find($id);
		$lg = $this->sitelang();
		return view('front.details', compact('results','lg'));
	}



	public function page($id){
		$results = Page::find($id);
		$lg = $this->sitelang();
		return view('front.page', compact('results','lg'));
	}


	
}
