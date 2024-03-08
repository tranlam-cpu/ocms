<?php namespace Pm\Product\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePmProductCheckout6 extends Migration
{
    public function up()
    {
        Schema::table('pm_product_checkout', function($table)
        {
            $table->dropColumn('quantity');
            $table->dropColumn('money');
            $table->dropColumn('id_product');
            $table->dropColumn('id_seller');
            $table->dropColumn('product_name');
            $table->dropColumn('status');
        });
    }
    
    public function down()
    {
        Schema::table('pm_product_checkout', function($table)
        {
            $table->integer('quantity');
            $table->double('money', 10, 0);
            $table->integer('id_product');
            $table->integer('id_seller');
            $table->string('product_name', 191);
            $table->string('status', 191);
        });
    }
}
