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
        $table->unsignedBigInteger("category_id");
        $table->string("name");
        $table->text("description");
        $table->text("details");
        $table->double("purchase_price");
        $table->double("sale_price");
        $table->integer('stock');
        $table->string("size")->nullable();
        $table->string("weight")->nullable();
        $table->string("color")->nullable();
        $table->timestamps();
        $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
      
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
    }
}
