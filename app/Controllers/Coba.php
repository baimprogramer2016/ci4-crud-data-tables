<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Coba extends BaseController
{

    public function index()
    {
        echo "Ini Adalah method Index";
    }

    public function varBaseController()
    {
        echo "Ambil data dari basecontroller" . $this->nama;
    }
    public function about($nama = '', $umur = 20)
    {
        echo "Namax Saya " . $nama . " Dan saya berumur " . $umur;
    }
    public function tangkap($nama = 'Baim', $umur = 20)
    {
        echo "Nama Saya " . $nama . " Dan saya berumur " . $umur;
    }
}
