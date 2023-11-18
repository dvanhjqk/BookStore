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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('o_fullname');
            $table->string('o_email');
            $table->string('o_phone');
            $table->string('o_address');
            $table->string('o_note')->nullable();
            $table->foreignId('o_user_id');
            $table->foreignId('o_payment_id');
            $table->integer('o_status');
            $table->integer('o_coupon');
            $table->decimal('o_total', 12, 0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
