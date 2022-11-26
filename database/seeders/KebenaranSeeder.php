<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KebenaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create([
            'name' => 'profil',
            'display_name' => 'Profil',
            'description' => 'pengguna boleh klik profil'
        ]);

        Permission::create([
            'name' => 'senaraiPengguna',
            'display_name' => 'Senarai Pengguna',
            'description' => 'pengguna boleh klik senarai Pengguna'
        ]);

        Permission::create([
            'name' => 'laporan',
            'display_name' => 'Laporan',
            'description' => 'pengguna boleh klik Laporan'
        ]);

        Permission::create([
            'name' => 'projek',
            'display_name' => 'Projek',
            'description' => 'pengguna boleh klik Projek'
        ]);

        Permission::create([
            'name' => 'manual',
            'display_name' => 'Manual & Standard',
            'description' => 'pengguna boleh klik Manual & Standard'
        ]);

        Permission::create([
            'name' => 'hebahan',
            'display_name' => 'Hebahan',
            'description' => 'pengguna boleh klik Hebahan'
        ]);

        Permission::create([
            'name' => 'faq',
            'display_name' => 'FAQ',
            'description' => 'pengguna boleh klik FAQ'
        ]);

        Permission::create([
            'name' => 'maklumbalas',
            'display_name' => 'Maklum Balas',
            'description' => 'pengguna boleh klik Maklum Balas'
        ]);

        Permission::create([
            'name' => 'selenggara',
            'display_name' => 'Selenggara',
            'description' => 'pengguna boleh klik Selenggara'
        ]);

        Permission::create([
            'name' => 'cubaan',
            'display_name' => 'cubaan',
            'description' => 'cubaan membuat kebenaran'
        ]);

        Permission::create([
            'name' => 'cubaan2',
            'display_name' => 'cubaan 2',
            'description' => 'cubaan membuat kebenaran 2'
        ]);

        Permission::create([
            'name' => 'cubaan3',
            'display_name' => 'cubaan 3',
            'description' => 'cubaan membuat kebenaran 3'
        ]);
    }
}
