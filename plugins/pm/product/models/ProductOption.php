<?php namespace Pm\Product\Models;

use Model;

/**
 * Model
 */
class ProductOption extends Model
{
    use \October\Rain\Database\Traits\Validation;
    /*
     * Disable timestamps by default.
     * Remove this line if timestamps are defined in the database table.
     */
    public $timestamps = false;


    /**
     * @var string The database table used by the model.
     */
    public $table = 'pm_product_option';


    // public function filterFields($fields, $context = null)
    //  {
    //     $ob=ProductOption::query()
    //     ->join('pm_product_','pm_product_option.product_name_id','pm_product_.id')
    //     ->get();
        
    //     foreach ($ob as $value) {
    //         if($value->product_category_details_id!=1 && $value->product_category_details_id!=2){
    //             $fields->ColorName->hidden=true;
    //             $fields->SizeName->hidden=true;
    //         }
    //     }
        
        
    //  }

    /* Relation */
    public $belongsToMany=[
        'ColorName'=>[
            'Pm\Product\Models\Color',
            'table' => 'pm_product_option_color',
            'order' => 'name'
        ],
        'SizeName'=>[
            'Pm\Product\Models\Size',
            'table'=>'pm_product_option_size',
            'order' => 'name'
        ]
    ];

    public $belongsTo=[
        'ProductName'=>[
            'Pm\Product\Models\Product',
            'table' => 'pm_product_',
            'order' => 'name'
        ]
    ];


    public $attachMany = [
        'gallery' => 'System\Models\File'
    ];
    /**
     * @var array Validation rules
     */
    protected $fillable = [
        'description',
        'quantity',
        'product_name_id'
    ];

    public $rules = [
        'product_name_id'    => 'unique:pm_product_option',
    ];

    public function scopeListFrontEnd($query, $options = []) 
    {
        extract(array_merge([
            'page'    => 1,
            'perPage' => 10,
        ], $options));

        return $query->paginate($perPage, $page);
    }
}
