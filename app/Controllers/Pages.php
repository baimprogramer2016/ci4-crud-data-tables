<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Pages extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'HOME',
        ];

        return view('pages/v_home', $data);
    }

    public function about()
    {
        $data = [
            'title' => 'ABOUT',
        ];
        return view('pages/v_about', $data);
    }
}
