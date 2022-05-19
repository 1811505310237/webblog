<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Request $request)
    {
        //#Lấy số lượng đang truy cập
        $user_ip_address = $request->ip();
        $visitor_current = DB::table('visitor')->where('ip_address', $user_ip_address)->get();
        $visitor_count = $visitor_current->count();
        if ($visitor_count < 1) {
            DB::table('visitor')->insert(["ip_address" => $user_ip_address, "date_visitor" => Carbon::now('Asia/Ho_Chi_Minh')->toDateString()]);
        }
        
        //Lấy tổng số truy cập
        $total_visitor = DB::table('visitor')->count();  

        //Lấy địa chỉ của Admin
        $address = DB::table('users')->where('id', 1)->get()[0]->address;

        View::share('visitor_count', $visitor_count);
        View::share('total_visitor', $total_visitor);
        View::share('address', $address);
    }
}
