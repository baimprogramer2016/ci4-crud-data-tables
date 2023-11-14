<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class User extends BaseController
{
    protected $user_model;

    public function __construct()
    {
        $this->user_model = new UserModel();
    }
    public function index()
    {

        //untuk pencarian
        if ($this->request->getVar('cari')) {
            $data_pencarian = $this->user_model->search($this->request->getVar('cari'));
        } else {
            $data_pencarian = $this->user_model;
        }
        $data = [
            'title' => 'Pagination User',
            'data_user' => $data_pencarian->paginate(6, 'user'),
            'pager' => $data_pencarian->pager,
            'nomor' => nomor($this->request->getVar('page_user'), 6)
        ];

        return view('user/v_index', $data);
    }
}
