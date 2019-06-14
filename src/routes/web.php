<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => '/Laravel/route'], function () {
    Route::get('/index/index', function () {
        \Illuminate\Support\Facades\Log::info('test tars log');
        return app('service.demo')->ping() . ':接入Laravel Router成功啦,配置:' . json_encode(config('foo'));
    });
});
