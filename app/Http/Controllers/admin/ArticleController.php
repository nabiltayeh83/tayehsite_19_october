<?php
namespace App\Http\Controllers\admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use Storage;
use Image;

use App\{
	Article,
	Category
	};

class ArticleController extends AdminBaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
		$key = $request->key;
		$results = Article::where("title_ar", "like", "%$key%")
		           ->orwhere("title_en", "like", "%$key%")
				   ->orwhere("details_ar", "like", "%$key%")
				   ->orwhere("details_en", "like", "%$key%");
		$results = $results->orderBy('id', 'desc')->paginate($this->pnum)->appends(array("key" => $key));
        return view('back.articles.index', compact('results', 'key'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$categories = Category::where('is_active',1)->where('is_deleted',0)->
		pluck('name_ar','id');
        return view('back.articles.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		if($request->file('file1') != ""){
		$file = $request->file('file1')->store('public/upload');
		$file = substr($file, 7);
		}
		else{ $file = ''; }
				

		$image = $request->file('photo');
		$input['imagename'] = time().'.'.$image->getClientOriginalExtension();	
		$destinationPath = ('storage/img/thumbnail');	
		
		$img = Image::make($image->getRealPath());
		$img->resize(320, 240);

		
		$img->save($destinationPath.'/'.$input['imagename']);

		$destinationPath = ('storage/img');
		$image->move($destinationPath, $input['imagename']);		
		
        $article = Article::create($request->all() + ['created_by' => \Auth::user()->id, 
		'image' =>  $input['imagename'], 'file' => $file]);
		
		
	    Session::flash("msg","s:تم عملية الإضافة بنجاح");
	    return redirect('/admin/articles/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
	
	
	
	public function active($id)
    {
		$item= Article::find($id);
        $item->is_active= 1-$item->is_active;
		$item->save();
    }
	
	
	

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
		$results = Article::find($id);
		$categories = Category::where('is_active',1)->where('is_deleted',0)
		              ->pluck('name_ar', 'id');
        return view('back.articles.edit', compact('results', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $results = Article::find($id);
		$results->title_ar = $request["title_ar"];
		$results->title_en = $request["title_en"];
		$results->details_ar = $request["details_ar"];
		$results->details_en = $request["details_en"];
		$results->is_active = $request["is_active"];
		$results->comment_status = $request["comment_status"];
		
		$file1 = $request->file('file1');
		$photo = $request->file('photo');
		
		if(isset($file1)){	
		$file = $request->file('file1')->store('public/upload');
		$file = substr($file, 7);
		$results->file = $file;
		}
		
		
		if(isset($photo)){
		$img = $request->file('photo')->store('public/img');
		$image = substr($img, 11);
		$results->image = $image;
		}
		
		$results->updated_by = \Auth::user()->id;
		$results->save();
		
		Session::flash("msg","s:تمت عملية التعديل بنجاح");
		return redirect('/admin/articles'); 
		
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = Article::find($id);
		if($result->image != ""){ 
			unlink('storage/img/'.$result->image); 
			unlink('storage/img/thumbnail/'.$result->image);
		}
		
		if($result->file != ""){ unlink('storage/'.$result->file); }
		
		Article::where('id', $id)->delete();
		Session::flash("msg","s:تم عملية الحذف بنجاح");
		return redirect('admin/articles');
    }
}
