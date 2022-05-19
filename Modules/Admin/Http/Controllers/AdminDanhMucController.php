<?php

namespace Modules\Admin\Http\Controllers;

use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AdminDanhMucController extends Controller
{
    #active sidebar
    public function __construct()
    {
        $this->middleware(function($request, $next){
            session(['module_active'=>'danhmuc']);
            return $next($request);
        });
    }
    #end active sidebar

    //Index
    public function index(Request $request)
    {
        $keyword = $request->danhmuc;

        $danhmuc = DB::table('danhmuc')
        ->orderByDesc('id');
        if (!empty($keyword)) {
            $danhmuc = $danhmuc->where('dm_tenDanhMuc', 'LIKE', '%'.$keyword.'%');
        }
        $danhmuc = $danhmuc->paginate(10);

        return view('admin::pages.danhmuc.index', compact('danhmuc'));
    }

    //Create
    public function create()
    {
        return view('admin::pages.danhmuc.create');
    }
    public function store(Request $request)
    {
        $data = $request->except('_token');
        $data['dm_slug'] = Str::slug($request->dm_tenDanhMuc);
        $id = DB::table('danhmuc')->insertGetId($data);
        if ($id) {
            Toastr::success('Thêm mới thành công.', 'Message', ["positionClass" => "toast-top-right"]);
            return redirect()->back();
        }
    }

    //Edit
    public function edit($id)
    {
        $danhmuc = DB::table('danhmuc')->where('id', $id)->get()[0];
        return view('admin::pages.danhmuc.edit', compact('danhmuc'));
    }
    public function update(Request $request)
    {
        $id = $request->id;
        $data = $request->except('_token', 'id');
        if ($data) {
            DB::table('danhmuc')->where('id', $id)->update($data);
            Toastr::success('Cập nhật thành công.', 'Message', ["positionClass" => "toast-top-right"]);
            return redirect()->route('admin.danhmuc.index');
        }
    }

    //Delete
    public function delete(Request $request)
    {
        if ($request->ajax()) {
            $id = $request->id;
            DB::table('danhmuc')->where('id', $id)->delete();
            return response(1);
        }
        return 0;
    }
}
