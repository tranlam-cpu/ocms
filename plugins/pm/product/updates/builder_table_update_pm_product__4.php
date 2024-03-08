<?php namespace Pm\Product\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePmProduct4 extends Migration
{
    public function up()
    {
        Schema::table('pm_product_', function($table)
        {
            $table->integer('product_category_details_id');
        });
    }
    
    public function down()
    {
        Schema::table('pm_product_', function($table)
        {
            $table->dropColumn('product_category_details_id');
        });
    }
}
