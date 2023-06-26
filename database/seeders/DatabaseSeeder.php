<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        // make user roles admin and user
        \App\Models\Role::create([
            'role_name' => 'admin'
        ]);
        \App\Models\Role::create([
            'role_name' => 'user'
        ]);

        // make user admin
        \App\Models\User::create([
            'id' => 200,
            'name' => 'admin',
            'username' => 'admin',
            'password' => bcrypt('admin'),
            'role_id' => 1 // admin
        ]);

        // make user user
        \App\Models\User::create([
            'id' => 201,
            'name' => 'user',
            'username' => 'user',
            'password' => bcrypt('user'),
            'role_id' => 2 // user
        ]);

        // make provinsi
        \App\Models\Provinsi::create([
            'id' => 35,
            'name' => 'Jawa Timur'
        ]);

        // make kabupaten
        \App\Models\Kabupaten::create([
            'id' => 10,
            'provinsi_id' => 35,
            'name' => 'Banyuwangi'
        ]);

        // make kecamatan
        \App\Models\Kecamatan::create([
            'id' => 180,
            'kabupaten_id' => 10,
            'name' => 'Banyuwangi'
        ]);

        // make desa
        \App\Models\Desa::create([
            'id' => 18,
            'kecamatan_id' => 180,
            'name' => 'Tamanbaru'
        ]);

        // make sls
        \App\Models\Sl::create([
            'id' => 2,
            'desa_id' => 18,
            'sub_sls' => '02',
            'name' => 'Singosari'
        ]);

        // make keluarga dengan rincian sebagai berikut:

        \App\Models\Keluarga::create([
            'id' => 1,
            'nama_kepala_keluarga' => 'Slamet Efendi',
            'no_urut_bangunan' => '12',
            'no_urut_keluarga_verifikasi' => '14',
            'status' => '3',
            'jml_anggota_keluarga' => '5',
            'landmark' => '67B4PT',
            'no_kk' => '3510161708000001',
            'kode_kk' => '1',
            'alamat' => 'Jalan Singosari No. 19, Tamanbaru',
        ]);
        
        // make ppl
        \App\Models\Ppl::create([
            'id' => 2301,
            'name' => 'Yusuf Arifandi',
        ]);

        // make pml 
        \App\Models\Pml::create([
            'id' => 230,
            'name' => 'Maulana Huda',
        ]);


        // make kuisioner
        \App\Models\Kuisioner::create([
            'id' => 1,
            'provinsi_id' => 35,
            'kabupaten_id' => 10,
            'kecamatan_id' => 180,
            'desa_id' => 18,
            'sls_id' => 2,
            'keluarga_id' => 1,
            'ppl_id' => 2301,
            'pml_id' => 230,
            'status_pendataan' => '1',
            'tanggal_pendataan' => '2022-05-14',
            'tanggal_pemeriksaan' => '2022-05-17',
            'no_hp' => '081218735550',
            'status' => 'aktif'
        ]);
    }
}
