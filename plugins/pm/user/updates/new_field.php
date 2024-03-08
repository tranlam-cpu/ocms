<?php namespace Pm\user\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class NewField extends Migration
{

    public function up()
    {
        Schema::table('users', function($table)
        {
            $table->string('type_user')->nullable();

        });
    }

    public function down()
    {
        $table->dropDown([
            'type_user'
        ]);
    }

}