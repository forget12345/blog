<?php

namespace app\index\controller;

use app\index\model\Category;
//use think\Request;
use think\db;
use think\facade\Request;

class Index
{
    public function index()
    {
        return 'welcome yuli blog';
    }

    public function getcategory()
    {
        $Category = Category::all();
        return packJsonData($Category, 'success', 0);
        $result = packJsonData('', 'success', 0);
        return $result;
    }

    public function getblog()
    {
        if (Request::has('page', 'get') && Request::has('size', 'get')) {
//            $Category = Db::table('blog_content')->where('delete_time', 'null')->page(Request::instance()->get('page', '', 'htmlspecialchars'), Request::instance()->get('size', '', 'htmlspecialchars'))->select();
            if (Request::has('category', 'get')) {
                $Category = Db::table('blog_content')
                    ->alias('a')
                    ->join('blog_category b ', 'b.Id= a.categoryId')
                    ->field('a.Id,a.title,a.created,b.name,a.visit')
                    ->where('b.Id', Request::instance()->get('category', '', 'htmlspecialchars'))
                    ->page(Request::instance()->get('page', '', 'htmlspecialchars'), Request::instance()->get('size', '', 'htmlspecialchars'))
                    ->select();
            } else {
                $Category = Db::table('blog_content')
                    ->alias('a')
                    ->join('blog_category b ', 'b.Id= a.categoryId')
                    ->field('a.Id,a.title,a.created,b.name,a.visit')
                    ->page(Request::instance()->get('page', '', 'htmlspecialchars'), Request::instance()->get('size', '', 'htmlspecialchars'))
                    ->select();
            }
            $result = packJsonData($Category, 'success', 0);

        } else {
            $result = packJsonData('', '缺失参数', 10010);
        }
        return $result;
    }

    public function getoneblog()
    {
        if (Request::has('id', 'get')) {
            $Category = Db::table('blog_content')
                ->alias('a')
                ->join('blog_category b ', 'b.Id= a.categoryId')
                ->field('a.Id,a.title,a.created,b.name,a.visit,a.text')
                ->where('a.Id', Request::instance()->get('id', '', 'htmlspecialchars'))
                ->select();
            $result = packJsonData($Category, 'success', 0);

        } else {
            $result = packJsonData('', '缺失参数', 10010);
        }
        return $result;
    }

    public function getWorks()
    {
        $Category = Db::table('blog_works')
            ->select();
        $result = packJsonData($Category, 'success', 0);

        return $result;
    }

    public function getUserInfo(){
        $Category = Db::table('blog_manage_user')
            ->field('nickname,img,github,say')
            ->find();
        $result = packJsonData($Category, 'success', 0);

        return $result;
    }
}
