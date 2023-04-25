<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('order', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable();
            $table->foreignId('address_id')->nullable();
            $table->foreignId('shipping');
            $table->foreignId('payment');
            $table->string('name', 32);
            $table->string('surname', 32);
            $table->string('email', 32);
            $table->string('psc', 8);
            $table->string('street', 32);
            $table->string('city', 32);
            $table->string('country', 32);
            $table->string('phone', 16);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order');
    }
};
