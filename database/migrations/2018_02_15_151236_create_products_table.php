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
               $table->text('code');
               $table->text('product_name');
               $table->text('description');
               $table->enum('availability', array('Yes', 'No'));
               $table->integer('quantity')->default(0);
               $table->integer('sale_price')->default(0);
               $table->integer('price')->default(0);
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
