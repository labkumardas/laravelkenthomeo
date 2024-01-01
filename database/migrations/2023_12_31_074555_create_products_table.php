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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->unsignedBigInteger('subcategory_id'); // Change the foreign key column name
            $table->foreign('subcategory_id')->references('id')->on('subcategories')->onDelete('cascade');
            $table->text('short_description');
            $table->text('long_description');
            $table->text('diseases_curable');
            $table->decimal('mrp', 10, 2);
            $table->decimal('price', 10, 2);
            $table->decimal('discount', 5, 2)->default(0); // Default to 0 if no discount
            $table->string('hsn_code');
            $table->decimal('gst_rate', 5, 2);
            $table->integer('status');
            $table->string('stock');
            $table->string('packing_size');

            $table->unsignedBigInteger('created_by');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
