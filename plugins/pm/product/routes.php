<?php
use Pm\Product\Models\Productoption;



Route::post('/api/order', ['as' => 'createOrder', function () {
       
   
    $array = explode('&quot;', Input::get('arr'));
    $array=preg_grep('/cart/i', $array);
    


    if(is_array($array)){
        $arrcart=[];

        foreach($array as $value){

            $cart=Crypt::decryptString(Cookie::get($value));
            $cart=explode('|',$cart);
            array_push($arrcart,json_decode($cart[1]));

            
        }
    }else{
        $arrcart=[];

        $cart=Crypt::decryptString(Cookie::get($array));
        $cart=explode('|',$cart);
        array_push($arrcart,json_decode($cart[1]));

        
    }
    




    $tong=0;
    foreach($arrcart as $key => $value){
        $tong+=$value->total;
     
        $item[$key]=new stdClass;
        $item[$key]->unit_amount=new stdClass;
        $item[$key]->unit_amount->currency_code="USD";
        $item[$key]->unit_amount->value=$value->price;
        $item[$key]->quantity=(int)$value->quantity;
        $item[$key]->name=$value->name;
    }
    
    if($tong==0){
        $tong=1;
    }

   
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://api.sandbox.paypal.com/v1/oauth2/token",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS => "grant_type=client_credentials",
      CURLOPT_USERPWD => "ARtun6JnfxSHa3JZ-1OgFFqiHrReoj0DPeD3SfoMORX5zmkiPcOSeaO6G9ql1Epw27IfalEjq6DBwPNK:EL3c1RIE656d5777kGtQWOQ7fwU8vrSUWLktaCPB_zHSiRrwSW9rJW6Z6gi26mqgs9S3hmE0uOzqu4a5",
      CURLOPT_HTTPHEADER => array(
        'accept: application/json',
        'accept-language: en_US',
        'content-type: application/x-www-form-urlencoded'
      ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
      return "cURL Error #:" . $err;
    } else {
    $token = json_decode($response,JSON_UNESCAPED_UNICODE);
    $token=$token['access_token'];


    $curl = curl_init();


    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://api.sandbox.paypal.com/v2/checkout/orders",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS => '{
      "intent": "CAPTURE",
      "purchase_units":[{
        "amount":{
            "value":'.$tong.',
            "currency_code":"USD",
            "breakdown":{
                "item_total":{
                    "currency_code":"USD",
                    "value":'.$tong.'
                }
            }
        },
        "items":'.json_encode($item).'
    }],
      "application_context": {
        "return_url": "",
        "cancel_url": ""
      }
    }',
      CURLOPT_HTTPHEADER => array(
        'accept: application/json',
        'accept-language: en_US',
        'authorization: Bearer '.$token,
        'content-type: application/json'
      ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
      return "cURL Error #:" . $err;
    } else {
      return $response;
    }


    }

}]);

use Pm\Product\Models\Checkout;
use Pm\Product\Models\CheckoutDetails;

Route::post('api/order/{id}',function($id){
   
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://api.sandbox.paypal.com/v1/oauth2/token",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS => "grant_type=client_credentials",
      CURLOPT_USERPWD => "ARtun6JnfxSHa3JZ-1OgFFqiHrReoj0DPeD3SfoMORX5zmkiPcOSeaO6G9ql1Epw27IfalEjq6DBwPNK:EL3c1RIE656d5777kGtQWOQ7fwU8vrSUWLktaCPB_zHSiRrwSW9rJW6Z6gi26mqgs9S3hmE0uOzqu4a5",
      CURLOPT_HTTPHEADER => array(
        'accept: application/json',
        'accept-language: en_US',
        'content-type: application/x-www-form-urlencoded'
      ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
      return "cURL Error #:" . $err;
    } else {
    $token = json_decode($response,JSON_UNESCAPED_UNICODE);
    $token=$token['access_token'];


    $curl = curl_init();


    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://api.sandbox.paypal.com/v2/checkout/orders/".$id,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "GET",
      CURLOPT_HTTPHEADER => array(
        'authorization: Bearer '.$token,
        'content-type: application/json'
      ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
      return "cURL Error #:" . $err;
    } else {


        $array = explode('&quot;', Input::get('arr'));
        $array=preg_grep('/cart/i', $array);

        // $item=json_decode($response,JSON_UNESCAPED_UNICODE);
        // $items=$item['purchase_units'][0]['items'];
        


        if(is_array($array)){
            $arrcart=[];

            foreach($array as $value){

                $cart=Crypt::decryptString(Cookie::get($value));
                $cart=explode('|',$cart);
                array_push($arrcart,json_decode($cart[1]));

                setcookie($value,null, -1,'/');
            
            }


            $ob=new Checkout();
            $ob->name=Input::get('name');
            $ob->email=Input::get('email');
            $ob->address=Input::get('address');
            $ob->tel=Input::get('tel');
            $ob->phone=Input::get('phone');
            $ob->save();

            foreach($arrcart as $value){
                $details=new CheckoutDetails();
                $details->id_checkout=$ob->id;
                $details->quantity=$value->quantity;
                $details->money=$value->price*$value->quantity;
                $details->id_product=$value->id;
                $details->id_seller=$value->seller_shop_id;
                $details->status='chờ xác nhận';
                $details->status_payment='đã thanh toán';
                $details->product_name=$value->name.$value->size.$value->color;
      
                $details->save();

                $total=Productoption::query()->where('product_name_id',$value->id)->first()->quantity;

                $updateQuantity=$total-$value->quantity;
                if($updateQuantity<0){
                  $updateQuantity=0;
                }

                Productoption::query()->where('product_name_id',$value->id)->update([
                  'quantity' => $updateQuantity
                ]);
              }

                

        }else{
            $arrcart=[];

            $cart=Crypt::decryptString(Cookie::get($array));
            $cart=explode('|',$cart);
            array_push($arrcart,json_decode($cart[1]));

           
            setcookie($array,null, -1,'/');

            $ob=new Checkout();
            $ob->name=Input::get('name');
            $ob->email=Input::get('email');
            $ob->address=Input::get('address');
            $ob->tel=Input::get('tel');
            $ob->phone=Input::get('phone');
            $ob->save();


            foreach($arrcart as $value){
                $details=new CheckoutDetails();
                $details->id_checkout=$ob->id;
                $details->quantity=$value->quantity;
                $details->money=$value->price*$value->quantity;
                $details->id_product=$value->id;
                $details->id_seller=$value->seller_shop_id;
                $details->status='chờ xác nhận';
                $details->status_payment='đã thanh toán';
                $details->product_name=$value->name.$value->size.$value->color;
             
                $details->save();

                $total=Productoption::query()->where('product_name_id',$value->id)->first()->quantity;

                $updateQuantity=$total-$value->quantity;
                if($updateQuantity<0){
                  $updateQuantity=0;
                }

                Productoption::query()->where('product_name_id',$value->id)->update([
                  'quantity' => $updateQuantity
                ]);
            }


        }



      return $response;
    }



    }




    
})
?>