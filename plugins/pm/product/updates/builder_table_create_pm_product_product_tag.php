<?php namespace Pm\Product\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreatePmProductProductTag extends Migration
{
    public function up()
    {
        Schema::create('pm_product_product_tag', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('product_id')->unsigned();
            $table->integer('category_tag_id')->unsigned();
            $table->primary(['product_id','category_tag_id']);
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('pm_product_product_tag');
    }
}
