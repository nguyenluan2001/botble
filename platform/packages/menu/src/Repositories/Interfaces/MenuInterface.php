<?php

namespace Platform\Menu\Repositories\Interfaces;

use Platform\Support\Repositories\Interfaces\RepositoryInterface;

interface MenuInterface extends RepositoryInterface
{

    /**
     * @param string $slug
     * @param bool $active
     * @param array $selects
     * @return mixed
     */
    public function findBySlug($slug, $active, array $selects = []);

    /**
     * @param string $name
     * @return mixed
     */
    public function createSlug($name);
}
