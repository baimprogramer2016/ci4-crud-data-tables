<?php

namespace App\Validation;

use Config\Validation;

class ValidationCustom extends Validation
{
    public array $komik_rules = [
        'judul' => [
            'label' => 'Judul',
            'rules' => 'required|min_length[2]|is_unique[komik.judul]',
            'errors' => [
                'required' => 'Judul Wajib diisi',
                'min_length' => 'Minimal 2 Karakter',
                'is_unique' => '{value} Sudah terdaftar'
            ]
        ],
        'penulis' => [
            'label' => 'Penulis',
            'rules' => 'required|min_length[2]',
            'errors' => [
                'required' => 'Penulis Wajib diisi',
                'min_length' => 'Minimal 2 Karakter',
            ]
        ],
        'sampul' => [
            'label' => 'Sampul',
            'rules' => 'max_size[sampul,1024]|mime_in[sampul,image/png,image/jpeg]|ext_in[sampul,png,jpg,gif]',
            'errors' => [
                'max_size' => 'Tidak boleh lebih dari 1024',
                'mime_in' => 'Hanya boleh Image',
                'ext_in' => 'Format Hanya boleh png,jpg,gif',
            ]
        ]
    ];
    public array $komik_rules_2 = [
        'judul' => [
            'label' => 'Judul',
            'rules' => 'required|min_length[2]',
            'errors' => [
                'required' => 'Judul Wajib diisi',
                'min_length' => 'Minimal 2 Karakter',
                'is_unique' => '{value} Sudah terdaftar'
            ]
        ],
        'penulis' => [
            'label' => 'Penulis',
            'rules' => 'required|min_length[2]',
            'errors' => [
                'required' => 'Penulis Wajib diisi',
                'min_length' => 'Minimal 2 Karakter',
            ]
        ],
        'sampul' => [
            'label' => 'Sampul',
            'rules' => 'max_size[sampul,1024]|mime_in[sampul,image/png,image/jpeg]|ext_in[sampul,png,jpg,gif]',
            'errors' => [
                'max_size' => 'Tidak boleh lebih dari 1024',
                'mime_in' => 'Hanya boleh Image',
                'ext_in' => 'Format Hanya boleh png,jpg,gif',
            ]
        ],
    ];
}
