<?php

return [
    [
        'name' => 'Cates',
        'flag' => 'cate.index',
    ],
    [
        'name'        => 'Create',
        'flag'        => 'cate.create',
        'parent_flag' => 'cate.index',
    ],
    [
        'name'        => 'Edit',
        'flag'        => 'cate.edit',
        'parent_flag' => 'cate.index',
    ],
    [
        'name'        => 'Delete',
        'flag'        => 'cate.destroy',
        'parent_flag' => 'cate.index',
    ],
];
