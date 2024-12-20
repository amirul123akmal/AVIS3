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
        Schema::create('activity', function (Blueprint $table) {
            $table->bigIncrements('activityID')->primary();
            $table->string('activityName');
            $table->string('activityPlace');
            $table->date('dateStart');
            $table->date('dateEnd');
            $table->integer('volunterCount');
            $table->integer('beneficiaryCount');
        });

        Schema::create('actorActivity', function (Blueprint $table) {
            $table->integer('actorID');
            $table->integer('activityID');
        });

        Schema::create('benActivity', function (Blueprint $table) {
            $table->integer('benID');
            $table->integer('activityID');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('benActivity');
        Schema::dropIfExists('actorActivity');
        Schema::dropIfExists('activity');
    }
};
