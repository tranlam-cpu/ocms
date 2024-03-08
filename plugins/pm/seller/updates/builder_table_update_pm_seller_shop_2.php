<?php namespace Pm\seller\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePmSellerShop2 extends Migration
{
    public function up()
    {
        Schema::table('pm_seller_shop', function($table)
        {
            $table->text('slug')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('pm_seller_shop', function($table)
        {
            $table->dropColumn('slug');
        });
    }
}
