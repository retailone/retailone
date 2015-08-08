<?php


use Illuminate\Database\Seeder;
use RetailOne\Role;

class RoleSeeder extends Seeder {
    public function run()
    {
        $data = [
            [
                'name'         => 'admin',
                'display_name' => 'admin',
                'description'  => 'Administrators'
            ]
        ];

        Role::insert($data);
    }
}
