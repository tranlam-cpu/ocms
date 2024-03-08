<?php
namespace pm\seller\Components;

use Cms\Classes\ComponentBase;

use pm\Seller\models\Shop;
use Session;
use Input;


class profileshop extends ComponentBase
{
    public $shopseller;
    public function componentDetails()
    {
        return [
            'name' => 'profile shop',
            'description' => 'profile shop'
        ];
    }
    public function onRun(){
        if(Session::has('shopid')){
            $this->shopseller = Shop::where('id', (Session::get('shopid')))->first();
        }
    }

    public function onUpdate(){
        // DB::table('pm_seller_shop')->where('id', Session::get('shopid'))->update(
        //     [
        //         'shopname' => Input::get('shopname'), 'phone' => Input::get('shopphone'),
        //         'email' => Input::get('shopemail'), 'address' => Input::get('shopaddress'),
        //         'active' => '1',
        //         'image' => Input::file('image')
        //     ]
        // );

        // Shop::where('id' , Session::get('shopid'))->update([
        //     'shopname' => Input::get('shopname'), 'phone' => Input::get('shopphone'),
        //         'email' => Input::get('shopemail'), 'address' => Input::get('shopaddress'),
        //         'active' => '1',
        //         'image' => Input::file('image')
        // ]);
        

        $a=Shop::where('id' , Session::get('shopid'))->first();
        $a->shopname = Input::get('shopname');
        $a->phone = Input::get('shopphone');
        $a->email = Input::get('shopemail');
        $a->address = Input::get('shopaddress');
        $a->description = Input::get('shopdescription');
        
        if(Input::hasFile('gallery')){
            if($a->image){
                $a->image->delete();
            }
            $a->image = Input::file('gallery');
        }

        $a->save();

        return redirect('/seller');
        
        // DB::insert('insert into pm_seller_shop (shopname, phone, email, address, active, userid values ( shop12 ,0123, 123@gmail.com, vinhlongcity, 1, 2)');
    }

}