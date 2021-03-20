<?php

namespace Platform\Product\Models;

use Platform\Base\Traits\EnumCastable;
use Platform\Base\Enums\BaseStatusEnum;
use Platform\Base\Models\BaseModel;
use Platform\Cate\Models\Cate;

class Product extends BaseModel
{
    use EnumCastable;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'products';

    /**
     * @var array
     */
    protected $fillable = [
       "product_name",
       'product_detail',
       'price',
       'qty',
       'product_img',
       'cate_id',
       'slug'
    ];
    // protected $attributes=[
    //     'slug'=>"abc"
    // ];

    /**
     * @var array
     */
    protected $casts = [
        'status' => BaseStatusEnum::class,
    ];
    function cate()
    {
        return $this->belongsTo(Cate::class);
    }
}
