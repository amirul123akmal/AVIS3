<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('driver', function (Blueprint $table) {
            $table->bigIncrements('driverID');
            $table->string('driverName');
            $table->string('driverPhoneNum')->nullable();
        });

        Schema::create('vehicletype', function (Blueprint $table) {
            $table->bigIncrements('vehicleID');
            $table->string('vehicleType');
        });

        Schema::create('transportation', function (Blueprint $table) {
            $table->bigIncrements('transID');
            $table->unsignedBigInteger('vehicleID');
            $table->foreign('vehicleID')->references('vehicleID')->on('vehicletype');
            $table->unsignedBigInteger('driverID')->nullable();
            $table->foreign('driverID')->references('driverID')->on('driver');
            $table->string('vehiclePlateNumber');
            $table->integer('vehicleCapacity');
            $table->string('vehicleDesc');
            $table->unsignedBigInteger('vehicleStatus');
            $table->foreign('vehicleStatus')->references('statusID')->on('status');
            $table->timestamps();
        });

        Schema::create('requesttransport', function (Blueprint $table) {
            $table->bigIncrements('reqID');
            $table->unsignedBigInteger('benID');
            $table->foreign('benID')->references('benID')->on('beneficiary');
            $table->string('addressFrom');
            $table->string('addressTo');
            $table->date('dateReq');
            $table->string('status')->nullable();
            $table->text('notes')->nullable();
            $table->unsignedBigInteger('vehicleID');
            $table->foreign('vehicleID')->references('vehicleID')->on('vehicletype');
            $table->timestamps();
        });

        Schema::create('transportassign', function (Blueprint $table) {
            $table->bigIncrements('transAssignID');
            $table->unsignedBigInteger('reqID');
            $table->foreign('reqID')->references('reqID')->on('requestTransport');
            $table->unsignedBigInteger('transID');
            $table->foreign('transID')->references('transID')->on('transportation');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transportassign');
        Schema::dropIfExists('requesttransport');
        Schema::dropIfExists('transportation');
        Schema::dropIfExists('vehicletype');
        Schema::dropIfExists('driver');
    }
};
