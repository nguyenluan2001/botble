<?php

namespace Platform\Product\Tables;

use Auth;
use BaseHelper;
use Platform\Base\Enums\BaseStatusEnum;
use Platform\Product\Repositories\Interfaces\ProductInterface;
use Platform\Table\Abstracts\TableAbstract;
use Illuminate\Contracts\Routing\UrlGenerator;
use Yajra\DataTables\DataTables;
use Platform\Product\Models\Product;
use Html;

class ProductTable extends TableAbstract
{

    /**
     * @var bool
     */
    protected $hasActions = true;

    /**
     * @var bool
     */
    protected $hasFilter = true;

    /**
     * ProductTable constructor.
     * @param DataTables $table
     * @param UrlGenerator $urlGenerator
     * @param ProductInterface $productRepository
     */
    public function __construct(DataTables $table, UrlGenerator $urlGenerator, ProductInterface $productRepository)
    {
        $this->repository = $productRepository;
        $this->setOption('id', 'plugins-product-table');
        parent::__construct($table, $urlGenerator);

        if (!Auth::user()->hasAnyPermission(['product.edit', 'product.destroy'])) {
            $this->hasOperations = false;
            $this->hasActions = false;
        }
    }

    /**
     * {@inheritDoc}
     */
    public function ajax()
    {
        $data = $this->table
            ->eloquent($this->query())
            ->editColumn('name', function ($item) {
                if (!Auth::user()->hasPermission('product.edit')) {
                    return $item->name;
                }
                return Html::link(route('product.edit', $item->id), $item->name);
            })
            ->editColumn('checkbox', function ($item) {
                return $this->getCheckbox($item->id);
            })
            ->editColumn('created_at', function ($item) {
                return BaseHelper::formatDate($item->created_at);
            })
            ->editColumn('status', function ($item) {
                return $item->status->toHtml();
            });

        return apply_filters(BASE_FILTER_GET_LIST_DATA, $data, $this->repository->getModel())
            ->addColumn('operations', function ($item) {
                return $this->getOperations('product.edit', 'product.destroy', $item);
            })
            ->escapeColumns([])
            ->make(true);
    }

    /**
     * {@inheritDoc}
     */
    public function query()
    {
        $model = $this->repository->getModel();
        $select = [
            'products.id',
            'products.product_name',
            'products.slug',
            'products.product_img',
            'products.product_detail',
            'products.price',
            'products.qty',
            'products.cate_id',
            'products.purchase',

           
        ];

        $query = $model
        ->with([
            'cate' => function ($query) {
                $query->select(['cates.id', 'cates.name']);
            },
           
        ])
        ->select($select);

        return $this->applyScopes(apply_filters(BASE_FILTER_TABLE_QUERY, $query, $model, $select));
    }

    /**
     * {@inheritDoc}
     */
    public function columns()
    {
        return [
            'id' => [
                'name'  => 'products.id',
                'title' => trans('core/base::tables.id'),
                'width' => '20px',
            ],
            'product_name' => [
                'name'  => 'products.product_name',
                'title' => "Product name",
                'width' => '20px',
            ],
            'product_detail' => [
                'name'  => 'products.product_detail',
                'title' => "Product detail",
                'width' => '20px',
            ],
            'price' => [
                'name'  => 'products.price',
                'title' => "Price",
                'width' => '20px',
            ],
            'qty' => [
                'name'  => 'products.qty',
                'title' => "Quantity",
                'width' => '20px',
            ],
            'purchase' => [
                'name'  => 'products.purchase',
                'title' => "Purchase",
                'width' => '20px',
            ],
            'cate_id' => [
                'name'  => 'products.cate_id',
                'title' => "Category",
                'width' => '20px',
            ],
          
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function buttons()
    {
        $buttons = $this->addCreateButton(route('product.create'), 'product.create');

        return apply_filters(BASE_FILTER_TABLE_BUTTONS, $buttons, Product::class);
    }

    /**
     * {@inheritDoc}
     */
    public function bulkActions(): array
    {
        return $this->addDeleteAction(route('product.deletes'), 'product.destroy', parent::bulkActions());
    }

    /**
     * {@inheritDoc}
     */
    public function getBulkChanges(): array
    {
        return [
            'products.name' => [
                'title'    => trans('core/base::tables.name'),
                'type'     => 'text',
                'validate' => 'required|max:120',
            ],
            'products.status' => [
                'title'    => trans('core/base::tables.status'),
                'type'     => 'select',
                'choices'  => BaseStatusEnum::labels(),
                'validate' => 'required|in:' . implode(',', BaseStatusEnum::values()),
            ],
            'products.created_at' => [
                'title' => trans('core/base::tables.created_at'),
                'type'  => 'date',
            ],
        ];
    }

    /**
     * @return array
     */
    public function getFilters(): array
    {
        return $this->getBulkChanges();
    }
}
