<?php namespace Pm\Product\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePmProduct5 extends Migration
{
    public function up()
    {
        Schema::table('pm_product_', function($table)
        {
            $table->integer('user_id');
        });
    }
    
    public function down()
    {
        Schema::table('pm_product_', function($table)
        {
            $table->dropColumn('user_id');
        });
    }
}
