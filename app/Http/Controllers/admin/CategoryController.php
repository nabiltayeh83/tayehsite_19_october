<?php
namespace App\Http\Controllers\admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use Session;

use App\{
	Category,
	Article
	};

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
		$key = $request->key;
		$results = Category::where("name_ar", "like", "%$key%")
		           ->orwhere("name_en", "like", "%$key%");
		$results = $results->orderBy('id', 'desc')->paginate($this->pnum)->appends(array("key" => $key));
        
        return view('back.categories.index', compact('results', 'key'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $Category = Category::create($request->all() + ['created_by' => \Auth::user()->id]);
		
	    Session::flash("msg","s:تم عملية الإضافة بنجاح");
	    return redirect('/admin/categories/create');
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
		$item= Category::find($id);
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
        $results = Category::find($id);
		return view('back.categories.edit', compact('results'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        $results = Category::find($id);
		$results->name_ar = $request["name_ar"];
		$results->name_en = $request["name_en"];
		$results->updated_by = \Auth::user()->id;
		$results->save();
		
		Session::flash("msg","s:تمت عملية التعديل بنجاح");
		return redirect('/admin/categories'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $articles = Article::where('category_id',$id)->count();
		if($articles >= 1){
			$errormsg = "لا يمكن حذف هذا التصنيف لوجود " . $articles . " مقال تابع له";
			Session::flash("msg","w: $errormsg");
		     return redirect('/admin/categories'); 
			}
			
		else{
			Category::where('id', $id)->delete();
		    Session::flash("msg","s:تم عملية الحذف بنجاح");
		    return redirect('admin/categories');
			}	
    }
}
