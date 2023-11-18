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
            $table->string('pro_name');
            $table->decimal('pro_price', 12, 0);
            $table->string('image');
            $table->decimal('pro_price_sale', 12, 0)->nullable();
            $table->integer('pro_stock');
            $table->smallInteger('quantity');
            $table->enum('pro_status', ['Còn hàng', 'Hết hàng'])->default('Còn hàng');
            $table->mediumText('pro_description')->nullable();
            $table->foreignId('pro_category_id');
            $table->foreignId('pro_publisher_id');
            $table->foreignId('pro_supplier_id');
            $table->foreignId('pro_author_id');
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
