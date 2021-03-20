<?php

return [
    [
        'name' => 'Products',
        'flag' => 'product.index',
    ],
    [
        'name'        => 'Create',
        'flag'        => 'product.create',
        'parent_flag' => 'product.index',
    ],
    [
        'name'        => 'Edit',
        'flag'        => 'product.edit',
        'parent_flag' => 'product.index',
    ],
    [
        'name'        => 'Delete',
        'flag'        => 'product.destroy',
        'parent_flag' => 'product.index',
    ],
];
