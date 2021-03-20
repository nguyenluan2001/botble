<?php

namespace Platform\Product\Repositories\Eloquent;

use Platform\Support\Repositories\Eloquent\RepositoriesAbstract;
use Platform\Product\Repositories\Interfaces\ProductInterface;

class ProductRepository extends RepositoriesAbstract implements ProductInterface
{
    function getListProducts()
    {
        return $this->model->all();
    }
    function getProductById($id)
    {
        return $this->model->find($id);
    }
}
