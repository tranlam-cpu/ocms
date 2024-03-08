<?php namespace Pm\Product\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreatePmProduct extends Migration
{
    public function up()
    {
        Schema::create('pm_product_', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('name');
            $table->string('description')->nullable();
            $table->bigInteger('price');
            $table->integer('sold');
            $table->integer('active');
            $table->string('slug');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('pm_product_');
    }
}
