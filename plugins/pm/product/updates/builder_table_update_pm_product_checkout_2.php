<?php namespace Pm\Product\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePmProductCheckout2 extends Migration
{
    public function up()
    {
        Schema::table('pm_product_checkout', function($table)
        {
            $table->text('product_name');
        });
    }
    
    public function down()
    {
        Schema::table('pm_product_checkout', function($table)
        {
            $table->dropColumn('product_name');
        });
    }
}
