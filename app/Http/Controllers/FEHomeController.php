<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class FEHomeController extends Controller
{

    public function index(Request $request)
    {
        
        //Query tất cả bài viết
        $all = DB::table('baiviet')
        ->where('bv_status', 1)
        ->orderByDesc('id')
        ->paginate(12);

        //Query tin liên quan
        $lienquan = DB::table('baiviet')->orderByDesc('id')->limit(5)->get();

        return view('pages.home.index', compact('all', 'lienquan'));
    }
}
