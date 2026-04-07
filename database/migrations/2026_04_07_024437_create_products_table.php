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
            $table->string('name');
            $table->decimal('price', 15, 2); // 15 chữ số, 2 số thập phân cho giá VNĐ lớn
            $table->string('image')->nullable();
            $table->text('description')->nullable();
            $table->integer('stock')->default(1);
            $table->enum('product_type', ['pet', 'accessory']);
            $table->enum('status', ['available', 'sold', 'hidden'])->default('available');
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
