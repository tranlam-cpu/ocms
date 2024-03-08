<?php namespace Pm\Product\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreatePmProductCategoryTag extends Migration
{
    public function up()
    {
        Schema::create('pm_product_category_tag', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('name');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('pm_product_category_tag');
    }
}
