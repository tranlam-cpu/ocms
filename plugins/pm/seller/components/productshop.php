<?php
namespace pm\seller\Components;

use Cms\Classes\ComponentBase;
use Pm\Product\Models\Product;
use Pm\Product\Models\CategoryDetails;
use Pm\Product\Models\ProductOption;
use Vojtasvoboda\Reviews\Models\Category;
use session;
use Input;

class productshop extends ComponentBase
{
    public $products;
    public $productOption;
    public $categoryDetails;

    public function componentDetails()
    {
        return [
            'name' => 'product shop',
            'description' => 'product shop'
        ];
    }

    public function onRun()
    {
        $this->products = Product::where('seller_shop_id', Session::get('shopid'))->get();
        $this->categoryDetails = CategoryDetails::get();
        $this->productOption = ProductOption::get();
    }

    public function onInsert()
    {
        $a = new Product();
        $a->name = Input::get('name');
        $a->slug = Input::get('name');
        $a->description = Input::get('description');
        $a->price = Input::get('price');
        if (Input::get('active') == 'on') {
            $a->active = 1;
        } else {
            $a->active = 0;
        }
        $a->image = Input::file('img');
        $a->product_category_details_id = input::get('categorydetailid');
        $a->seller_shop_id = Session::get('shopid');
        $a->save();

        $b = new ProductOption();
        $b->quantity = Input::get('quantity');
        $b->product_name_id = $a->id;
        $b->save();

        $c=new Category();
        $c->name=Input::get('name');
        $c->slug = Input::get('name');
        $c->save();
        return redirect('/seller/product');
    }

    public function onUpdate()
    {
        // dd(Input::get('id'));
        $a = Product::where('id', Input::get('id'))->first();
        $a->name = Input::get('productname');
        $a->slug = Input::get('productname');
        $a->description = Input::get('productdescription');
        $a->price = Input::get('productprice');
        if (Input::get('productactive') == 'on') {
            $a->active = 1;
        } else {
            $a->active = 0;
        }
        if (Input::hasFile('anh1')) {
            if ($a->image) {
                $a->image->delete();
            }
            $a->image = Input::file('anh1');
        }
        $a->product_category_details_id = input::get('categorydetailid');
        $a->seller_shop_id = Session::get('shopid');

        $a->save();

        $b = ProductOption::where('product_name_id', Input::get('id'))->first();
        $b->quantity = Input::get('productquantity');
        $b->save();

        return redirect('/seller/product');
    }

    public function onDelete()
    {
        $a = Product::where('id', Input::get('id'))->first();
        if (Input::hasFile('img')) {
            if ($a->image) {
                $a->image->delete();
            }
        }
        $a->delete();

        $b = ProductOption::where('product_name_id', Input::get('id'))->first();
        if ($b) {
            $b->delete();
        }
        return redirect('/seller/product');
    }

    public function onGalleryUpdate()
    {
        // $a = ProductOption::where('product_name_id', Input::get('id'))->first();
        // return redirect('/seller/order')->with( ['data' => $a] );
        if (Input::hasFile('anhphu')) {
            $a = ProductOption::where('product_name_id', Input::get('id'))->first();
            if ($a->gallery) {
                for ($i = 0; $i < count($a->gallery); $i++) {
                    $a->gallery[$i]->delete();
                }
            }
            $a->gallery = Input::file('anhphu');
            // $a->gallery()->create(['data' => Input::file('anhphu')]);
            $a->save();
            return redirect('/seller/product');
        }
        
    }
}