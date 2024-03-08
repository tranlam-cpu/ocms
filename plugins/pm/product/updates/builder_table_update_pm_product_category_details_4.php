<?php namespace Pm\Product\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePmProductCategoryDetails4 extends Migration
{
    public function up()
    {
        Schema::table('pm_product_category_details', function($table)
        {
            $table->string('slug');
        });
    }
    
    public function down()
    {
        Schema::table('pm_product_category_details', function($table)
        {
            $table->dropColumn('slug');
        });
    }
}
