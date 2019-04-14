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
            'nama_desa' => 'Ababi',
            'deskripsi' => '-',
            'alamat' => 'Jalan Kepundung Desa Ababi Kecamatan Rendang Karangasem Bali',
            'email' => 'ababi.rendang@karangasemkab.go.id',
            'status_desa' => '-'
        ]);

        User::create([
            'desa_id' => $desa->id,
            'email' => 'okanuantara1709@gmail.com',
            'password' => bcrypt(123456),
            'nama' => 'I Komang Nuantara',
            'tgl_lahir' => '1994-09-17',
            'telepon' => '+62',
            'alamat' => '-',
            'role' => 'admin'
        ]);
    }
}
