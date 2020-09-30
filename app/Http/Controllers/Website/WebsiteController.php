<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;

class WebsiteController extends Controller
{
    protected function view($path, $data = [])
    {
        return parent::view($path, $data)
            ->with('settings', (object) ['description' => config('app.description')]);
    }
}
