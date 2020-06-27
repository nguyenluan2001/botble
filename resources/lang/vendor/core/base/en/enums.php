<?php

use Platform\Base\Enums\BaseStatusEnum;

return [
    'statuses' => [
        BaseStatusEnum::DRAFT     => 'Draft',
        BaseStatusEnum::PENDING   => 'Pending',
        BaseStatusEnum::PUBLISHED => 'Published',
    ],
];
