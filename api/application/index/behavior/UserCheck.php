<?php

namespace app\index\behavior;

use think\Request;
use think\facade\Cookie;
use app\index\model\ManageUser;

class UserCheck
{
    public function run(Request $request, $params)
    {
        $ignoreAction = array('login', 'logout');

        if (strtolower(request()->controller()) == 'manage') {//管理员需要验证身份
            if (!in_array(strtolower(request()->action()), $ignoreAction)) {//登录以及退出不需要验证
                //coolies失效
                if (!Cookie::has('token', 'auth_') || !Cookie::has('token', 'auth_')) {
                    Cookie::delete('token', 'auth_');
                    Cookie::delete('name', 'auth_');
                    exit(json_encode(packJsonData('', 'Login expired , place try again', 10003)));
                } else {
                    //验证数据库token
                    if (ManageUser::where('token', Cookie::get('token', 'auth_'))->find() == null) {
                        Cookie::delete('token', 'auth_');
                        Cookie::delete('name', 'auth_');
                        exit(json_encode(packJsonData('', 'Log in from another place, please log in again', 10006)));
                    }

                }
            }
        }


    }
}
