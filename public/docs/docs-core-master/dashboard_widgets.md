## Dashboard widgets

### Add new dashboard widget

- Open `/app/Providers/AppServiceProvider.php`. Add below code to function `boot`

```php
add_filter(DASHBOARD_FILTER_ADMIN_LIST, [$this, 'registerDashboardWidgets'], 1221, 2);
```

`1221` is the priority, it can be any number but must unique.

- Add function callback to `/app/Providers/AppServiceProvider.php`. Add below code to function `boot`

```php
public function registerDashboardWidgets($widgets, $widget_settings)
{
    $widget = $widget_settings->where('name', 'widget_key_name')->first();
    $widget_setting = $widget ? $widget->settings->first() : null;

    if (!$widget) {
        $widget = $this->app->make(\Botble\Dashboard\Repositories\Interfaces\DashboardWidgetInterface::class)->firstOrCreate(['name' => 'widget_key_name']);
    }

    $widget->title = 'Widget name here';
    $widget->icon = 'fas fa-edit';
    $widget->color = '#3598dc';

    $data = 'string data here';

    $widgets[] = [
        'id' => $widget->id,
        'view' => view('widgets.sample', compact('data', 'widget_setting'))->render(),
    ];
    return $widgets;
}
```

- Create view to display data: `resources/views/widgets/sample.blade.php`

```php
@if (empty($widget_setting) || $widget_setting->status == 1)
    This is widget content. Data: {{ $data }}
@endif
```

- Example view for counter data.

```php
@if (empty($widget_setting) || $widget_setting->status == 1)
    <div class="col-lg-3 col-md-3 col-sm-6 col-12">
        <a class="dashboard-stat dashboard-stat-v2 blue" href="/">
            <div class="visual">
                <i class="fa fa-cogs"></i>
            </div>
            <div class="details">
                <div class="number">
                    <span data-counter="counterup" data-value="10">0</span>
                </div>
                <div class="desc"> Counter name </div>
            </div>
        </a>
    </div>
@endif
```
