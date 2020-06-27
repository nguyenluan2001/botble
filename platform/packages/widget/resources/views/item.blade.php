@foreach ($widget_areas as $item)
    @if (class_exists($item->widget_id, false))
        @php $widget = new $item->widget_id; @endphp
        <li data-id="{{ $widget->getId() }}" data-position="{{ $item->position }}">
            <div class="widget-handle">
                <p class="widget-name">{{ $widget->getConfig()['name'] }} <span class="text-right"><i class="fa fa-caret-down"></i></span></p>
            </div>
            <div class="widget-content">
                <form method="post">
                    <input type="hidden" name="id" value="{{ $widget->getId() }}">
                    {!! $widget->form($item->sidebar_id, $item->position) !!}
                    <div class="widget-control-actions">
                        <div class="float-left">
                            <button class="btn btn-danger widget-control-delete">{{ trans('packages/widget::global.delete') }}</button>
                        </div>
                        <div class="float-right text-right">
                            <button class="btn btn-primary widget_save">{{ trans('core/base::forms.save') }}</button>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </form>
            </div>
        </li>
    @endif
@endforeach
