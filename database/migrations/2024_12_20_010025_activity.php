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
            $table->bigIncrements('activityID');
            $table->string('activityName');
            $table->string('activityPlace');
            $table->date('dateStart');
            $table->date('dateEnd');    
            $table->time('timeStart');
            $table->time('timeEnd');
            $table->integer('volunteerCount');
            $table->integer('beneficiaryCount');
            $table->string('activityImage');
            $table->string('activityDescription');
            $table->timestamps();
        });

        Schema::create('actoractivity', function (Blueprint $table) {
            $table->bigIncrements('actorActivityID');
            $table->integer('actorID');
            $table->integer('activityID');
        });

        Schema::create('benactivity', function (Blueprint $table) {
            $table->bigIncrements('benActivityID');
            $table->integer('benID');
            $table->integer('activityID');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('benactivity');
        Schema::dropIfExists('actoractivity');
        Schema::dropIfExists('activity');
    }
};
