<?php
namespace app\index\controller;

class Index
{
    public function index()
    {
        return 'welcome yuli blog';
    }

    public function hello($name = 'ThinkPHP5')
    {
        return 'hello,' . $name;
    }

    public function q()
    {
        return 'hello';
    }
}
