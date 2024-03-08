<?php namespace Pm\Product\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePmProductOptionColor extends Migration
{
    public function up()
    {
        Schema::table('pm_product_option_color', function($table)
        {
            $table->integer('product_option_id');
            $table->integer('product_color_id');
            $table->dropColumn('option_id');
            $table->dropColumn('color_id');
        });
    }
    
    public function down()
    {
        Schema::table('pm_product_option_color', function($table)
        {
            $table->dropColumn('product_option_id');
            $table->dropColumn('product_color_id');
            $table->integer('option_id');
            $table->integer('color_id');
        });
    }
}
