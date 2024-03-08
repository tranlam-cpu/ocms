<?php namespace Pm\Menu\Models;

use Model;

/**
 * Model
 */
class Menu extends Model
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
    public $table = 'pm_menu_';


    public $hasMany = [
        'submenu' => ['Pm\Menu\Models\SubMenu','key'=>'id', 'delete' => true]
    ];
    /**
     * @var array Validation rules
     */
    public $rules = [
    ];
}
