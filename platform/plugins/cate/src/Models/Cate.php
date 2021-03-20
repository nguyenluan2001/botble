<?php

namespace Platform\Cate\Models;

use Platform\Base\Traits\EnumCastable;
use Platform\Base\Enums\BaseStatusEnum;
use Platform\Base\Models\BaseModel;
use Platform\Product\Models\Product;

class Cate extends BaseModel
{
    use EnumCastable;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'cates';

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'status',
    ];
    protected $with=['products'];
    /**
     * @var array
     */
    protected $casts = [
        'status' => BaseStatusEnum::class,
    ];
    function products()
    {
        return $this->hasMany(Product::class);
    }
}
