<?php namespace Pm\Product\Models;

use Model;

/**
 * Model
 */
class Product extends Model
{
    use \October\Rain\Database\Traits\Validation;
    

    /**
     * @var string The database table used by the model.
     */
    public $table = 'pm_product_';

    /**
     * @var array Validation rules
     */


     // public function filterFields($fields, $context = null)
     // {
     //    if($fields->price->value){
     //        $fields->price->value=money_format($fields->price->value, 2);
     //    }
        
     // }
    public function getMakePriceAttribute()
    {
        return number_format($this->price/23575,2,'.',',');
    }
    
    public function scopeListFrontEnd($query, $options = []) 
    {
        extract(array_merge([
            'page'    => 1,
            'perPage' => 10,
        ], $options));

        return $query->where('active',1)->paginate($perPage, $page);
    }
    


    public $attachOne = [
        'image' => 'System\Models\File'
    ];

    
    public $belongsTo=[
        'ProductCategoryDetails'=>[
            'Pm\Product\Models\CategoryDetails',
            'table' => 'pm_product_category_details',
            'order' => 'name'
        ],
        'ProductUserName'=>[
            'Pm\Seller\Models\Shop',
            'key'=>'seller_shop_id',
            'table' => 'pm_seller_shop',
            'order' => 'shopname'
        ],
    ];

    public $hasOne = [
        'option' => [
            Productoption::class,
            'key' => 'product_name_id'
        ]
    ];
    // validate
    // public function beforeValidate()
    // {   
    //     if ($this->name == 'value') {
    //         $this->field = 'DEFAULT_VALUE';
    //         throw new \October\Rain\Exception\ValidationException(['field' => 'Invalid Value']);
    //     }   
    // }

    public $belongsToMany=[
        'tagsbox'=>[
            'Pm\Product\Models\CategoryTag',
            'table'=>'pm_product_product_tag',
            'order' => 'name'
        ]
    ];
    public $rules = [
    ];
}
