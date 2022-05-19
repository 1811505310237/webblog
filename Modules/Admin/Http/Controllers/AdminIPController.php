<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class AdminIPController extends Controller
{
    #active sidebar
    public function __construct()
    {
        $this->middleware(function($request, $next){
            session(['module_active'=>'ip']);
            return $next($request);
        });
    }
    #end active sidebar

    //Index
    public function index()
    {
        $ip = DB::table('visitor')->orderByDesc('id')->paginate(10);
        return view('admin::pages.ip.index', compact('ip'));
    }
}
