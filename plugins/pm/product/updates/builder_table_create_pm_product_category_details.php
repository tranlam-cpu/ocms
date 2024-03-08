<?php namespace Pm\Product\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreatePmProductCategoryDetails extends Migration
{
    public function up()
    {
        Schema::create('pm_product_category_details', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('name');
            $table->string('description');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('pm_product_category_details');
    }
}
