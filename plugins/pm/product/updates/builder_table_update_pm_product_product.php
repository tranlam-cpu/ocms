<?php namespace Pm\Product\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePmProductProduct extends Migration
{
    public function up()
    {
        Schema::rename('pm_product_', 'pm_product_product');
    }
    
    public function down()
    {
        Schema::rename('pm_product_product', 'pm_product_');
    }
}
