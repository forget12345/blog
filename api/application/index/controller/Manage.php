<?php

namespace app\index\controller;

use app\index\model\ManageUser;
use app\index\model\Category;
use think\facade\Request;
use think\facade\Cookie;

class Manage
{
    public function __construct()
    {

    }

    public function index()
    {
        return '<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} a{color:#2E5CD5;cursor: pointer;text-decoration: none} a:hover{text-decoration:underline; } body{ background: #fff; font-family: "Century Gothic","Microsoft yahei"; color: #333;font-size:18px;} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.6em; font-size: 42px }</style><div style="padding: 24px 48px;"> <h1>:) </h1><p> ThinkPHP V5.1<br/><span style="font-size:30px">12载初心不改（2006-2018） - 你值得信赖的PHP框架</span></p></div><script type="text/javascript" src="https://tajs.qq.com/stats?sId=64890268" charset="UTF-8"></script><script type="text/javascript" src="https://e.topthink.com/Public/static/client.js"></script><think id="eab4b9f840753f8e7"></think>';
    }

    public function login()
    {
        $username = Request::post('username', '', 'strip_tags,strtolower');
        $password = md5(Request::post('password', '', 'strip_tags,strtolower'));
        $condition = array('username' => array('eq', $username), 'password' => array('eq', $password));
        $user = ManageUser::where($condition)->field('nickname,token')->select()->toArray();
        if ($user == null) {
            //登录失败
            $result = packJsonData('', 'fail login', 10001);
            Cookie::delete('token', 'auth_');
            Cookie::delete('name', 'auth_');
        } else {
            //登录成功
            $result = packJsonData('', 'login success', 0);
            $token = md5($username . $password . time() . rand(1, 100));
            Cookie::set('name', $user[0]['nickname'], ['prefix' => 'auth_', 'expire' => 3600]);
            Cookie::set('token', $token, ['prefix' => 'auth_', 'httponly' => true, 'expire' => 3600]);
            if (ManageUser::where('username', $username)->update(['token' => $token]) != true) {
                //token写入数据库失败，导致失败
                $result = packJsonData('', 'fail login , database unknown mistake', 10002);
                Cookie::delete('token', 'auth_');
                Cookie::delete('name', 'auth_');
            }
        }
        return $result;
    }

    //获取所有类别
    public function GetCategory()
    {
        $Category = Category::all();
        return packJsonData($Category, 'success', 0);
    }

    //增加一个类别
    public function ADDCategory()
    {
        if (Request::has('name', 'post')) {
            $name = Request::post('name', '', 'strip_tags,strtolower');
            if (Category::where('name', $name)->find()) {
                $result = packJsonData('', 'name exist ,Increase failure', 10005);
            } else {
                $Category = new Category;
                $Category->name = $name;
                $Category->save();
                $result = packJsonData('', 'success', 0);
            }
        } else {
            $result = packJsonData('', 'no input ,Increase failure', 10004);
        }
        return $result;

    }

    //修改一个类别: 延迟计划
    public function updateCategory()
    {

    }

    public function addArticle()
    {

    }
}
