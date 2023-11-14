<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;
use App\Models\UserModel;

class CreateAPi extends BaseController
{
    use ResponseTrait;

    protected $user_model;
    public function __construct()
    {
        $this->user_model  = new UserModel();
    }
    public function index()
    {
        $data = $this->user_model->findAll(5);
        return $this->failNotFound('Data tidak ditemukan.');
    }
}
