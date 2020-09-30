<?php

namespace App\Http\Controllers\Website;

class HomeController extends WebsiteController
{
    public function index()
    {
        return $this->view('website.home');
    }
}
