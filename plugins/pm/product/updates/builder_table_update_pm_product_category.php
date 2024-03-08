<?php namespace Pm\Product\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePmProductCategory extends Migration
{
    public function up()
    {
        Schema::table('pm_product_category', function($table)
        {
            $table->string('slug')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('pm_product_category', function($table)
        {
            $table->dropColumn('slug');
        });
    }
}
