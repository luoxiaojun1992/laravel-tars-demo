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

Route::group(['prefix' => '/test'], function () {
    Route::get('/http', function () {
        \Illuminate\Support\Facades\Log::info('test laravel tars log');
        return app('service.demo')->ping() . ':接入Laravel Router成功啦,配置:' . json_encode(config('foo')) . ',入参:' .
            json_encode(app('request')->all());
    });

    Route::get('/tars', function () {
        try {
            $config = \Lxj\Laravel\Tars\Config::communicatorConfig(config('tars.deploy_cfg'));
            $cservent = new \App\Tars\cservant\PHPTest\LaravelTars\tarsObj\TestTafServiceServant($config);
            return $cservent->test();
        } catch (\Throwable $e) {
            return $e->getMessage();
        }
    });
});
