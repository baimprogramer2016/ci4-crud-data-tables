<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class UserSeeder extends Seeder
{
    public function run()
    {
        # normal
        // $data = [
        //     [
        //         'nama' => 'Ika',
        //         'alamat'    => 'Jaktim',
        //         'created_at' => Time::now(),
        //         'updated_at' => Time::now(),
        //     ],
        //     [
        //         'nama' => 'Tono',
        //         'alamat'    => 'Matrman',
        //         'created_at' => Time::now(),
        //         'updated_at' => Time::now(),
        //     ]
        // ];

        # insert batch
        $faker = \Faker\Factory::create('id_ID'); //id_ID orang indonesia

        for ($i = 0; $i < 100; $i++) {
            $data =   [
                'nama' => $faker->name(),
                'alamat'    => $faker->address(),
                'created_at' => Time::createFromTimestamp($faker->unixTime()),
                'updated_at' => Time::now(),
            ];
            $this->db->table('user')->insertBatch($data);
        }


        // Simple Queries
        // $this->db->query('INSERT INTO user (nama, alamat) VALUES(:nama:, :alamat:)', $data);

        // Using Query Builder
        // $this->db->table('user')->insert($data);
    }
}
