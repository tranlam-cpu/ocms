<?php namespace Pm\Seller\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreatePmSellerShop extends Migration
{
    public function up()
    {
        Schema::create('pm_seller_shop', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->text('shopname');
            $table->text('phone');
            $table->text('email');
            $table->text('address');
            $table->boolean('active');
            $table->integer('userid');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('pm_seller_shop');
    }
}
