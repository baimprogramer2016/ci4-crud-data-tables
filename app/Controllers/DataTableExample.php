<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use \Hermawan\DataTables\DataTable;


class DataTableExample extends BaseController
{
    protected $data_user;
    protected $user_model;
    /**
     * Summary of __construct
     */
    public function __construct()
    {
        $this->user_model = new UserModel();
    }
    /**
     * Summary of index
     * @return string
     */
    public function index()
    {
        $data = [
            'title' => 'Data Table Simple',
            'data_user' => $this->user_model->findAll(),
        ];
        return view('data-table/v_index', $data);
    }

    public function VServerSide()
    {
        $data = [
            "title" => "Data Table Server Side"
        ];
        return view('data-table/v_serverside', $data);
    }


    public function ApiServerSide()
    {
        $db = db_connect();
        // $builder = $db->table('user')->select('nama,alamat');

        $this->data_user = $this->user_model->select('id,nama,alamat');

        return DataTable::of($this->data_user)
            ->addNumbering('no')
            ->filter(function ($builder, $request) {
                if ($request->nama || $request->alamat)
                    $builder->like('nama', $request->nama)->like('alamat', $request->alamat);
            })
            ->add('action', function ($row) {
                return "<a href=' " . $row->nama . "' type='button' class='btn btn-primary btn-sm'>Edit</a>";
                // return 'tes';
            })

            ->toJson(true);
    }
}
