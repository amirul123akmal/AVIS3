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
        Schema::create('login', function (Blueprint $table) {
            $table->bigIncrements('loginID')->primaryKey();
            $table->string('username');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('accountType', function (Blueprint $table) {
            $table->bigIncrements('accountID')->primary();
            $table->string('accountType');
        });

        Schema::create('state', function (Blueprint $table) {
            $table->bigIncrements('stateID')->primaryKey();
            $table->string('statename');
        });

        Schema::create('address', function (Blueprint $table) {
            $table->bigIncrements('addressID')->primaryKey();
            $table->string('road');
            $table->string('postcode');
            $table->unsignedBigInteger('stateID');
            $table->foreign('stateID')->references('stateID')->on('state');
        });

        Schema::create('actor', function (Blueprint $table) {
            $table->unsignedBigInteger('actorID');
            $table->foreign('actorID')->references('loginID')->on('login');
            $table->string('fullname');
            $table->string('ic');
            $table->string('phoneNumber');
            $table->unsignedBigInteger('addressID');
            $table->foreign('addressID')->references('addressID')->on('address');
            $table->unsignedBigInteger('accountID');
            $table->foreign('accountID')->references('accountID')->on('accountType');
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('login');
        Schema::dropIfExists('state');
        Schema::dropIfExists('address');
        Schema::dropIfExists('actor');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
