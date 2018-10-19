<?php
namespace App\Http\Controllers\admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ChangepasswordRequest;
use App\Http\Requests\UserRequest;

use App\{
	User,
	Page,
	Article,
	Category
	};
	
use Session;

class UserController extends AdminBaseController
{



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
		$key = $request->key;

		$results = User::where("name","like","%$key%")
		                 ->orwhere("email","like","%$key%");
		$results = $results->latest()->paginate($this->pnum)->appends(array("key"=>$key));
		
        return view('back.users.index', compact('results','key'));
    }
	
	
	
	
	public function active($id)
    {
		$item= User::find($id);
        $item->is_active= 1-$item->is_active;
		$item->save();
    }
	
	
	
	public function permission($id)
    {
        return view("back.users.permission",compact("id"));
    }
	
	

    public function setpermission($id,Request $request)
    {
		\DB::table("roles")->where("user_id", $id)->delete();
        
		foreach($request["permissions"] as $link){
			\DB::table("roles")->insert(array("user_id" => $id, "link_id" => $link));
			}
				
		Session::flash("msg","s:تمت عملية حفظ الصلاحيات بنجاح");	
		return redirect("/admin/users/permission/$id");
		
    }
	
	
	
	public function changepassword(){
			$id = \auth::user()->id;
			return view('back.users.changepassword');
			
		}
	
	
	public function updatepassword(ChangepasswordRequest $request){
			$id = \auth::user()->id;
			$oldpassword     = bcrypt($request['oldpassword']);

			
		if($this->IsValidOldPassword($request->input("oldpassword")))
		{
			$result = User::find(\auth::user()->id);
			$result->password = bcrypt($request['password']);
			$result->save();
		    Session::flash("msg","s:تم عملية التعديل بنجاح");
	        return redirect('/admin/users/changepassword');
		}
			else
				Session::flash("msg","w:الرجاءالتأكد من صحة كلمة المرور القديمة");
	        	return redirect('/admin/users/changepassword');
			
	}
	
	
	function IsValidOldPassword($password)
	{
		$user = \Auth::User();
		
		$credentials2 = ['email' => $user->email, 
			'password' => $password];

		if (\Auth::validate($credentials2)) {
			return 1;
		}
		else
			return 0;
	}	
	
	

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
		$post = User::create($request->all() + ['password' => bcrypt($request['password1'])]);
	    Session::flash("msg","s:تم عملية الإضافة بنجاح");
	    return redirect('/admin/users/create');
			
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
		$result = User::find($id);
        return view('back.users.edit', compact('result'));
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
		$result = User::find($id);		
		$result->name = $request["name"];
		$result->is_active = $request["is_active"];
	
		if($request["password1"]!="" && $request["password1"]!=null)
			{
				$result->password=bcrypt($request['password1']);
			}
		   
		$result->save();
		
		Session::flash("msg","s:تم عملية التعديل بنجاح");
        return redirect('/admin/users');    
	}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image = User::find($id);		
		
		$cat_entry = Category::where("created_by",$id)->orwhere("updated_by",$id)->orwhere("deleted_by",$id)->count();		
		$art_entry = Article::where("created_by",$id)->orwhere("updated_by",$id)->orwhere("deleted_by",$id)->count();
		$page_entry = Page::where("created_by",$id)->orwhere("updated_by",$id)->orwhere("deleted_by",$id)->count();

		
		if($cat_entry >= 1 or $art_entry >= 1 or $page_entry >= 1){
			Session::flash("msg","w:لا يمكن حذف هذا المستخدم لوجود بيانات مدخلة بواسطته");
			return redirect('/admin/users');
			}
		
		else
		User::where('id', $id)->delete();
		\DB::table("roles")->where("user_id", $id)->delete();
				
		Session::flash("msg","s:تم عملية الحذف بنجاح");
		return redirect('/admin/users');

    }  
  


}
