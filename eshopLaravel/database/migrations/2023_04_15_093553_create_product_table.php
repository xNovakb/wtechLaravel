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
        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->string('name', 16);
            $table->string('description', 256);
            $table->float('price', 8, 2);
            $table->enum('category_id', ['Rifle', 'Mikiny', 'Tričká', 'Šaty', 'Bundy', 'Svetre', 'Sukne', 'Košele', 'Nohavice']);
            $table->enum('brand_id', ['Adidas', 'Nike', 'Puma', 'Tommy Hilfiger', 'Lacoste', 'GAP', 'Guess', 'Gucci', 'Mango', "Bershka"]);
            $table->enum('color_id', ['červená', 'modrá', 'zelená', 'biela', 'čierna', 'žltá', 'ružová', 'sivá', 'oranžová', 'hnedá']);
            $table->enum('size_id', ['XS', 'S', 'M', 'L', 'XL', 'XXL']);
            $table->enum('sex_id', ['muž', 'žena']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product');
    }
};
