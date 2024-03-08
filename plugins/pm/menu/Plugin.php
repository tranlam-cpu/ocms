<?php namespace Pm\Menu;

use System\Classes\PluginBase;
use Pm\Menu\Models\Menu;

class Plugin extends PluginBase
{
    public function registerComponents()
    {
    }

    public function registerListColumnTypes()
    {
        return [
            // A local method, i.e $this->evalUppercaseListColumn()
            'typetext' => [$this, 'evalTypetextListColumn'],
            'activetext' => [$this, 'evalActivetextListColumn'],
            'parentname' => [$this, 'evalParentnameListColumn']
        ];
    }

    public function evalTypetextListColumn($value, $column, $record)
    {
        if($value==0){
            return 'menu left';
        }else{
            return 'menu right';
        }
    }

    public function evalActivetextListColumn($value, $column, $record)
    {
        if($value==0){
            return 'non-Active';
        }else{
            return 'Active';
        }
    }

    public function evalParentnameListColumn($value, $column, $record)
    {
        $parent=Menu::query()->where('id', $value)->firstOrFail();
        return $parent->title;
    }

    public function registerSettings()
    {
    }
}
