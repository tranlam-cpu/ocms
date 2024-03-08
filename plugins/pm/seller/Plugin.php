<?php namespace Pm\seller;

use System\Classes\PluginBase;
use pm\seller\Controllers\shop as shopController;
use pm\seller\Models\shop as shopModels;

class Plugin extends PluginBase
{
    public function registerComponents()
    {
        return [
            'pm\seller\components\addshop' => 'addshop',
            'pm\seller\components\profileshop' => 'profileshop',
            'pm\seller\components\slidershop' => 'slidershop',
            'pm\seller\components\productshop' => 'productshop',
            'pm\seller\components\ordershop' => 'ordershop'
        ];
    }

    public function registerSettings()
    {
    }
}
