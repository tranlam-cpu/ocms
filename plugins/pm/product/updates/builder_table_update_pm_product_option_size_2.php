<?php namespace Pm\Product\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePmProductOptionSize2 extends Migration
{
    public function up()
    {
        Schema::table('pm_product_option_size', function($table)
        {
            $table->renameColumn('product_size_id', 'size_id');
        });
    }
    
    public function down()
    {
        Schema::table('pm_product_option_size', function($table)
        {
            $table->renameColumn('size_id', 'product_size_id');
        });
    }
}
