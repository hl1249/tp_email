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


// Route::group('', function () {
//     Route::miss(function () {
//         return view(app()->getRootPath() . 'public/admin/index.html');
//     });
// });

Route::get('/', 'index/index');

// Route::get('hello/:name', 'index/hello');
Route::group('index', [
    'index'   => 'index/index',
    'hello' => 'index/hello',
    'write' => 'index/write',
    'read' => 'index/read',
    'delete' => 'index/delete',
]);

Route::group('mail', [
    'read'   => 'mail/read',
    'get_code' => 'mail/get_code',
    'verification' => 'mail/verification'
]);

Route::group('admin', function () {
    Route::miss(function () {
        return view(app()->getRootPath() . 'public/admin/index.html');
    });
});

return [

];
