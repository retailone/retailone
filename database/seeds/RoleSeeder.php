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
                'description'  => 'Administrators',
                'created_at'   => Carbon\Carbon::create(),
                'updated_at'   => Carbon\Carbon::create()
            ]
        ];

        Role::insert($data);
    }
}
