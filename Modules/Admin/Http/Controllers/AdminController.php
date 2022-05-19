<?php
namespace Modules\Admin\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    #active sidebar
    public function __construct()
    {
        $this->middleware(function($request, $next){
            session(['module_active'=>'dashboard']);
            return $next($request);
        });
    }
    #end active sidebar

    
    public function index(Request $request)
    {
        $tongBaiViet = DB::table('baiviet')->count();
        $tongLuotXem = DB::table('baiviet')->sum('bv_view');
        
        //Thống kê tổng lượt truy cập
        $total_visitor = DB::table('visitor')->count();  
        
        return view('admin::index', compact('tongBaiViet', 'tongLuotXem', 'total_visitor'));
    }
}
