<?php namespace Pm\seller\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreatePmSellerShopslider extends Migration
{
    public function up()
    {
        Schema::create('pm_seller_shopslider', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->integer('shopid');
            $table->text('title')->nullable();
            $table->text('url')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('pm_seller_shopslider');
    }
}
