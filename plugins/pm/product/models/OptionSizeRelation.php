<?php namespace Pm\Product\Models;

use Model;

/**
 * Model
 */
class OptionSizeRelation extends Model
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
    public $table = 'pm_product_option_size';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];
}
