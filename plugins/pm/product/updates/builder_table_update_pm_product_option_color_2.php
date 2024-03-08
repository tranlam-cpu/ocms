<?php namespace Pm\Product\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePmProductOptionColor2 extends Migration
{
    public function up()
    {
        Schema::table('pm_product_option_color', function($table)
        {
            $table->renameColumn('product_color_id', 'color_id');
        });
    }
    
    public function down()
    {
        Schema::table('pm_product_option_color', function($table)
        {
            $table->renameColumn('color_id', 'product_color_id');
        });
    }
}
