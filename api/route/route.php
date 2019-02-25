<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

Route::get('think', function () {
    return 'hello,ThinkPHP5!';
});
//Route::get('/', 'index');
//Route::get('hello/:name', 'index/hello');

//manage
Route::post('manage/login', 'manage/login'); //login
Route::get('manage/category', 'manage/GetCategory'); //get blog category
Route::post('manage/category', 'manage/ADDCategory'); //write blog category
Route::post('manage/upload', 'manage/uploadImg'); //write blog category
Route::post('manage/article', 'manage/addArticle'); //write blog category
Route::get('manage/article', 'manage/getArticle'); //get blog category
Route::put('manage/article', 'manage/updateArticle'); //get blog category
Route::delete('manage/article', 'manage/deleteArticle'); //get blog category
Route::get('manage/onearticle', 'manage/getOneArticle'); //get blog category

//user
Route::get('public/category', 'index/getcategory');
Route::get('public/getblog', 'index/getblog');
Route::get('public/oneblog', 'index/getoneblog');

return [

];
