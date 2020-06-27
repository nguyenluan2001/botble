<?php

namespace Platform\Menu\Repositories\Eloquent;

use Platform\Base\Enums\BaseStatusEnum;
use Platform\Menu\Repositories\Interfaces\MenuInterface;
use Platform\Support\Repositories\Eloquent\RepositoriesAbstract;
use Illuminate\Support\Str;

class MenuRepository extends RepositoriesAbstract implements MenuInterface
{
    /**
     * {@inheritDoc}
     */
    public function findBySlug($slug, $active, array $selects = [])
    {
        $data = $this->model->where('menus.slug', $slug);
        if ($active) {
            $data = $data->where('menus.status', BaseStatusEnum::PUBLISHED)->select($selects);
        }
        $data = $this->applyBeforeExecuteQuery($data, true)->first();

        $this->resetModel();

        return $data;
    }

    /**
     * {@inheritDoc}
     */
    public function createSlug($name)
    {
        $slug = Str::slug($name);
        $index = 1;
        $baseSlug = $slug;
        while ($this->model->where('menus.slug', $slug)->count() > 0) {
            $slug = $baseSlug . '-' . $index++;
        }

        if (empty($slug)) {
            $slug = time();
        }

        $this->resetModel();

        return $slug;
    }
}
