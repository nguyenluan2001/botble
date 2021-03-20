<?php

namespace Platform\Product\Forms;

use Platform\Base\Forms\FormAbstract;
use Platform\Base\Enums\BaseStatusEnum;
use Platform\Product\Http\Requests\ProductRequest;
use Platform\Product\Models\Product;

class ProductForm extends FormAbstract
{

    /**
     * {@inheritDoc}
     */
    public function buildForm()
    {
        $this
            ->setupModel(new Product)
            ->setValidatorClass(ProductRequest::class)
            ->withCustomFields()
            ->add('product_name', 'text', [
                'label'      => "Product name",
                'label_attr' => ['class' => 'control-label required'],
                'attr'       => [
                    'placeholder'  => trans('core/base::forms.name_placeholder'),
                    'data-counter' => 120,
                ],
            ])
            ->add('product_detail', 'editor', [
                'label'      => "Product detail",
                'label_attr' => ['class' => 'control-label required'],
                'attr'       => [
                    'rows'            => 4,
                    'placeholder'     => trans('core/base::forms.description_placeholder'),
                    'with-short-code' => true,
                ],
                'choices'    => BaseStatusEnum::labels(),
            ])
             ->add('price', 'text', [
                'label'      => "Price",
                'label_attr' => ['class' => 'control-label required'],
                'attr'       => [
                    'placeholder'  => trans('core/base::forms.name_placeholder'),
                    'data-counter' => 120,
                ],
            ])
             ->add('qty', 'text', [
                'label'      => "Quantity",
                'label_attr' => ['class' => 'control-label required'],
                'attr'       => [
                    'placeholder'  => trans('core/base::forms.name_placeholder'),
                    'data-counter' => 120,
                ],
            ])
            ->add('product_img', 'mediaImage', [
                'label'      => "Product image",
                'label_attr' => ['class' => 'control-label'],
            ])
            ->add('cate_id', 'select', [
                'label'      => trans('plugins/blog::posts.form.categories'),
                'label_attr' => ['class' => 'control-label required'],
                'choices'    =>get_list_cate_title() ,
                'value'      => old('cate_id',[1,2]),
                // "selected"=>1,
            ])
            ->setBreakFieldPoint('status');
    }
}
