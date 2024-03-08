<?php namespace Pm\seller\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePmSellerShop extends Migration
{
    public function up()
    {
        Schema::table('pm_seller_shop', function($table)
        {
            $table->text('description')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('pm_seller_shop', function($table)
        {
            $table->dropColumn('description');
        });
    }
}
