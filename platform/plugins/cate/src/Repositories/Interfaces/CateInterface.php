<?php

namespace Platform\Cate\Repositories\Interfaces;

use Platform\Support\Repositories\Interfaces\RepositoryInterface;

interface CateInterface extends RepositoryInterface
{
    public function getListCates();
    public function getListCateTitle();
    public function getCateById($id);
}
