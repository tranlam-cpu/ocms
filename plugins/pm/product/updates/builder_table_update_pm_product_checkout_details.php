<?php namespace Pm\Product\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePmProductCheckoutDetails extends Migration
{
    public function up()
    {
        Schema::table('pm_product_checkout_details', function($table)
        {
            $table->string('status_payment');
        });
    }
    
    public function down()
    {
        Schema::table('pm_product_checkout_details', function($table)
        {
            $table->dropColumn('status_payment');
        });
    }
}
