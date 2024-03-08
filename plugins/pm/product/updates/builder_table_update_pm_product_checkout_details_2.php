<?php namespace Pm\Product\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePmProductCheckoutDetails2 extends Migration
{
    public function up()
    {
        Schema::table('pm_product_checkout_details', function($table)
        {
            $table->integer('id_user');
        });
    }
    
    public function down()
    {
        Schema::table('pm_product_checkout_details', function($table)
        {
            $table->dropColumn('id_user');
        });
    }
}
