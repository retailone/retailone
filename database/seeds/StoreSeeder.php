<?php

use Illuminate\Database\Seeder;
use RetailOne\Client;
use RetailOne\Store;

class StoreSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name'       => 'ASpace - Manila',
                'client_id'  => Client::first()->id,
                'created_at' => Carbon\Carbon::create(),
                'updated_at' => Carbon\Carbon::create()
            ]
        ];

        Store::insert($data);
    }
}
