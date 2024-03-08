<?php namespace Pm\Product\FormWidgets;

use Backend\Classes\FormWidgetBase;
use Pm\Product\Models\CategoryDetailRelation;

use Config;

class Tagsbox extends FormWidgetBase
{
	public function widgetDetails(){
		return [
			'name'=>'form tag',
			'description' => 'Fields add tag'
		];
	}

	public function render(){
		$this->prepareVars();
		return $this->makePartial('widget');
	}

	
	public function onGetID(){
		
		$data=post('id');
		$tag=CategoryDetailRelation::query()
		->join('pm_product_category_tag','pm_product_category_details_tag.category_tag_id','pm_product_category_tag.id')
		->where('category_details_id',$data)->get();
		return $tag;
	}

	public function prepareVars(){
		
		$this->vars['id']=$this->onGetID();
		$this->vars['firsttag']=CategoryDetailRelation::query()
		->join('pm_product_category_tag','pm_product_category_details_tag.category_tag_id','pm_product_category_tag.id')
		->where('category_details_id',1)->get();
		$this->vars['name'] = $this->formField->getName().'[]';
		if(!empty($this->getLoadValue())){
			$this->vars['selectedValues']=$this->getLoadValue();
		}else{
			$this->vars['selectedValues']=[];
		}
		
	}

	public function loadAssets(){
		$this->addCss('css/select2.css');
		$this->addJs('js/select2.js');
	}
}