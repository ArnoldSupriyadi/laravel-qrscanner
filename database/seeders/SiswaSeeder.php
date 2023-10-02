<?php

namespace Database\Seeders;

use App\Models\Siswa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $siswa = [
            $siswa = 
            [
                'nis' => '111',
                'nama' => 'arnold'
            ],
            [
                'nis' => '222',
                'nama' => 'zubair'
            ]
        ];
        
        Siswa::insert($siswa);
    }
}
