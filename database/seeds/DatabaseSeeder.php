<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use RetailOne\Device;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(RoleSeeder::class);
        $this->call(ClientSeeder::class);
        $this->call(StoreSeeder::class);
        $this->call(DeviceTypeSeeder::class);
        $this->call(DeviceSeeder::class);

        Model::reguard();
    }
}
