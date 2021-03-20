<?php

use Platform\Cate\Repositories\Interfaces\CateInterface;
use Platform\Product\Models\Product;

if(!function_exists('get_list_cates'))
{
    function get_list_cates()
    {
        return app(CateInterface::class)->getListCates();
    }
}
if(!function_exists('get_list_cate_title'))
{
    function get_list_cate_title()
    {
        return app(CateInterface::class)->getListCateTitle();
    }
}
if(!function_exists('get_cate_by_id'))
{
    function get_cate_by_id($id)
    {
        return app(CateInterface::class)->getCateById($id);
    }
}