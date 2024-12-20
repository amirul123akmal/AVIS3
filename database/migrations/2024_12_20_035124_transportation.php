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
            $table->bigIncrements('driverID')->primary();
            $table->string('driverName');
            $table->string('driverPhoneNum')->nullable();
        });

        Schema::create('vehicleType', function (Blueprint $table) {
            $table->bigIncrements('vehicleID')->primary();
            $table->string('vehicleType');
        });

        Schema::create('transportation', function (Blueprint $table) {
            $table->bigIncrements('transID')->primary();
            $table->unsignedBigInteger('vehicleID');
            $table->foreign('vehicleID')->references('vehicleID')->on('vehicleType');
            $table->unsignedBigInteger('driverID');
            $table->foreign('driverID')->references('driverID')->on('driver');
            $table->string('vehiclePlateNumber');
            $table->integer('vehicleCapacity');
            $table->string('vehicleDesc');
            $table->unsignedBigInteger('vehicleStatus');
            $table->foreign('vehicleStatus')->references('statusID')->on('status');
        });

        Schema::create('requestTransport', function (Blueprint $table) {
            $table->bigIncrements('reqID')->primary();
            $table->unsignedBigInteger('benID');
            $table->foreign('benID')->references('benID')->on('beneficiary');
            $table->string('addressFrom');
            $table->string('addressTo');
            $table->date('dateReq');
            $table->unsignedBigInteger('vehicleID');
            $table->foreign('vehicleID')->references('vehicleID')->on('vehicleType');
        });

        Schema::create('transportAssign', function (Blueprint $table) {
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
        Schema::dropIfExists('driver');
        Schema::dropIfExists('vehicleType');
        Schema::dropIfExists('transportation');
        Schema::dropIfExists('requestTransport');
        Schema::dropIfExists('transportAssign');
    }
};