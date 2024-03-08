<?php namespace Pm\Product\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePmProductCheckout extends Migration
{
    public function up()
    {
        Schema::table('pm_product_checkout', function($table)
        {
            $table->integer('id_seller');
        });
    }
    
    public function down()
    {
        Schema::table('pm_product_checkout', function($table)
        {
            $table->dropColumn('id_seller');
        });
    }
}
