<?php namespace Pm\User\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreatePmUserUser extends Migration
{
    public function up()
    {
        Schema::create('pm_user_user', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->text('name');
            $table->text('username');
            $table->text('password');
            $table->integer('permission');
            $table->text('address')->nullable();
            $table->text('phone')->nullable();
            $table->date('birth')->nullable();
            $table->boolean('gender')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('pm_user_user');
    }
}
