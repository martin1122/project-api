<?php

use Illuminate\Support\Facades\Schema;
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
            $table->string('id')->unique();
            $table->string('area_id')->nullable();
            $table->string('name');
            $table->decimal('latitude', 8, 6);
            $table->decimal('longitude', 9, 6);
            $table->integer('depth_limit');
            $table->integer('storage_size');
            $table->integer('delay_period');
            $table->integer('ar_mode_threshold');
            $table->integer('ar_mode_period');
            $table->dateTime('installed_at');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('devices');
    }
}
