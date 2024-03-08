<?php namespace Pm\Product\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePmProductCategoryDetails2 extends Migration
{
    public function up()
    {
        Schema::table('pm_product_category_details', function($table)
        {
            $table->string('description', 191)->nullable()->change();
        });
    }
    
    public function down()
    {
        Schema::table('pm_product_category_details', function($table)
        {
            $table->string('description', 191)->nullable(false)->change();
        });
    }
}
