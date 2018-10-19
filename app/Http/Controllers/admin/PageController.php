<?php
namespace App\Http\Controllers\admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use App\Page;

class PageController extends AdminBaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {		
		$key = $request->key;
		$results = Page::all();
        return view('back.pages.index', compact('results', 'key'));
		
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
		$item= Page::find($id);
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
        $results = Page::find($id);
		return view('back.pages.edit', compact('results'));
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
        $results = Page::find($id);
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
		return redirect('/admin/pages'); 
		
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
