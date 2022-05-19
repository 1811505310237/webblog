<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FEStaticPageController extends Controller
{
    //about page
    public function about()
    {
        $data = DB::table('static')->where('id', 2)->get()[0];
        return view('pages.about.index', compact('data'));
    }
    public function contact()
    {
        $data = DB::table('static')->where('id', 3)->get()[0];
        return view('pages.about.index', compact('data'));
    }
}
