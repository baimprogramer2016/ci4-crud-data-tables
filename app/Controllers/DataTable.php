<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;


class DataTable extends BaseController
{
    protected $data_user;
    public function __construct()
    {
        $this->data_user = new UserModel();
    }
    public function index()
    {
        $data = [
            'title' => 'Data Table',
            'data_user' => $this->data_user->findAll(),
        ];
        return view('data-table/v_index', $data);
    }
}
