<?php

namespace Modules\Admin\Http\Controllers;

use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class AdminStaticPageController extends Controller
{
    #active sidebar
   public function __construct()
   {
       $this->middleware(function($request, $next){
           session(['module_active'=>'staticpage']);
           return $next($request);
       });
   }
   #end active sidebar


   //Index
   public function index()
   {
       $static = DB::table('static')->get();
       return view('admin::pages.static.index', compact('static'));
   }

   //Create
   public function create()
   {
       return view('admin::pages.static.create');
   }
   public function store(Request $request)
   {
       $data = $request->except('_token');
       $id = DB::table('static')->insertGetId($data);
       if ($id) {
            Toastr::success('Thêm mới thành công.', 'Message', ["positionClass" => "toast-top-right"]);
            return redirect()->back();
        }
   }

   //Edit
   public function edit($id)
   {
       $static = DB::table('static')->where('id', $id)->get()[0];

       return view('admin::pages.static.edit', compact('static'));
   }
   public function update(Request $request)
   {
       $id = $request->id;
       $data = $request->except('_token', 'id');
       if ($data) {
            DB::table('static')->where('id', $id)->update($data);
            Toastr::success('Cập nhật thành công.', 'Message', ["positionClass" => "toast-top-right"]);
            return redirect()->route('admin.static.index');
       }
   }

   //Delete
   public function delete(Request $request)
   {
       if ($request->ajax()) {
           $id = $request->id;
           DB::table('static')->where('id', $id)->delete();
           return response(1);
       }
   }
}
