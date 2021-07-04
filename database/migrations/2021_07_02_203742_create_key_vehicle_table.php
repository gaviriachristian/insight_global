<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKeyVehicleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('key_vehicle', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('key_id');
            $table->unsignedBigInteger('vehicle_id');
            $table->timestamps();

            $table->foreign('key_id')
                ->references('id')->on('keys')
                ->onDelete('cascade');
            
            $table->foreign('vehicle_id')
                ->references('id')->on('vehicles')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('key_vehicle');
    }
}
