<?php namespace Pm\Product\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePmProduct2 extends Migration
{
    public function up()
    {
        Schema::table('pm_product_', function($table)
        {
            $table->integer('sold')->nullable()->change();
        });
    }
    
    public function down()
    {
        Schema::table('pm_product_', function($table)
        {
            $table->integer('sold')->nullable(false)->change();
        });
    }
}
