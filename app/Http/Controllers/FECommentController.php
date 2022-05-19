<?php

namespace App\Http\Controllers;

use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FECommentController extends Controller
{
    //lưu bình luận
    public function saveComment(Request $request)
    {
        $data = $request->except('_token');
        $data['created_at'] = Carbon::now('Asia/Ho_Chi_Minh');
        $id = DB::table('comment')->insertGetId($data);
        if ($id) {
            Toastr::success('Gửi bình luận thành công.', 'Message', ["positionClass" => "toast-top-right"]);
            return redirect()->route('fe.home');
        }
    }
}
