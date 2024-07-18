<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */
use App\Controller\IndexController;
use App\Controller\VodController;
use Hyperf\HttpServer\Router\Router;

Router::addRoute(['GET', 'POST', 'HEAD'], '/', 'App\Controller\IndexController@index');

Router::get('/favicon.ico', function () {
    return '';
});
Router::get('/typevod/{type_id}', [VodController::class, 'typeVod']);
Router::get('/vod_detail/{vod_id}', [IndexController::class, 'detail']);
Router::get('/vodplay/{vod_id}-{url_id}', [IndexController::class, 'play']);

Router::get('/captcha', [IndexController::class, 'captcha']);
Router::get('/login', [IndexController::class, 'loginView']);
Router::post('/login', [IndexController::class, 'login']);
