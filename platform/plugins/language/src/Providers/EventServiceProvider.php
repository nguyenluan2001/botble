<?php

namespace Platform\Language\Providers;

use Artisan;
use Platform\Base\Events\CreatedContentEvent;
use Platform\Base\Events\DeletedContentEvent;
use Platform\Base\Events\UpdatedContentEvent;
use Platform\Language\Listeners\CreatedContentListener;
use Platform\Language\Listeners\DeletedContentListener;
use Platform\Language\Listeners\ThemeRemoveListener;
use Platform\Language\Listeners\UpdatedContentListener;
use Platform\Theme\Events\ThemeRemoveEvent;
use Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        UpdatedContentEvent::class => [
            UpdatedContentListener::class,
        ],
        CreatedContentEvent::class => [
            CreatedContentListener::class,
        ],
        DeletedContentEvent::class => [
            DeletedContentListener::class,
        ],
        ThemeRemoveEvent::class    => [
            ThemeRemoveListener::class,
        ],
    ];

    public function boot()
    {
        parent::boot();

        if (version_compare(get_cms_version(), '5.12') > 0) {
            Event::listen(['cache:cleared'], function () {
                Artisan::call('route:trans:clear');
            });
        }
    }
}
