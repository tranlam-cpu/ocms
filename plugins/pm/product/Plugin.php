<?php namespace Pm\Product;

use System\Classes\PluginBase;
use Pm\Product\Models\Category;
use Pm\Product\Models\CategoryDetailRelation;
class Plugin extends PluginBase
{



    public function registerComponents()
    {
        return [
            'Pm\Product\Components\Loadmore' => 'Loadmore'
        ];
    }

    public function registerFormWidgets(){
        return [
            'Pm\Product\FormWidgets\Tagsbox'=>[
                'label'=>'Tagsbox field',
                'code' =>'tagsbox'
            ]
        ];
    }

    public function registerSettings()
    {
    }

    
    

    public function registerListColumnTypes()
    {
        return [
            // A local method, i.e $this->evalUppercaseListColumn()
            'categoryname' => [$this, 'evalTypecategoryNameColumn'],
            'phone' => [$this, 'evalTypePhoneNameColumn'],
            'categorydetailsname' => [$this, 'evalTypecategoryDetailsNameColumn']
        ];
    }


    public function evalTypePhoneNameColumn($value, $column, $record){
        return $record->tel.$record->phone;
    }

    public function evalTypecategoryNameColumn($value, $column, $record)
    {
        $parent=Category::query()->where('id', $value)->firstOrFail();
        return $parent->name;
    }

    public function evalTypecategoryDetailsNameColumn($value, $column, $record)
    {
        $parent=CategoryDetailRelation::query()
        ->join('pm_product_category_tag','pm_product_category_details_tag.category_tag_id','=','pm_product_category_tag.id')
        ->join('pm_product_category_details','pm_product_category_details_tag.category_details_id','=','pm_product_category_details.id')
        ->where('pm_product_category_tag.id','=',$value)
        ->select('pm_product_category_details.name')
        ->get();
        
        $output="";

        foreach( $parent as $value){
            $output.=$value->name . ' / ';
        }

        return substr($output, 0, -2);
    }
    

}
