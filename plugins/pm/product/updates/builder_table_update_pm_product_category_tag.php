<?php namespace Pm\Product\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePmProductCategoryTag extends Migration
{
    public function up()
    {
        Schema::table('pm_product_category_tag', function($table)
        {
            $table->string('slug');
        });
    }
    
    public function down()
    {
        Schema::table('pm_product_category_tag', function($table)
        {
            $table->dropColumn('slug');
        });
    }
}
