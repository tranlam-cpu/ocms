<?php namespace Pm\Product\Models;

use Model;

/**
 * Model
 */
class Checkout extends Model
{
    use \October\Rain\Database\Traits\Validation;
    

    /**
     * @var string The database table used by the model.
     */
    public $table = 'pm_product_checkout';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];
}
