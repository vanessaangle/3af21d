<?php

use Illuminate\Database\Seeder;
use App\Desa;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $desa = Desa::create([
            'nama_desa' => 'Dalung',
            'slug' => 'dalung',
            'deskripsi' => '-',
            'alamat' => 'jalan araya dalung',
            'email' => 'dalung@gmail.com',
            'status_desa' => '-'
        ]);

        User::create([
            'desa_id' => $desa->id,
            'email' => 'admin@admin.com',
            'password' => bcrypt(123456),
            'nama' => 'I Komang Nuantara',
            'tgl_lahir' => '1994-09-17',
            'telepon' => '+62',
            'alamat' => '-',
            'role' => 'Admin'
        ]);
    }
}
