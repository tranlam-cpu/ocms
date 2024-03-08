<?php
namespace Pm\Product\Components;

use Pm\Product\Models\Product;
use Pm\Product\Models\Productoption;

use Cms\Classes\ComponentBase;
use Input;
class loadmore extends ComponentBase
{
    public $items;


    public function componentDetails()
    {
        return [
            'name' => 'load more',
            'description' => 'load more'
        ];
    }

    public function defineProperties()
    {
        return[
            'pageNumber' => [
                'title'       => 'Page Number',
                'description' => 'Description',
                'type'        => 'string',
                'default'     => '{{ :page }}',
            ],
        ];
        
    }

    public function onRun()
    {
        $this->items = $this->loadItems();
        
        // $a=Product::with('option')->get();
        
    
        
        //  dd($a);
        if ($pageNumberParam = $this->paramName('pageNumber')) {
            $currentPage = $this->property('pageNumber');
            if ($currentPage > ($lastPage = $this->items->lastPage()) && $currentPage > 1 && count($this->items->items())==$this->items->perPage()) {
                return Redirect::to($this->currentPageUrl([$pageNumberParam => $lastPage]));
            }
        }

       
    }

    public function loadItems()
    {
        $items = Product::with('option')->listFrontEnd([
            'page'    => $this->property('pageNumber'),
            'perPage' => 5,
        ]);

        return $items;
    }

  
    public function onLoadMore()
    {

        $pageNumber = Input::get('page') + 1;


        $this->setProperty('pageNumber', $pageNumber);
        $this->onRun();

        if ($pageNumber < $this->items->lastPage()) {
            $more_link = $this->renderPartial('@_morelink.htm', ['pageNumber' => $pageNumber]);
        } else {
            $more_link = 'no product to load'; 
        }

        return [          
            '@#list'            => $this->renderPartial('@_list.htm'),
            '#load-more-button' => $more_link,
        ];
    }

}


?>