<?php

use Illuminate\Database\Migrations\Migration;

class CreateVisitorsTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visitors', function ($table) {
            $table->increments('id');
            $table->enum('type', ['in', 'out']);
            $table->integer('device_id', false, true);
            $table->foreign('device_id')->references('id')->on('devices');
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
        Schema::table('visitors', function ($table) {
            $table->dropForeign('visitors_device_id_foreign');
            $table->drop();
        });
    }
}
