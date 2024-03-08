<?php
namespace pm\seller\Components;

use Cms\Classes\ComponentBase;
use pm\Product\models\Checkout;
use pm\Product\models\Product;
use pm\Product\models\CheckoutDetails;
use pm\Seller\models\shop;
use RainLab\User\Facades\Auth;
use Input;
use Session;
use Mail;

class ordershop extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name' => 'order shop',
            'description' => 'order shop'
        ];
    }

    public $orders;
    public $order_details;
    public $products;

    public function onRun()
    {
        $this->orders = CheckoutDetails::where('id_seller', Session::get('shopid'))->join('pm_product_checkout', 'pm_product_checkout_details.id_checkout', '=', 'pm_product_checkout.id')->groupby('id_checkout')->orderBy('id_checkout','desc')->paginate(5);
        // $this->order = Checkout::join('pm_product_checkout_details','pm_product_checkout.id', '=', 'pm_product_checkout_details.id_checkout')->distinct('id_checkout')->where('id_seller',Session::get('shopid'))->get();
        $this->order_details = CheckoutDetails::where('id_seller', Session::get('shopid'))->get();
        // $arr = array();
        // for($i=0;$i<count($this->orders);$i++){
        //     $arr[$i] = $this->orders[$i]->id_checkout;
        // }
        $this->products = Product::select('id')->where('seller_shop_id', Session::get('shopid'))->get();
    }

    public function onConfirm()
    {
        $a = CheckoutDetails::where('id_seller', Session::get('shopid'))->where('id_checkout', Input::get('id'))->orderBy('id', 'desc')->get();
        if (Input::get('stt') == 0) {
            
            for ($i = 0; $i < count($a); $i++) {
                $a[$i]->status = "Đang Giao Hàng";
                $a[$i]->save();
            }

            $orders = Checkout::where('id', Input::get('id'))->first();
            $seller = Shop::where('id', $a[0]->id_seller)->first();
            $products = Product::select('id')->where('seller_shop_id', Session::get('shopid'))->get();
            $vars = ['orders' => $orders, 'order_details' => $a, 'seller' => $seller, 'products' => $products];

            Mail::send('pm.seller::mail.confirm', $vars, function ($message) {
                $message->to(Input::get('email'));
                $message->subject('ĐƠN HÀNG BẠN ĐẶT ĐÃ ĐƯỢC XÁC NHẬN VÀ CHUẨN BỊ GIAO HÀNG');
            });
        } elseif (Input::get('stt') == 1) {
            for ($i = 0; $i < count($a); $i++) {
                $a[$i]->status = "Đã giao";
                $a[$i]->status_payment = "Đã thanh toán";
                $a[$i]->save();
            }
        }


    }
}