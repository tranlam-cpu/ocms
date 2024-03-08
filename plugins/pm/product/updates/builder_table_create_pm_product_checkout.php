<?php namespace Pm\Product\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreatePmProductCheckout extends Migration
{
    public function up()
    {
        Schema::create('pm_product_checkout', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->string('name');
            $table->string('email');
            $table->string('address');
            $table->string('tel');
            $table->integer('phone');
            $table->integer('quantity');
            $table->double('money', 10, 0);
            $table->integer('id_product');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('pm_product_checkout');
    }
}
