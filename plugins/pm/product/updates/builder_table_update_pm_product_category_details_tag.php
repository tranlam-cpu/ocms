<?php namespace Pm\Product\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePmProductCategoryDetailsTag extends Migration
{
    public function up()
    {
        Schema::table('pm_product_category_details_tag', function($table)
        {
            $table->dropColumn('id');
        });
    }
    
    public function down()
    {
        Schema::table('pm_product_category_details_tag', function($table)
        {
            $table->increments('id')->unsigned();
        });
    }
}
