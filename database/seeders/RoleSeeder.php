<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'id' => 1,
                'name' => 'admin',
            ],
            [
                'id' => 2,
                'name' => 'manager',
            ],
            [
                'id' => 3,
                'name' => 'user',
            ],
        ];
        Role::insert($roles);
    }
}
