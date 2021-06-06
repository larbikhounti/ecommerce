<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Itemstable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
      
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->string("descreption");
            $table->string("slug");
            $table->string("gender");
            $table->double("price");
            $table->unsignedInteger("quantity");
            $table->string("picture");
            $table->timestamps();
        });

        Schema::create('color_item', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('item_id');
            $table->unsignedBigInteger('color_id');
            $table->timestamps();
            $table->index(['item_id','color_id']);
            $table->foreign('color_id')->references('id')->on('colors')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('item_id')->references('id')->on('items')->cascadeOnDelete()->cascadeOnUpdate();
            
        });

        Schema::create('category_item', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('item_id');
            $table->unsignedBigInteger('category_id');
            $table->timestamps();
            $table->index(['item_id','category_id']);
            $table->foreign('category_id')->references('id')->on('category')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('item_id')->references('id')->on('items')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('item_color');
        Schema::dropIfExists('category_item');
        Schema::dropIfExists('category');
        Schema::dropIfExists('colors');
        Schema::dropIfExists('items');
        
       
       
        
       
    }
}
