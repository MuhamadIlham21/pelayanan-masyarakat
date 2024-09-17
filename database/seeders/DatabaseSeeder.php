<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::create([
        //     'no_identitas' => '12345',
        //     'nama' => 'lorem ipsum',
        //     'email' => 'admin.desa@gmail.com',
        //     'password' => Hash::make('password'),
        //     'no_telp' => '083156982031',
        //     'role' => 'admin',
        //     'status' => 'active',
        //     'jenis_identitas' => 'ktp'
        // ]);

        User::create([
            'no_identitas' => '12346',
            'nama' => 'Riska',
            'email' => 'riska.desa@gmail.com',
            'password' => Hash::make('password'),
            'no_telp' => '085876817258',
            'role' => 'pegawai',
            'status' => 'active',
            'jenis_identitas' => 'ktp'
        ]);
    }
}
