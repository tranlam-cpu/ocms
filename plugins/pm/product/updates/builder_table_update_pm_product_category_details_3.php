<?php namespace Pm\Product\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePmProductCategoryDetails3 extends Migration
{
    public function up()
    {
        Schema::table('pm_product_category_details', function($table)
        {
            $table->renameColumn('category_id', 'parent_category_id');
        });
    }
    
    public function down()
    {
        Schema::table('pm_product_category_details', function($table)
        {
            $table->renameColumn('parent_category_id', 'category_id');
        });
    }
}
