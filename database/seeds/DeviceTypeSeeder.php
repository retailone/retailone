<?php

use Illuminate\Database\Seeder;
use RetailOne\DeviceType;

class DeviceTypeSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'name' => 'Person Counter',
            'created_at' => Carbon\Carbon::create(),
            'updated_at' => Carbon\Carbon::create()
        ];

        DeviceType::create($data);
    }
}
