<?php namespace Pm\Product\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreatePmProductOptionColor extends Migration
{
    public function up()
    {
        Schema::create('pm_product_option_color', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('option_id');
            $table->integer('color_id');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('pm_product_option_color');
    }
}
