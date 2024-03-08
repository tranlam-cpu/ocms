<?php namespace Pm\Product\Models;

use Model;

/**
 * Model
 */
class CategoryDetailRelation extends Model
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
    public $table = 'pm_product_category_details_tag';



    /**
     * @var array Validation rules
     */
    public $rules = [
    ];
}
