<?php namespace Pm\Product\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreatePmProductOptionSize extends Migration
{
    public function up()
    {
        Schema::create('pm_product_option_size', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('option_id');
            $table->integer('size_id');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('pm_product_option_size');
    }
}
