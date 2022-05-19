<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class AdminCommentController extends Controller
{
    #active sidebar
    public function __construct()
    {
        $this->middleware(function($request, $next){
            session(['module_active'=>'comment']);
            return $next($request);
        });
    }
    #end active sidebar

    public function index(Request $request)
    {
        $allComment = DB::table('comment')->orderByDesc('id')->paginate(10);
        return view('admin::pages.comment.index', compact('allComment'));
    }
    public function delete(Request $request)
    {
        if ($request->ajax()) {
            $id = $request->id;
            DB::table('comment')->where('id', $id)->delete();
            return response(1);
        }
    }
    public function changeStatus(Request $request)
    {
        if ($request->ajax()) {
            $id = $request->id;
            $status = DB::table('comment')->where('id', $id)->select('cmt_status')->get()[0]->cmt_status;
            if ($status == 1) {
                DB::table('comment')->where('id', $id)->update(["cmt_status"=> 0]);
                return response(1);
            }else {
                DB::table('comment')->where('id', $id)->update(["cmt_status"=> 1]);
                return response(1);
            }
        }
    }
}
