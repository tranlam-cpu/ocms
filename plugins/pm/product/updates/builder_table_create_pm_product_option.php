<?php namespace Pm\Product\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreatePmProductOption extends Migration
{
    public function up()
    {
        Schema::create('pm_product_option', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('description')->nullable();
            $table->integer('quantity');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('pm_product_option');
    }
}
