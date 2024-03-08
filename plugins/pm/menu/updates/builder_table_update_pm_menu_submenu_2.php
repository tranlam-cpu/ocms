<?php namespace Pm\Menu\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePmMenuSubmenu2 extends Migration
{
    public function up()
    {
        Schema::table('pm_menu_submenu', function($table)
        {
            $table->renameColumn('parent_id', 'parent_name_id');
        });
    }
    
    public function down()
    {
        Schema::table('pm_menu_submenu', function($table)
        {
            $table->renameColumn('parent_name_id', 'parent_id');
        });
    }
}
