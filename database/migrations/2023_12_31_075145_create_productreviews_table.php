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
        Schema::create('productreviews', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id'); // Add the product ID column
            $table->string('review');
            $table->string('content');
            $table->unsignedBigInteger('reviewBy');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productreviews');
    }
};
