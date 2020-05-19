# Upgrade Guide

- [Upgrade To 5.4](#upgrade-5.4)
- [Upgrade To 5.3](#upgrade-5.3)
- [Upgrade To 5.2](#upgrade-5.2)
- [Upgrade To 5.1](#upgrade-5.1)
- [Upgrade To 5.0](#upgrade-5.0)
- [Upgrade To 4.2](#upgrade-4.2)
- [Upgrade To 4.1](#upgrade-4.1)
- [Upgrade To 4.0](#upgrade-4.0)
- [Upgrade To 3.6](#upgrade-3.6)
- [Upgrade To 3.5](#upgrade-3.5)
- [Basic](#basic)

<a name="upgrade-5.4"></a>
## Upgrade to 5.4

- Override folder `app`, `config`, `platform` from the update source code.
- Update `composer.json` then run `composer update` to install vendor packages
- Run `php artisan migrate` to update database.
- Remove folder `public/vendor/core` and run command `php artisan vendor:publish --tag=cms-public --force`

<a name="upgrade-5.3"></a>
## Upgrade to 5.3

- Override folder `app`, `config`, `platform` from the update source code.
- Update `composer.json` then run `composer update` to install vendor packages
- Run `php artisan migrate` to update database.
- Remove folder `public/vendor/core` and run command `php artisan vendor:publish --tag=cms-public --force`


<a name="upgrade-5.2"></a>
## Upgrade to 5.2

- Override folder `app`, `config`, `platform` from the update source code.
- Update `composer.json` then run `composer update` to install vendor packages
- Run `php artisan migrate` to update database.
- Remove folder `public/vendor/core` and run command `php artisan vendor:publish --tag=cms-public --force`

<a name="upgrade-5.1"></a>
## Upgrade to 5.1

- Override folder `app`, `platform` from the update source code.
- Run `composer update` to install vendor packages
- Run `php artisan migrate` to update database.
- Remove folder `public/vendor/core` and run command `php artisan vendor:publish --tag=cms-public --force`

<a name="upgrade-5.0"></a>
## Upgrade to 5.0

- Override folder `app`, `platform` from the update source code.
- Run `composer update` to install vendor packages
- Run `php artisan migrate` to update database.
- Remove folder `public/vendor/core` and run command `php artisan vendor:publish --tag=cms-public --force`

<a name="upgrade-4.2"></a>
## Upgrade to 4.2

- Override folder `app`, `platform` from the update source code.
- Run `composer update` to install vendor packages
- Run `php artisan migrate` to update database.
- Remove folder `public/vendor/core` and run command `php artisan vendor:publish --tag=cms-public --force`
- Remove all function `setModuleName()` in your packages (if you have).

<a name="upgrade-4.1"></a>
## Upgrade to 4.1

- Replace all `config('media.` to `config('core.media.media.`
- Replace all `trans('media::` to `trans('core/media::`
- Replace all `views('media::` to `view('core/media::`
- Replace all `@include('media::` to `@include('core/media::`
- Replace all `@extends('media::` to `@extends('core/media::`

- Change the way to register media sizes if you add your custom image sizes:

Ex:
```php
\RvMedia::addSize('featured', 560, 380);
```

- Run `composer install` to install vendor packages
- Run `php artisan migrate` to update database.
- Remove folder `public/vendor/core` and run command `php artisan vendor:publish --tag=cms-public --force`

<a name="upgrade-4.0"></a>
## Upgrade to 4.0
- Run `composer install` to install vendor packages
- Run `php artisan migrate` to update database.
- Change in `.env`: `FILESYSTEM_DRIVER=public`
- Remove `/storage` from image URL in your database. Ex: change `/storage/uploads/abc.jpg` to `uploads/abc.jpg`
- Update helper functions:
Ex:
```php
// Before
function get_meta_data($object->id, $key, $screen, $single = false, $select = ['meta_value'])

// Now
function get_meta_data($object, $key, $single = false, $select = ['meta_value'])
```

- Add setupModel method into your package forms. Ex: platform/packages/blog/src/Forms/PostForm.php:54
```php
$this->setupModel(new Post);
```

- Change screen's name to model class name in some functions: https://prnt.sc/pqyaiz
+ `Language::registerModule({PACKAGE}_MODULE_SCREEN_NAME);` to `Language::registerModule(\Botble\{Plugin}\Models\{Plugin}::class)`
+ `SeoHelper::registerModule({PACKAGE}_MODULE_SCREEN_NAME);` to `SeoHelper::registerModule(\Botble\{Plugin}\Models\{Plugin}::class)`
+ Change
```php
config([
    'packages.slug.general.supported' => array_merge(config('packages.slug.general.supported'), [{PACKAGE}_MODULE_SCREEN_NAME]),
]);
```
to

```php
SlugHelper::registerModule(\Botble\{Plugin}\Models\{Plugin}::class);
```

- Update your plugin's tables:
+ Change `apply_filters(BASE_FILTER_GET_LIST_DATA, $data, {PACKAGE}_MODULE_SCREEN_NAME)` to `apply_filters(BASE_FILTER_GET_LIST_DATA, $data, $this->repository->getModel())`
+ Change
```php
$this->applyScopes(apply_filters(BASE_FILTER_TABLE_QUERY, $query, $model, {PACKAGE}_MODULE_SCREEN_NAME));
```
to 
```php
$this->applyScopes(apply_filters(BASE_FILTER_TABLE_QUERY, $query, $model));
```

+ Change
```php
apply_filters(BASE_FILTER_TABLE_BUTTONS, $buttons, {PACKAGE}_MODULE_SCREEN_NAME);
```
to
```php
apply_filters(BASE_FILTER_TABLE_BUTTONS, $buttons, Post::class);
```

<a name="upgrade-3.6"></a>
## Upgrade to 3.6
- Override folder `platform` from the update source code.
- Remove folder `public/vendor/core` and run command `php artisan vendor:publish --tag=cms-public --force`
- Run `composer install` to update vendor packages.
- Run `php artisan migrate` to update database.

<a name="upgrade-3.5"></a>
## Upgrade to 3.5
- Override folder `platform` from the update source code.
- Remove folder `public/vendor/core` and run command `php artisan vendor:publish --tag=cms-public --force`
- Run `composer install` to update vendor packages.
- Run `php artisan migrate` to update database.

## Basic

- When you got a new version of Botble Core from Codecanyon. You just need to do below steps to upgrade it.
    * Extract `core.zip` and extract `platform.zip` then override folder `platform`.
    * Run `composer update` to update core.
    * Update assets: `php artisan vendor:publish --tag=public --force`
    * Update database
    ```bash
      php artisan migrate
    ```
    * To make sure all config and cache is clear, please run below commands:
    ```bash
     php artisan config:clear
     php artisan cache:clear
     php artisan route:clear
     php artisan view:clear
    ```
