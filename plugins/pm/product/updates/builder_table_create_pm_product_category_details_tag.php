<?php namespace Pm\Product\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreatePmProductCategoryDetailsTag extends Migration
{
    public function up()
    {
        Schema::create('pm_product_category_details_tag', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->integer('parent_category_details_id');
            $table->integer('parent_category_tag_id');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('pm_product_category_details_tag');
    }
}
