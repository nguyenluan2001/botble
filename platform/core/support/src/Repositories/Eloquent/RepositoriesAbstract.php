<?php

namespace Platform\Support\Repositories\Eloquent;

use Platform\Support\Repositories\Interfaces\RepositoryInterface;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Arr;

abstract class RepositoriesAbstract implements RepositoryInterface
{
    /**
     * @var Eloquent | Model
     */
    protected $model;

    /**
     * @var Eloquent | Model
     */
    protected $originalModel;

    /**
     * RepositoriesAbstract constructor.
     * @param Model|Eloquent $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
        $this->originalModel = $model;
    }

    /**
     * {@inheritDoc}
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * {@inheritDoc}
     */
    public function setModel($model)
    {
        $this->model = $model;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getTable()
    {
        return $this->model->getTable();
    }

    /**
     * {@inheritDoc}
     */
    public function findById($id, array $with = [])
    {
        $data = $this->make($with)->where('id', $id);
        $data = $this->applyBeforeExecuteQuery($data, true);
        $data = $data->first();

        $this->resetModel();

        return $data;
    }

    /**
     * {@inheritDoc}
     */
    public function make(array $with = [])
    {
        if (!empty($with)) {
            $this->model = $this->model->with($with);
        }

        return $this->model;
    }

    /**
     * {@inheritDoc}
     */
    public function applyBeforeExecuteQuery($data, $isSingle = false)
    {
        if (is_in_admin()) {
            if (!$isSingle) {
                $data = apply_filters(BASE_FILTER_BEFORE_GET_ADMIN_LIST_ITEM, $data, $this->originalModel);
            }
        } elseif (!$isSingle) {
            $data = apply_filters(BASE_FILTER_BEFORE_GET_FRONT_PAGE_ITEM, $data, $this->originalModel);
        } else {
            $data = apply_filters(BASE_FILTER_BEFORE_GET_SINGLE, $data, $this->originalModel);
        }

        $this->resetModel();

        return $data;
    }

    /**
     * {@inheritDoc}
     */
    public function resetModel()
    {
        $this->model = new $this->originalModel;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function findOrFail($id, array $with = [])
    {
        $data = $this->make($with)->where('id', $id);
        $data = $this->applyBeforeExecuteQuery($data, true);
        $result = $data->first();
        $this->resetModel();

        if (!empty($result)) {
            return $result;
        }

        throw (new ModelNotFoundException)->setModel(
            get_class($this->originalModel), $id
        );
    }

    /**
     * {@inheritDoc}
     */
    public function all(array $with = [])
    {
        $data = $this->make($with);

        return $this->applyBeforeExecuteQuery($data)->get();
    }

    /**
     * {@inheritDoc}
     */
    public function pluck($column, $key = null)
    {
        $select = [$column];
        if (!empty($key)) {
            $select = [$column, $key];
        }

        $data = $this->model->select($select);

        return $this->applyBeforeExecuteQuery($data)->pluck($column, $key)->all();
    }

    /**
     * {@inheritDoc}
     */
    public function allBy(array $condition, array $with = [], array $select = ['*'])
    {
        if (!empty($condition)) {
            $this->applyConditions($condition);
        }

        $data = $this->make($with)->select($select);

        return $this->applyBeforeExecuteQuery($data)->get();
    }

    /**
     * @param array $where
     * @param null|Eloquent|Builder $model
     */
    protected function applyConditions(array $where, &$model = null)
    {
        if (!$model) {
            $newModel = $this->model;
        } else {
            $newModel = $model;
        }
        foreach ($where as $field => $value) {
            if (is_array($value)) {
                [$field, $condition, $val] = $value;
                switch (strtoupper($condition)) {
                    case 'IN':
                        $newModel = $newModel->whereIn($field, $val);
                        break;
                    case 'NOT_IN':
                        $newModel = $newModel->whereNotIn($field, $val);
                        break;
                    default:
                        $newModel = $newModel->where($field, $condition, $val);
                        break;
                }
            } else {
                $newModel = $newModel->where($field, '=', $value);
            }
        }
        if (!$model) {
            $this->model = $newModel;
        } else {
            $model = $newModel;
        }
    }

    /**
     * {@inheritDoc}
     */
    public function create(array $data)
    {
        $data = $this->model->create($data);

        $this->resetModel();

        return $data;
    }

    /**
     * {@inheritDoc}
     */
    public function createOrUpdate($data, $condition = [])
    {
        /**
         * @var Model $item
         */
        if (is_array($data)) {
            if (empty($condition)) {
                $item = new $this->model;
            } else {
                $item = $this->getFirstBy($condition);
            }
            if (empty($item)) {
                $item = new $this->model;
            }

            $item = $item->fill($data);
        } elseif ($data instanceof Model) {
            $item = $data;
        } else {
            return false;
        }

        if ($item->save()) {
            $this->resetModel();
            return $item;
        }

        $this->resetModel();

        return false;
    }

    /**
     * {@inheritDoc}
     */
    public function getFirstBy(array $condition = [], array $select = ['*'], array $with = [])
    {
        $this->make($with);

        if (!empty($select)) {
            $data = $this->model->where($condition)->select($select);
        } else {
            $data = $this->model->where($condition);
        }

        return $this->applyBeforeExecuteQuery($data, true)->first();
    }

    /**
     * {@inheritDoc}
     */
    public function delete(Model $model)
    {
        return $model->delete();
    }

    /**
     * {@inheritDoc}
     */
    public function firstOrCreate(array $data, array $with = [])
    {
        $data = $this->model->firstOrCreate($data, $with);

        $this->resetModel();

        return $data;
    }

    /**
     * {@inheritDoc}
     */
    public function update(array $condition, array $data)
    {
        $data = $this->model->where($condition)->update($data);

        $this->resetModel();

        return $data;
    }

    /**
     * {@inheritDoc}
     */
    public function select(array $select = ['*'], array $condition = [])
    {
        $data = $this->model->where($condition)->select($select);

        return $this->applyBeforeExecuteQuery($data);
    }

    /**
     * {@inheritDoc}
     */
    public function deleteBy(array $condition = [])
    {
        $this->applyConditions($condition);

        $data = $this->model->get();

        if (empty($data)) {
            return false;
        }
        foreach ($data as $item) {
            $item->delete();
        }

        $this->resetModel();

        return true;
    }

    /**
     * {@inheritDoc}
     */
    public function count(array $condition = [])
    {
        $this->applyConditions($condition);
        $data = $this->model->count();

        $this->resetModel();

        return $data;
    }

    /**
     * {@inheritDoc}
     */
    public function getByWhereIn($column, array $value = [], array $args = [])
    {
        $data = $this->model->whereIn($column, $value);

        if (!empty(Arr::get($args, 'where'))) {
            $this->applyConditions($args['where']);
        }

        $data = $this->applyBeforeExecuteQuery($data);

        if (!empty(Arr::get($args, 'paginate'))) {
            return $data->paginate((int)$args['paginate']);
        } elseif (!empty(Arr::get($args, 'limit'))) {
            return $data->limit((int)$args['limit']);
        }

        return $data->get();
    }

    /**
     * {@inheritDoc}
     */
    public function advancedGet(array $params = [])
    {
        $params = array_merge([
            'condition' => [],
            'order_by'  => [],
            'take'      => null,
            'paginate'  => [
                'per_page'      => null,
                'current_paged' => 1,
            ],
            'select'    => ['*'],
            'with'      => [],
        ], $params);

        $this->applyConditions($params['condition']);

        $data = $this->model;

        if ($params['select']) {
            $data = $data->select($params['select']);
        }

        foreach ($params['order_by'] as $column => $direction) {
            if (!in_array(strtolower($direction), ['asc', 'desc'])) {
                continue;
            }

            if ($direction !== null) {
                $data = $data->orderBy($column, $direction);
            }
        }

        foreach ($params['with'] as $with) {
            $data = $data->with($with);
        }

        if (!empty($params['withCount'])) {
            $data = $data->withCount($params['withCount']);
        }

        if ($params['take'] == 1) {
            $result = $this->applyBeforeExecuteQuery($data, true)->first();
        } elseif ($params['take']) {
            $result = $this->applyBeforeExecuteQuery($data)->take((int)$params['take'])->get();
        } elseif ($params['paginate']['per_page']) {
            $paginateType = 'paginate';
            if (Arr::get($params, 'paginate.type') && method_exists($data, Arr::get($params, 'paginate.type'))) {
                $paginateType = Arr::get($params, 'paginate.type');
            }
            $result = $this->applyBeforeExecuteQuery($data)
                ->$paginateType(
                    (int)Arr::get($params, 'paginate.per_page', 10),
                    [$this->originalModel->getTable() . '.' . $this->originalModel->getKeyName()],
                    'page',
                    (int)Arr::get($params, 'paginate.current_paged', 1)
                );
        } else {
            $result = $this->applyBeforeExecuteQuery($data)->get();
        }

        return $result;
    }

    /**
     * {@inheritDoc}
     */
    public function forceDelete(array $condition = [])
    {
        $item = $this->model->where($condition)->withTrashed()->first();
        if (!empty($item)) {
            $item->forceDelete();
        }
    }

    /**
     * {@inheritDoc}
     */
    public function restoreBy(array $condition = [])
    {
        $item = $this->model->where($condition)->withTrashed()->first();
        if (!empty($item)) {
            $item->restore();
        }
    }

    /**
     * {@inheritDoc}
     */
    public function getFirstByWithTrash(array $condition = [], array $select = [])
    {
        $query = $this->model->where($condition)->withTrashed();

        if (!empty($select)) {
            return $query->select($select)->first();
        }

        return $this->applyBeforeExecuteQuery($query, true)->first();
    }

    /**
     * {@inheritDoc}
     */
    public function insert(array $data)
    {
        return $this->model->insert($data);
    }

    /**
     * {@inheritDoc}
     */
    public function firstOrNew(array $condition)
    {
        $this->applyConditions($condition);

        $result = $this->model->first() ?: new $this->originalModel;

        $this->resetModel();

        return $result;
    }
}
