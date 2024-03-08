<?php namespace Pm\Menu\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreatePmMenuSubmenu extends Migration
{
    public function up()
    {
        Schema::create('pm_menu_submenu', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('title');
            $table->string('url');
            $table->integer('active');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('pm_menu_submenu');
    }
}
