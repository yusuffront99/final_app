<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id' => 'a1d4m13i9n13',
            'nip' => '00000000',
            'nama_lengkap' => 'adminer',
            'nama_panggilan' => 'bot34',
            'email' => 'adminerbot@gmail.com',
            'password' => Hash::make('adminer123'),
            'divisi' => 'Admin',
            'tim_divisi' => 'Admin',
            'jabatan' => '-',
            'atasan' => '-',
            'profile_img' => '-'
        ]);
    }
}
