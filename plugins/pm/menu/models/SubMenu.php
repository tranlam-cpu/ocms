<?php namespace Pm\Menu\Models;

use Model;

/**
 * Model
 */
class SubMenu extends Model
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
    public $table = 'pm_menu_submenu';


    /* Relation */
    public $belongsTo=[
        'ParentName'=>[
            'Pm\Menu\Models\Menu',
            'table' => 'pm_menu_submenu',
            'order' => 'title'
        ]
    ];


    /**
     * @var array Validation rules
     */
    public $rules = [
    ];
}
