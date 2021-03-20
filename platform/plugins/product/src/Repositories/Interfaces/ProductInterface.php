<?php

namespace Platform\Product\Repositories\Interfaces;

use Platform\Support\Repositories\Interfaces\RepositoryInterface;

interface ProductInterface extends RepositoryInterface
{
   public function getListProducts();
   public function getProductById($id);
}
