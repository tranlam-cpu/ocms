<?php namespace Pm\Product\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePmProduct8 extends Migration
{
    public function up()
    {
        Schema::table('pm_product_', function($table)
        {
            $table->integer('seller_shop_id')->nullable()->change();
        });
    }
    
    public function down()
    {
        Schema::table('pm_product_', function($table)
        {
            $table->integer('seller_shop_id')->nullable(false)->change();
        });
    }
}
