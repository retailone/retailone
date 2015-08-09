<?php

namespace RetailOne\Console\Commands;

use Carbon\Carbon;
use DB;
use Illuminate\Console\Command;
use RetailOne\Device;
use RetailOne\Visitor;

class MockVisitors extends Command {
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'retailone:mockvisitors';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Mock dem visitors yeah.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $now = Carbon::parse('yesterday')->startOfDay();

        for ($i = 0; $i < 1000; $i++) {
            DB::table((new Visitor())->getTable())->lockForUpdate()->insert([
                'type'       => rand(0, 1) ? 'out' : 'in',
                'device_id'  => Device::first()->id,
                'created_at' => $now->addHour(),
                'updated_at' => $now
            ]);
        }
    }
}
