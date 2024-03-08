<?php namespace Pm\Product\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePmProductCategoryDetailsTag2 extends Migration
{
    public function up()
    {
        Schema::table('pm_product_category_details_tag', function($table)
        {
            $table->integer('category_details_id');
            $table->integer('category_tag_id');
            $table->dropColumn('parent_category_details_id');
            $table->dropColumn('parent_category_tag_id');
        });
    }
    
    public function down()
    {
        Schema::table('pm_product_category_details_tag', function($table)
        {
            $table->dropColumn('category_details_id');
            $table->dropColumn('category_tag_id');
            $table->integer('parent_category_details_id');
            $table->integer('parent_category_tag_id');
        });
    }
}
