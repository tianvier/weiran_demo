<?php

namespace Misc;

use Misc\Middlewares\HandleInertiaRequests;
use Weiran\Framework\Foundation\Http\Kernel;

class MiddlewareServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function boot(Kernel $kernel): void
    {
        // 如果需要注册其他中间件，可以在这里继续添加
        $this->app['router']->aliasMiddleware('handleInertia', HandleInertiaRequests::class);
    }

}