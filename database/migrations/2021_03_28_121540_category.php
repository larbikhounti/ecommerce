<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Category extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // if category table exist delete it and create new one if else
        // just create it 
        if(Schema::hasTable("category")){
            Schema::dropIfExists('category');
            $this->createCategoryTable();
        }else{
            $this->createCategoryTable(); 
        }
    }
    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //

    }

    public function createCategoryTable()
    {
        Schema::create("category",function (Blueprint $table)
        {
            # code...
            $table->id();
            $table->string("name");
            $table->timestamps();
            
        });
    }
}
