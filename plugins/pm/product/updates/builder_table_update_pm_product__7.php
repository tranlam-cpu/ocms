<?php namespace Pm\Product\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePmProduct7 extends Migration
{
    public function up()
    {
        Schema::table('pm_product_', function($table)
        {
            $table->renameColumn('product_user_name_id', 'seller_shop_id');
        });
    }
    
    public function down()
    {
        Schema::table('pm_product_', function($table)
        {
            $table->renameColumn('seller_shop_id', 'product_user_name_id');
        });
    }
}
