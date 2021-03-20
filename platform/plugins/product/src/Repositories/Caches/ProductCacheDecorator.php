<?php

namespace Platform\Product\Repositories\Caches;

use Platform\Support\Repositories\Caches\CacheAbstractDecorator;
use Platform\Product\Repositories\Interfaces\ProductInterface;

class ProductCacheDecorator extends CacheAbstractDecorator implements ProductInterface
{
    public function getListProducts()
    {
        return $this->getDataIfExistCache(__FUNCTION__, func_get_args());
    }
    public function getProductById($id)
    {
        return $this->getDataIfExistCache(__FUNCTION__, func_get_args());
    }
}
