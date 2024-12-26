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
        Schema::create('incomeGroup', function (Blueprint $table) {
            $table->bigIncrements('incomeGroupID');
            $table->string('groupType');
        });

        Schema::create('beneficiary', function (Blueprint $table) {
            $table->bigIncrements('benID');
            $table->unsignedBigInteger('actorID');
            $table->foreign('actorID')->references('actorID')->on('actor');
            $table->unsignedBigInteger('statusID');
            $table->foreign('statusID')->references('statusID')->on('status');
            $table->unsignedBigInteger('incomeGroupID');
            $table->foreign('incomeGroupID')->references('incomeGroupID')->on('incomeGroup');
        });

        Schema::create('requestBeneficiary', function (Blueprint $table) {
            $table->bigIncrements('reqID');
            $table->unsignedBigInteger('benID');
            $table->foreign('benID')->references('benID')->on('beneficiary');
            $table->integer('numDependents');
            $table->string('incomeDocument')->nullable()->comment("Store the path to the file accordingly");
            $table->string('supportDocument')->nullable()->comment("Store the path to the file accordingly");
            $table->string('asnafCardDocument')->nullable()->comment("Store the path to the file accordingly");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requestBeneficiary');
        Schema::dropIfExists('beneficiary');
        Schema::dropIfExists('incomeGroup');
    }
};
