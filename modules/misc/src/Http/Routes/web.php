<?php
declare(strict_types = 1);

/*
|--------------------------------------------------------------------------
| Demo
|--------------------------------------------------------------------------
|
*/

use Misc\Http\Request\Web\DemoController;

Route::group([
    'middleware' => ['cross','web'],
], function (Illuminate\Routing\Router $route) {
    $route->get('/', [DemoController::class, 'index']);
    $route->get('/demo', [DemoController::class, 'testVue']);
});