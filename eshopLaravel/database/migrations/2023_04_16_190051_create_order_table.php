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
            $table->foreignId('user_id');
            $table->foreignId('address_id');
            $table->foreignId('shipping_id');
            $table->foreignId('payment_id');
            $table->string('user_name', 32);
            $table->string('user_surname', 32);
            $table->string('user_email', 32);
            $table->string('user_postalcode', 8);
            $table->string('user_street', 32);
            $table->string('user_city', 32);
            $table->string('user_state', 32);
            $table->string('user_phone', 16);
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
