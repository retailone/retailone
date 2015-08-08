<?php

use Illuminate\Database\Seeder;
use RetailOne\Device;
use RetailOne\DeviceType;
use RetailOne\Store;

class DeviceSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'uuid'           => 'DEVICE_1',
                'device_type_id' => DeviceType::first()->id,
                'store_id'       => Store::first()->id,
                'created_at'     => Carbon\Carbon::create(),
                'updated_at'     => Carbon\Carbon::create()
            ]
        ];

        Device::insert($data);
    }
}
