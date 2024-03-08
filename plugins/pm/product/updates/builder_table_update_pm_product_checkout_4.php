<?php namespace Pm\Product\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePmProductCheckout4 extends Migration
{
    public function up()
    {
        Schema::table('pm_product_checkout', function($table)
        {
            $table->string('product_name')->nullable(false)->unsigned(false)->default(null)->comment(null)->change();
        });
    }
    
    public function down()
    {
        Schema::table('pm_product_checkout', function($table)
        {
            $table->text('product_name')->nullable(false)->unsigned(false)->default(null)->comment(null)->change();
        });
    }
}
