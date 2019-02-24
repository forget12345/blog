<?php
namespace app\index\controller;
use app\index\model\Category;
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
}
