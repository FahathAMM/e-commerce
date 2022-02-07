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
            $table->unsignedBigInteger('category_id');
            $table->string('name');
            $table->mediumText('small_description')->nullable();
            $table->text('description')->nullable();
            $table->string('original_price')->nullable();
            $table->string('selling_price')->nullable();
            $table->integer('qty')->nullable();
            $table->string('tex')->nullable();
            $table->integer('status')->default()->nullable();
            $table->integer('trending')->default()->nullable();
            $table->text('slug')->nullable();
            $table->mediumText('meta_title')->nullable();
            $table->mediumText('meta_keyword')->nullable();
            $table->mediumText('meta_description')->nullable();
            $table->string('image')->nullable();
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
