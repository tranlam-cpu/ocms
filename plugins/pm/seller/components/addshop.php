<?php
namespace pm\seller\Components;

use Cms\Classes\ComponentBase;
use Illuminate\Support\Facades\DB;
use pm\Seller\models\Shop;
use pm\Seller\models\Shopslider;
use RainLab\User\Facades\Auth;
use Input;
use Session;

class addshop extends ComponentBase
{
    public $shopBool;
    public $shopseller;
    public $shopslider;

    public function componentDetails()
    {
        return [
            'name' => 'add shop',
            'description' => 'add shop'
        ];
    }

    public function onRun(){
        $shopuserid = Auth::getUser()->id;
        $this->shopseller = Shop::where('userid', $shopuserid)->first();
        if($this->shopseller){
            Session::put('shopid', $this->shopseller->id);
            $this->shopBool = true;
            $this->shopslider = Shopslider::where('shopid',$this->shopseller->id)->get();
        }
        else{
            $this->shopBool = false;
        }
        
    }

    public function onSend(){

        $a= new Shop();
        $a->shopname = Input::get('shopname');
        $a->phone = Input::get('shopphone');
        $a->email = Input::get('shopemail');
        $a->address = Input::get('shopaddress');
        $a->userid = Auth::getUser()->id;
        $a->active = 1;
        $a->save();

        // DB::table('pm_seller_shop')->insert(
        //     [
        //         'shopname' => Input::get('shopname'), 'phone' => Input::get('shopphone'),
        //         'email' => Input::get('shopemail'), 'address' => Input::get('shopaddress'),
        //         'active' => '1', 'userid' => Auth::getUser()->id
        //     ]
        // );
        return redirect('/seller');
        // DB::insert('insert into pm_seller_shop (shopname, phone, email, address, active, userid values ( shop12 ,0123, 123@gmail.com, vinhlongcity, 1, 2)');
    }

}