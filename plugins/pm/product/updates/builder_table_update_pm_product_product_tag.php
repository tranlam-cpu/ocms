<?php namespace Pm\Product\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePmProductProductTag extends Migration
{
    public function up()
    {
        Schema::table('pm_product_product_tag', function($table)
        {
            $table->dropPrimary(['product_id','category_tag_id']);
            $table->integer('product_id')->unsigned(false)->change();
            $table->integer('category_tag_id')->unsigned(false)->change();
        });
    }
    
    public function down()
    {
        Schema::table('pm_product_product_tag', function($table)
        {
            $table->integer('product_id')->unsigned()->change();
            $table->integer('category_tag_id')->unsigned()->change();
            $table->primary(['product_id','category_tag_id']);
        });
    }
}
