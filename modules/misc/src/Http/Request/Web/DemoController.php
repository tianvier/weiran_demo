<?php

namespace Misc\Http\Request\Web;

use Inertia\Inertia;
use Weiran\Framework\Application\Controller;

class DemoController extends Controller
{
    public function index(): string
    {
        return 'Misc Web Request Success';
    }

    public function testVue()
    {

        return Inertia::render('misc::demo/index', [
            'test_count' => 10,
            'test_array'  => [
                ['id' => 1, 'name' => 'Test 1'],
                ['id' => 2, 'name' => 'Test 2'],
                ['id' => 3, 'name' => 'Test 3'],
            ],
            'test_obj'   => [
                'id'   => 1,
                'name' => 'Test Object',
            ],
            'test_value' => 'Hello, World!',
        ]);
    }
}