<?php namespace Pm\Menu\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreatePmMenu extends Migration
{
    public function up()
    {
        Schema::create('pm_menu_', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('title');
            $table->string('url');
            $table->integer('type');
            $table->integer('active');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('pm_menu_');
    }
}
