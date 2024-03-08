<?php namespace Pm\Product\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreatePmProductCheckoutDetails extends Migration
{
    public function up()
    {
        Schema::create('pm_product_checkout_details', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->integer('id_checkout');
            $table->integer('id_product');
            $table->integer('id_seller');
            $table->string('product_name');
            $table->integer('quantity');
            $table->double('money', 10, 0);
            $table->string('status');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('pm_product_checkout_details');
    }
}
