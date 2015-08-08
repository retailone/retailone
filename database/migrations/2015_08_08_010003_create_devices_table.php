<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDevicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('devices', function (Blueprint $table) {
            $table->increments('id');
            $table->string('uuid')->unique();
            $table->integer('device_type_id', false, true);
            $table->foreign('device_type_id')->references('id')->on('device_types');
            $table->integer('store_id', false, true);
            $table->foreign('store_id')->references('id')->on('stores');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('devices', function(Blueprint $table) {
            $table->dropForeign('devices_store_id_foreign');
            $table->drop();
        });
    }
}
