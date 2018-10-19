<?php
namespace App\Providers;
use Illuminate\Support\ServiceProvider;

use App\Article;
use Session;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
	
       	view()->composer('layouts.marquee', function($view){
			$lg = "_" . Session::get('locale');
		    $title = "title".$lg;
				$view->with('marquee', Article::where('is_active',1)
				->where('is_deleted',0)->where($title, "!=", '')->orderBy('id','desc')
				->take(4)->get());
			});
			
			
			
		view()->composer('layouts.rightside', function($view){
			$lg = "_" . Session::get('locale');
		    $title = "title".$lg;
				$view->with('news', Article::where('category_id',3)->where('is_active',1)->
				where('is_deleted',0)->where($title, "!=", '')->orderBy('id','desc')
				->take(5)->get());
			});
				
				

		view()->composer('layouts.rightside', function($view){
			$lg = "_" . Session::get('locale');
		    $title = "title".$lg;
				$view->with('articles', Article::where('category_id',5)->where('is_active',1)->
				where('is_deleted',0)->where($title, "!=", '')->orderBy('id','desc')
				->take(1)->get());
			});
				
				
		
		view()->composer('front.homepage', function($view){
			$lg = "_" . Session::get('locale');
		    $title = "title".$lg;
				$view->with('activities', Article::where('category_id',4)->where('is_active',1)->
				where('is_deleted',0)->where($title, "!=", '')->orderBy('id','desc')
				->take(5)->get());
			});		
			
			
		
		view()->composer('front.homepage', function($view){
			$lg = "_" . Session::get('locale');
		    $title = "title".$lg;
				$view->with('photos', Article::where('category_id',9)->where('is_active',1)->
				where('is_deleted',0)->where($title, "!=", '')->orderBy('id','desc')
				->take(6)->get());
			});	
			
				
				
		view()->composer('front.homepage', function($view){
			$lg = "_" . Session::get('locale');
		    $title = "title".$lg;
				$view->with('vedio', Article::where('category_id',10)->where('is_active',1)->
				where('is_deleted',0)->where($title, "!=", '')->orderBy('id','desc')
				->take(2)->get());
			});
			
			

		view()->composer('layouts.rightside', function($view){
			$lg = "_" . Session::get('locale');
		    $title = "title".$lg;
				$view->with('novels', Article::where('category_id',7)->where('is_active',1)->
				where('is_deleted',0)->where($title, "!=", '')->orderBy('id','desc')
				->take(1)->get());
			});
			
		
		
		
		view()->composer('layouts.rightside', function($view){
			$lg = "_" . Session::get('locale');
		    $title = "title".$lg;
				$view->with('studies', Article::where('category_id',6)->where('is_active',1)->
				where('is_deleted',0)->where($title, "!=", '')->orderBy('id','desc')
				->take(1)->get());
			});	
			
			
	
		view()->composer('front.homepage', function($view){
			$lg = "_" . Session::get('locale');
		    $title = "title".$lg;
				$view->with('shortstories', Article::where('category_id',8)->where('is_active',1)->
				where('is_deleted',0)->where($title, "!=", '')->orderBy('id','desc')
				->take(2)->get());
			});			
			
			
    
	}

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
