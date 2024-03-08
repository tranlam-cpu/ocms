<?php namespace Pm\Product\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePmProductCheckout5 extends Migration
{
    public function up()
    {
        Schema::table('pm_product_checkout', function($table)
        {
            $table->string('status');
        });
    }
    
    public function down()
    {
        Schema::table('pm_product_checkout', function($table)
        {
            $table->dropColumn('status');
        });
    }
}
