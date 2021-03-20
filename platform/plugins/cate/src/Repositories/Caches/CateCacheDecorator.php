<?php

namespace Platform\Cate\Repositories\Caches;

use Platform\Support\Repositories\Caches\CacheAbstractDecorator;
use Platform\Cate\Repositories\Interfaces\CateInterface;

class CateCacheDecorator extends CacheAbstractDecorator implements CateInterface
{
    public function getListCates()
    {
        return $this->getDataIfExistCache(__FUNCTION__, func_get_args());
    }
    public function getListCateTitle()
    {
        return $this->getDataIfExistCache(__FUNCTION__, func_get_args());
    }
    public function getCateById($id)
    {
        return $this->getDataIfExistCache(__FUNCTION__, func_get_args());
    }
}
