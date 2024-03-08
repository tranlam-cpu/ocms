<?php namespace Pm\Product\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePmProductOption extends Migration
{
    public function up()
    {
        Schema::table('pm_product_option', function($table)
        {
            $table->integer('product_id');
        });
    }
    
    public function down()
    {
        Schema::table('pm_product_option', function($table)
        {
            $table->dropColumn('product_id');
        });
    }
}
