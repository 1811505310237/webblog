<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FEPostController extends Controller
{
    //
    public function detail(Request $request)
    {
        //lấy id
        $url = $request->segment(1);
        $url = preg_split ("/\-/", $url);
        $id = $url[0];
        
        DB::table('baiviet')->where('id', $id)->increment('bv_view');

        $detail = DB::table('baiviet')->where('id', $id)->get()[0];
        $lienquan = DB::table('baiviet')->where('id', '<>', $id)->limit(5)->get();

        return view('pages.detail.index', compact('detail', 'lienquan'));
    }

    public function search(Request $request)
    {
        $keyword = $request->keyword;
        $lienquan = DB::table('baiviet')->limit(5)->get();
        $search = DB::table('baiviet')
        ->where('bv_tieuDe', 'LIKE', '%'.$keyword.'%')
        ->paginate(12);


        return view('pages.search.index', compact('lienquan', 'search', 'keyword'));
    }
}
