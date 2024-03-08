<?php namespace Pm\Product\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePmProduct3 extends Migration
{
    public function up()
    {
        Schema::rename('pm_product_product', 'pm_product_');
    }
    
    public function down()
    {
        Schema::rename('pm_product_', 'pm_product_product');
    }
}
