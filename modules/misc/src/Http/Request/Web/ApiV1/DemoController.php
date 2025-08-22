<?php

declare(strict_types = 1);

namespace Misc\Http\Request\Web\ApiV1;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Weiran\Framework\Application\ApiController;
use Weiran\Framework\Classes\Resp;

class DemoController extends ApiController
{
    public function index(): Response|JsonResponse|RedirectResponse
    {
        return Resp::success('Misc Api Request Success');
    }
}