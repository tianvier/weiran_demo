<?php

declare(strict_types = 1);

namespace Misc\Http;

use Route;
use Weiran\Framework\Application\RouteServiceProvider as WeiranFrameworkRouteServiceProvider;

class RouteServiceProvider extends WeiranFrameworkRouteServiceProvider
{
    protected $namespace = 'Misc\Request';

    /**
     * Define your route model bindings, pattern filters, etc.
     * @return void
     */
    public function boot()
    {
        $this->routes(function () {
            $this->mapWebRoutes();

            $this->mapApiRoutes();
        });
    }

    /**
     * Define the "web" routes for the module.
     * These routes all receive session state, CSRF protection, etc.
     * @return void
     */
    protected function mapWebRoutes(): void
    {
        Route::group([
            // todo auth
            'prefix' => 'misc',
        ], function () {
            require_once __DIR__ . '/Routes/web.php';
        });

        Route::group([
            'prefix'     => $this->prefix . '/misc',
            'middleware' => 'backend-auth',
        ], function () {
            require_once __DIR__ . '/Routes/backend.php';
        });
    }

    /**
     * Define the "api" routes for the module.
     * These routes are typically stateless.
     * @return void
     */
    protected function mapApiRoutes(): void
    {
        Route::group([
            // todo auth
            'prefix' => 'api/web/misc/v1',
        ], function () {
            require_once __DIR__ . '/Routes/api_v1.php';
        });
    }
}
