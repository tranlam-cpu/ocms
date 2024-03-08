<?php namespace Pm\Product\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePmProductOptionSize extends Migration
{
    public function up()
    {
        Schema::table('pm_product_option_size', function($table)
        {
            $table->integer('product_option_id');
            $table->integer('product_size_id');
            $table->dropColumn('option_id');
            $table->dropColumn('size_id');
        });
    }
    
    public function down()
    {
        Schema::table('pm_product_option_size', function($table)
        {
            $table->dropColumn('product_option_id');
            $table->dropColumn('product_size_id');
            $table->integer('option_id');
            $table->integer('size_id');
        });
    }
}
