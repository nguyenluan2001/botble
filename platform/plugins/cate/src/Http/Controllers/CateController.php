<?php

namespace Platform\Cate\Http\Controllers;

use Platform\Base\Events\BeforeEditContentEvent;
use Platform\Cate\Http\Requests\CateRequest;
use Platform\Cate\Repositories\Interfaces\CateInterface;
use Platform\Base\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Exception;
use Platform\Cate\Tables\CateTable;
use Platform\Base\Events\CreatedContentEvent;
use Platform\Base\Events\DeletedContentEvent;
use Platform\Base\Events\UpdatedContentEvent;
use Platform\Base\Http\Responses\BaseHttpResponse;
use Platform\Cate\Forms\CateForm;
use Platform\Base\Forms\FormBuilder;

class CateController extends BaseController
{
    /**
     * @var CateInterface
     */
    protected $cateRepository;

    /**
     * @param CateInterface $cateRepository
     */
    public function __construct(CateInterface $cateRepository)
    {
        $this->cateRepository = $cateRepository;
    }

    /**
     * @param CateTable $table
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Throwable
     */
    public function index(CateTable $table)
    {
        page_title()->setTitle(trans('plugins/cate::cate.name'));

        return $table->renderTable();
    }

    /**
     * @param FormBuilder $formBuilder
     * @return string
     */
    public function create(FormBuilder $formBuilder)
    {
        page_title()->setTitle(trans('plugins/cate::cate.create'));

        return $formBuilder->create(CateForm::class)->renderForm();
    }

    /**
     * @param CateRequest $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     */
    public function store(CateRequest $request, BaseHttpResponse $response)
    {
        $cate = $this->cateRepository->createOrUpdate($request->input());

        event(new CreatedContentEvent(CATE_MODULE_SCREEN_NAME, $request, $cate));

        return $response
            ->setPreviousUrl(route('cate.index'))
            ->setNextUrl(route('cate.edit', $cate->id))
            ->setMessage(trans('core/base::notices.create_success_message'));
    }

    /**
     * @param $id
     * @param Request $request
     * @param FormBuilder $formBuilder
     * @return string
     */
    public function edit($id, FormBuilder $formBuilder, Request $request)
    {
        $cate = $this->cateRepository->findOrFail($id);

        event(new BeforeEditContentEvent($request, $cate));

        page_title()->setTitle(trans('plugins/cate::cate.edit') . ' "' . $cate->name . '"');

        return $formBuilder->create(CateForm::class, ['model' => $cate])->renderForm();
    }

    /**
     * @param $id
     * @param CateRequest $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     */
    public function update($id, CateRequest $request, BaseHttpResponse $response)
    {
        $cate = $this->cateRepository->findOrFail($id);

        $cate->fill($request->input());

        $this->cateRepository->createOrUpdate($cate);

        event(new UpdatedContentEvent(CATE_MODULE_SCREEN_NAME, $request, $cate));

        return $response
            ->setPreviousUrl(route('cate.index'))
            ->setMessage(trans('core/base::notices.update_success_message'));
    }

    /**
     * @param $id
     * @param Request $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     */
    public function destroy(Request $request, $id, BaseHttpResponse $response)
    {
        try {
            $cate = $this->cateRepository->findOrFail($id);

            $this->cateRepository->delete($cate);

            event(new DeletedContentEvent(CATE_MODULE_SCREEN_NAME, $request, $cate));

            return $response->setMessage(trans('core/base::notices.delete_success_message'));
        } catch (Exception $exception) {
            return $response
                ->setError()
                ->setMessage($exception->getMessage());
        }
    }

    /**
     * @param Request $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     * @throws Exception
     */
    public function deletes(Request $request, BaseHttpResponse $response)
    {
        $ids = $request->input('ids');
        if (empty($ids)) {
            return $response
                ->setError()
                ->setMessage(trans('core/base::notices.no_select'));
        }

        foreach ($ids as $id) {
            $cate = $this->cateRepository->findOrFail($id);
            $this->cateRepository->delete($cate);
            event(new DeletedContentEvent(CATE_MODULE_SCREEN_NAME, $request, $cate));
        }

        return $response->setMessage(trans('core/base::notices.delete_success_message'));
    }
}
