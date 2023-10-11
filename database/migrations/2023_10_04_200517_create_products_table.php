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
            $table->unsignedBigInteger('seller_id')->nullable();
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('sub_category_id')->nullable();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('thumbnail');
            $table->string('images');
            $table->float('price')->default(0);
            $table->integer('discount')->default(0);
            $table->integer('stock')->default(0);
            $table->integer('stock_type');
            $table->boolean('sale')->default(false);
            $table->enum('condition',['new','popular','traditional','feature','seasonal'])->defult('new');
            $table->enum('added_by',['admin','seller','farmer'])->default('admin');
            $table->enum('status',['active','inactive'])->default('inactive');
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
