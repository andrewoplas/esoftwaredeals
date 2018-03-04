<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
               $table->increments('id');
               $table->text('product_name');
               $table->text('description');
               $table->float('sale_price')->default(0);
               $table->float('price')->default(0);
               $table->text('slug');
               $table->text('image');
               $table->integer('category')->unsigned();
               $table->foreign('category')->references('id')->on('categories');
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
