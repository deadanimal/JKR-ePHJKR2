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
