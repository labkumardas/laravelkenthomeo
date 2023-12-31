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
        Schema::create('productimages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id'); // Add the product ID column
            $table->string('image'); // Add the image column
            $table->timestamps();

            // Add foreign key constraints
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productimages');
    }
};
