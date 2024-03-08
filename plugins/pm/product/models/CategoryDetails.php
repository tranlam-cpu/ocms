<?php namespace Pm\Product\Models;

use Model;

/**
 * Model
 */
class CategoryDetails extends Model
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
    public $table = 'pm_product_category_details';

    public function scopePopular($query,$type)
    {

        return $query->take($type);
        
    }
    
    /* Relation */
    public $belongsTo=[
        'ParentCategory'=>[
            'Pm\Product\Models\Category',
            'table' => 'pm_product_category',
            'order' => 'name'
        ]
    ];

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    public $attachOne = [
        'image' => 'System\Models\File'
    ];
}
