<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('short_description')->nullable();
            $table->text('description')->nullable();
            $table->decimal('price');
            $table->decimal('discount_price')->nullable();
            $table->string('SKU');
            $table->boolean('alteration')->nullable();
            $table->decimal('alteration_price')->nullable();
            $table->boolean('laundry')->nullable();
            $table->decimal('laundry_price')->nullable();
            $table->string('stock_status');
            $table->boolean('featured')->default(false);
            $table->unsignedInteger('quantity')->default(1);
            $table->string('image')->nullable();
            $table->text('images')->nullable();
            $table->bigInteger('size_id')->unsigned()->nullable();
            $table->bigInteger('brand_id')->unsigned()->nullable();
            $table->bigInteger('category_id')->unsigned()->nullable();
            $table->foreign('size_id')->references('id')->on('sizes')->onDelete('cascade');
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
