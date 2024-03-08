<?php namespace Pm\Menu\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePmMenuSubmenu extends Migration
{
    public function up()
    {
        Schema::table('pm_menu_submenu', function($table)
        {
            $table->integer('parent_id')->unsigned();
        });
    }
    
    public function down()
    {
        Schema::table('pm_menu_submenu', function($table)
        {
            $table->dropColumn('parent_id');
        });
    }
}
