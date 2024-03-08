<?php namespace Pm\Product\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePmProductOption3 extends Migration
{
    public function up()
    {
        Schema::table('pm_product_option', function($table)
        {
            $table->string('description', 1000)->change();
        });
    }
    
    public function down()
    {
        Schema::table('pm_product_option', function($table)
        {
            $table->string('description', 191)->change();
        });
    }
}
