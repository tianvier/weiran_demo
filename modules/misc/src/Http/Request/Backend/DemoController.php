<?php

declare(strict_types = 1);

namespace Misc\Http\Request\Backend;

use Weiran\MgrPage\Http\Request\Backend\BackendController;

class DemoController extends BackendController
{
    public function index(): string
    {
        return 'Misc Backend Request Success';
    }
}