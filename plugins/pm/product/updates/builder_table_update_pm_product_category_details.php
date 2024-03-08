<?php namespace Pm\Product\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePmProductCategoryDetails extends Migration
{
    public function up()
    {
        Schema::table('pm_product_category_details', function($table)
        {
            $table->integer('category_id');
        });
    }
    
    public function down()
    {
        Schema::table('pm_product_category_details', function($table)
        {
            $table->dropColumn('category_id');
        });
    }
}
