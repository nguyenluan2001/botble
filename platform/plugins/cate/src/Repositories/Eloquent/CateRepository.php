<?php

namespace Platform\Cate\Repositories\Eloquent;

use Platform\Support\Repositories\Eloquent\RepositoriesAbstract;
use Platform\Cate\Repositories\Interfaces\CateInterface;

class CateRepository extends RepositoriesAbstract implements CateInterface
{
    function getListCates()
    {
        return $this->model->all();
    }
    function getListCateTitle()
    {
          $arr=[];    
        $data= $this->model->select(['id','name'])->get();
        foreach($data as $item)
        {
            $arr[$item->id]=$item->name;
        }
        return $arr;
    }
    function getCateById($id)
    {
        return $this->model->find($id);
    }
}
