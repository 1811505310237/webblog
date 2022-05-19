<?php

use Illuminate\Support\Facades\Auth;

    //hàm lấy thông tin user đang login, sau này dùng trong middleware để check
    if (!function_exists('get_data_user')) {
        function get_data_user($type, $field = 'id')
        {
            return Auth::guard($type)->user() ? Auth::guard($type)->user()->$field :'';
        }
    }

?>