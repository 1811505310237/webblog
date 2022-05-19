<?php

namespace Modules\Admin\Http\Controllers;

use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AdminBaiVietController extends Controller
{
   #active sidebar
   public function __construct()
   {
       $this->middleware(function($request, $next){
           session(['module_active'=>'baiviet']);
           return $next($request);
       });
   }
   #end active sidebar

   //Index 
   public function index(Request $request)
   {
       $keyword = $request->baiviet;

       $baiviet = DB::table('baiviet')
       ->join('danhmuc', 'baiviet.bv_categoryID', '=', 'danhmuc.id')
       ->select('baiviet.*', 'danhmuc.dm_tenDanhMuc');

        if (!empty($keyword)) {
            $baiviet = $baiviet->where('bv_tieuDe', 'LIKE', '%'.$keyword.'%');
        }

       $baiviet = $baiviet->orderByDesc('baiviet.id')->paginate(10);
       return view('admin::pages.baiviet.index', compact('baiviet'));
   }

   //Create
   public function create()
   {
       $danhmuc = DB::table('danhmuc')->where('dm_status', 1)->orderByDesc('id')->get();
       return view('admin::pages.baiviet.create', compact('danhmuc'));
   }
   public function store(Request $request)
   {
        $data = $request->except('_token', 'bv_avatar');
        $data['bv_slug'] = Str::slug($request->bv_tieuDe);
        $data['bv_userID'] = 1;
        $data['created_at'] = Carbon::now('Asia/Ho_Chi_Minh');
        $data['updated_at'] = Carbon::now('Asia/Ho_Chi_Minh');
       //Xử lý upload ảnh
       if ($request->hasFile('bv_avatar')) {
            $file = $request->bv_avatar;
            $filename = $file->getClientOriginalName();
            $filename = Str::random(8).$filename;
            $file->move('public/uploads', $filename);
            $thumbnail = 'public/uploads/' .$filename;
            $data['bv_avatar'] = $thumbnail;
        }
        //end upload ảnh
        $id = DB::table('baiviet')->insertGetId($data);
        if ($id) {
            Toastr::success('Thêm mới thành công.', 'Message', ["positionClass" => "toast-top-right"]);
            return redirect()->back();
        }

    }

    //Edit
    public function edit($id)
    {
        $danhmuc = DB::table('danhmuc')->orderByDesc('id')->get();
        $baiviet = DB::table('baiviet')->where('id', $id)->get()[0];
        return view('admin::pages.baiviet.edit', compact('baiviet', 'danhmuc'));
    }
    public function update(Request $request)
    {
        $id = $request->id;

        $data = $request->except('_token', 'bv_avatar');
        $data['bv_slug'] = Str::slug($request->bv_tieuDe);
        $data['bv_userID'] = 1;
        $data['updated_at'] = Carbon::now('Asia/Ho_Chi_Minh');
       //Xử lý upload ảnh
       if ($request->hasFile('bv_avatar')) {
            $file = $request->bv_avatar;
            $filename = $file->getClientOriginalName();
            $filename = Str::random(8).$filename;
            $file->move('public/uploads', $filename);
            $thumbnail = 'public/uploads/' .$filename;
            $data['bv_avatar'] = $thumbnail;
        }
        //end upload ảnh
        if ($data) {
            DB::table('baiviet')->where('id', $id)->update($data);
            Toastr::success('Cập nhật thành công.', 'Message', ["positionClass" => "toast-top-right"]);
            return redirect()->route('admin.baiviet.index');
        }
    }

    //Delete
    public function delete(Request $request)
    {
        if ($request->ajax()) {
            $id = $request->id;
            DB::table('baiviet')->where('id', $id)->delete();
            return response(1);
        }
    }
}
