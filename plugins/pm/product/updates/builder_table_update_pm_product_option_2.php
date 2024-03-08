<?php namespace Pm\Product\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePmProductOption2 extends Migration
{
    public function up()
    {
        Schema::table('pm_product_option', function($table)
        {
            $table->renameColumn('product_id', 'product_name_id');
        });
    }
    
    public function down()
    {
        Schema::table('pm_product_option', function($table)
        {
            $table->renameColumn('product_name_id', 'product_id');
        });
    }
}
