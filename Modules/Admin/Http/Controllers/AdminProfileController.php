<?php

namespace Modules\Admin\Http\Controllers;

use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AdminProfileController extends Controller
{
    #active sidebar
    public function __construct()
    {
        $this->middleware(function($request, $next){
            session(['module_active'=>'profile']);
            return $next($request);
        });
    }
    #end active sidebar

    //index
    public function index()
    {
        return view('admin::pages.profile.index');
    }
    //update
    public function update(Request $request)
    {
        $data = $request->except('_token', 'avatar');

        //Xử lý upload ảnh
        if ($request->hasFile('avatar')) {
            $file = $request->avatar;
            $filename = $file->getClientOriginalName();
            $filename = Str::random(10).$filename;
            $file->move('public/uploads/profile/', $filename);
            $thumbnail = 'public/uploads/profile/' .$filename;
            $data['avatar'] = $thumbnail;
        }
        //end upload ảnh
        if ($data) {
            DB::table('users')->where('id', get_data_user('web', 'id'))->update($data);
            Toastr::success('Cập nhật thành công.', 'Message', ["positionClass" => "toast-top-right"]);
            return redirect()->back();
        }
    }
}
