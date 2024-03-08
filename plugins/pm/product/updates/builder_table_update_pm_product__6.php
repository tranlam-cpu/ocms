<?php namespace Pm\Product\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePmProduct6 extends Migration
{
    public function up()
    {
        Schema::table('pm_product_', function($table)
        {
            $table->renameColumn('user_id', 'product_user_name_id');
        });
    }
    
    public function down()
    {
        Schema::table('pm_product_', function($table)
        {
            $table->renameColumn('product_user_name_id', 'user_id');
        });
    }
}
