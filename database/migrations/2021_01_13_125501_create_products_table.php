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
          $table->string('title');
          $table->bigInteger('category_id')->unsigned();
          $table->Integer('price');
          $table->string('img')->nullable();
          $table->string('article')->nullable();
          $table->enum('status', ['0', '1'])->default(1);
          $table->string('slug')->unique();
          $table->text('description')->nullable();
          $table->foreign('category_id')->references('id')->on('product_categories');
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
