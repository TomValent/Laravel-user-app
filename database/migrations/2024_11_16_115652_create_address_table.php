<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * @return void
     */
    public function up(): void
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->string('street', 64);
            $table->string('city', 32);
            $table->string('zip', 16);
            $table->string('country', 64);
            $table->string('country_code', 2);
            $table->string('email', 32)->nullable()->unique();
            $table->string('phone', 32)->nullable()->unique();
            $table->timestamps();
        });
    }

    /**
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};
