<?php

use Platform\Product\Repositories\Interfaces\ProductInterface;

if(!function_exists('get_list_products'))
{
    function get_list_products()
    {
        return app(ProductInterface::class)->getListProducts();
    }
}
if(!function_exists('get_product_by_id'))
{
    function get_product_by_id($id)
    {
        return app(ProductInterface::class)->getProductById($id);
    }
}