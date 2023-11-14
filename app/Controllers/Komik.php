<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KomikModel;
use App\Validation\ValidationCustom;

class Komik extends BaseController
{

    protected $komik_model;

    public function __construct()
    {
        $this->komik_model = new KomikModel();
    }
    public function index()
    {
        # cara 1
        // $db = \Config\Database::connect();
        // $komik = $db->query("SELECT * FROM komik");

        // foreach ($komik->getResult() as $kom) {
        //     d($kom->judul);
        // }

        # cara 2
        // $komik = $this->komik_model->findAll();

        # cara 3
        $komik = $this->komik_model->getKomik();
        $data = [
            "title" => "Daftar Komik",
            "data_komik" => $komik
        ];
        return view('komik/v_index', $data);
    }

    public function detail($slug)
    {
        # cara 1
        // $komik_detail = $this->komik_model->where('slug', $slug)->first();
        $komik_detail = $this->komik_model->getKomik($slug);
        $data = [
            "data_komik" => $komik_detail
        ];

        if (empty($data['data_komik'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Judul Komik " . $slug . " Tidak Ditemukan");
        }
        return view('komik/v_detail', $data);
    }

    public function create()
    {
        $data = [
            "title" => "Form Tambah Data",
            // "validation" => \Config\Services::validation()
        ];

        return view("komik/v_tambah", $data);
    }

    public function save()
    {
        $validation = \Config\Services::validation(new ValidationCustom());

        # jika tidak valid
        if (!$validation->run($this->request->getPost(), 'komik_rules')) {
            return redirect()->to(base_url('komik/create'))->withInput();
        } else { # Jika Valid


            $slug = url_title($this->request->getVar('judul'), '-', true);

            $file_sampul = $this->request->getFile('sampul');

            //cek jika tidak ada gambar yang di upload
            if ($file_sampul->getError() == 4) {
                $nama_sampul = 'no_image.png';
            } else {
                //ambil nama file
                $nama_sampul = $file_sampul->getRandomName();
                // kopi ke file img
                $file_sampul->move('img', $nama_sampul);
            }

            $this->komik_model->insert([
                'judul' => $this->request->getPost('judul'),
                'slug' => $slug,
                'penulis' => $this->request->getPost('penulis'),
                'sampul' => $nama_sampul
            ]);

            session()->setFlashdata('message', "Berhasil Disimpan");
            return redirect()->to(base_url('komik'));
        }
    }

    public function delete($id)
    {
        $komik = $this->komik_model->find($id);

        //hapus file gambar
        if ($komik['sampul'] != 'no_image.png') {
            unlink('img/' . $komik['sampul']);
        }
        //hapus data
        $this->komik_model->delete($id);

        return redirect()->to(base_url('komik'));
    }

    public function edit($slug)
    {
        $data = [
            "title" => "Form Ubah Data",
            "komik" => $this->komik_model->getKomik($slug)
        ];

        return view("komik/v_edit", $data);
    }

    public function update($id)
    {
        $validation = \Config\Services::validation(new ValidationCustom());

        $validasi_custom = 'komik_rules';
        # check judul , jika judul tidak diubah hilangkan is_unique, jika berubah check dulu apa sudah ada
        if ($this->request->getVar('judul') == $this->request->getVar('judul_lama')) {
            $validasi_custom = 'komik_rules_2';
        }

        # jika tidak valid
        if (!$validation->run($this->request->getPost(), $validasi_custom)) {
            return redirect()->to(base_url('komik/edit/' . $this->request->getVar('slug')))->withInput();
        } else { # Jika Valid

            $slug = url_title($this->request->getVar('judul'), '-', true);

            $file_sampul = $this->request->getFile('sampul');
            //cek gambar apakah ganti gambar
            if ($file_sampul->getError() == 4) {
                $nama_sampul = $this->request->getVar('sampul_lama');
            } else {
                //generate nama random
                //ambil nama file
                $nama_sampul = $file_sampul->getRandomName();
                // kopi ke file img
                $file_sampul->move('img', $nama_sampul);
                //hapus file lama dan jika file default abaikan
                if ($this->request->getVar('sampul_lama') != 'no_image.png') {
                    unlink('img/' . $this->request->getVar('sampul_lama'));
                }
            }


            $this->komik_model->save([
                'id' => $id,
                'judul' => $this->request->getPost('judul'),
                'slug' => $slug,
                'penulis' => $this->request->getPost('penulis'),
                'sampul' => $nama_sampul
            ]);

            session()->setFlashdata('message', "Berhasil Diubah");
            return redirect()->to(base_url('komik'));
        }
    }
}
