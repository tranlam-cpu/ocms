<?php
namespace pm\seller\Components;

use Cms\Classes\ComponentBase;

use pm\Seller\models\Shopslider;
use Session;
use Input;


class slidershop extends ComponentBase
{
    public $shopslider;

    public function componentDetails()
    {
        return [
            'name' => 'slider shop',
            'description' => 'slider shop'
        ];
    }

    public function onRun()
    {
        if (Session::has('shopid')) {
            $this->shopslider = Shopslider::where('shopid', Session::get('shopid'))->get();
        }
    }

    public function onUpdate()
    {
        $a = Shopslider::where('id', Input::get('id'))->first();
        $a->title = Input::get('slidertitle');
        $a->url = Input::get('sliderurl');
        if(Input::hasFile('img')){
            if($a->image){
                $a->image->delete();
            }
            $a->image = Input::file('img');
        }
        $a->save();
        return redirect('/seller');
    }

    public function onDelete()
    {
        $a = Shopslider::where('id', Input::get('id'))->first();
        if(Input::hasFile('img')){
            if($a->image){
                $a->image->delete();
            }
        }
        $a->delete();
        return redirect('/seller');
    }
    public function onInsert(){
        $a = new Shopslider();
        $a->shopid = Session::get('shopid');
        $a->title = Input::get('title');
        $a->url = Input::get('url');
        $a->image = Input::file('img');
        $a->save();
        return redirect('/seller');
    }

}