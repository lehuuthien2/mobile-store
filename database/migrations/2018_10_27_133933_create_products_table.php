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
            $table->increments('product_id');
            $table->string('name', 100)->unique();
            $table->integer('price');
            $table->integer('factory_id')->unsigned();
            $table->foreign('factory_id')->references('factory_id')->on('factories');
            $table->longText('body');
            $table->text('color');
            $table->text('description');
            $table->text('picture');
            $table->smallInteger('in_stock');
            $table->string('storage', 255);
            $table->tinyInteger('promotion')->nullable();
            $table->string('slug',100);
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
