<?php

namespace Theme\Shop\Http\Controllers;

use Platform\Theme\Http\Controllers\PublicController;
use Theme;
class ShopController extends PublicController
{
    public $theme;
    function __construct()
    {
        $this->theme=Theme::uses('shop')->layout('default');
        $this->theme->asset()->usePath()->add('style', 'css/style.css', array('core-style'));


    }
    function getIndex()
    {
        $cates=get_list_cates();
        // dd($cates);
         Theme::partial('header',["param"=>123]);
        //  dd(get_list_cate_title());
        $products=get_list_products();
        // dd($products);
        return $this->theme->scope('index',['products'=>$products])->render();
    }
    function detailProduct($id)
    {
        $product=get_product_by_id($id);
        return $this->theme->scope('detailProduct',compact('product'))->render();
     }
     function detailCategory($id)
     {
         $cate=get_cate_by_id($id);
         return $this->theme->scope('productByCategory',compact('cate'))->render();
     }
}
