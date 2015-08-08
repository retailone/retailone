<?php

use Illuminate\Database\Seeder;
use RetailOne\Client;

class ClientSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name'       => 'ASpace CoWorking Solutions',
                'created_at' => Carbon\Carbon::create(),
                'updated_at' => Carbon\Carbon::create()
            ]
        ];

        Client::insert($data);
    }
}
