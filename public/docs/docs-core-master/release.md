# Changelog

- [Botble Core 5.4](#version_5_4)
- [Botble Core 5.3](#version_5_3)
- [Botble Core 5.2](#version_5_2)
- [Botble Core 5.1](#version_5_1)
- [Botble Core 5.0](#version_5_0)
- [Botble Core 4.2](#version_4_2)
- [Botble Core 4.1](#version_4_1)
- [Botble Core 4.0](#version_4_0)
- [Botble 3.6.1](#version_3_6_1)
- [Botble Core 3.6](#version_3_6)
- [Botble Core 3.5](#version_3_5)
- [Botble Core 3.4](#version_3_4)

<a name="version_5_4"></a>
## Botble 5.4
### 01-05-2020
- Refactor code & optimize performance.
- Fix image's watermark.
- Change default avatar, remove Gravatar as default avatar.
- Remove package `davejamesmiller/laravel-breadcrumbs`, build own breadcrumbs.

<a name="version_5_3"></a>
## Botble 5.3
### 29-03-2020
- Update to the latest Laravel version 7.3
- Improve source code.
- Update UI.
- Refactor code.

<a name="version_5_2"></a>
## Botble 5.2
### 12-03-2020
- Upgrade to Laravel 7.x
- Improve source code.
- Add package `js-validation`
- Fix context menu in media.
- Fix bug when changing admin's password.
- Update translations.
- Update UI.
- Refactor code.

<a name="version_5_1"></a>
## Botble 5.1
### 08-02-2020
- Update admin theme.
- Improve source code.
- Fix media upload.

<a name="version_5_0"></a>
## Botble 5.0
### 2020-01-20
- Change admin theme to make it more awesome.
- Update ckeditor to allow to add image's caption.
- Fix ACL module.
- Add license.

<a name="version_4_2"></a>
## Botble 4.2
### 06-01-2020

- Fix dev commands.
- Fix error when creating new role.
- Fix sort order in dashboard widgets.
- Update country flags.
- Update latest code from Laravel framework.
- Deprecated function `setModuleName()` in forms.
- Using package `mews/purifier` to prevent XSS attack.
- Refactor code.

<a name="version_4_1"></a>
## Botble 4.1
### 01-12-2019

- Improve media.
- Change to use `laravel/tinker` 2.0
- Fix UI
- Fix mail variables
- Fix cache issue in media.
- Refactor code.

<a name="version_4_0"></a>
## Botble 4.0
### 31-10-2019

- Upgraded to Laravel 6.0. Now this CMS requires PHP >=7.2 (https://laravel.com/docs/6.0#server-requirements)

- Refactor database to improve query performance.
+ **slugs**: renamed column `reference` to `reference_type` and using model class instead of screen name. Ex: `reference_type` is `post` now changed to `Botble\Blog\Models\Post`.
+ **language_meta**: renamed column `lang_meta_content_id` to `reference_id` and `lang_meta_reference` to `reference_type`. Using model class instead of screen name. Ex: `reference_type` is `post` now changed to `Botble\Blog\Models\Post`.
+ **menu_nodes**: renamed column `related_id` to `reference_id` and `type` to `reference_type`.  Using model class instead of screen name. Ex: `reference_type` is `post` now changed to `Botble\Blog\Models\Post`.
+ **meta_boxes**: renamed column `content_id` to `reference_id` and `reference` to `reference`. Using model class instead of screen name. Ex: `reference_type` is `post` now changed to `Botble\Blog\Models\Post`.

- Update meta boxes helpers: Remove screen name in function. (`get_meta_data()`, `get_meta()`, `save_meta_data()`, `delete_meta_data()`)
Ex:
```php
// Before
function get_meta_data($object->id, $key, $screen, $single = false, $select = ['meta_value'])
```

```php
// Now
function get_meta_data($object, $key, $single = false, $select = ['meta_value'])
```

- All forms now require to setup model. Ex: platform/packages/your-package/src/Forms/PostForm.php:54
```php
$this->setupModel(new YourModel());
```

<a name="version_3_6_1"></a>
## Botble 3.6.1
### 10-08-2019

- Fix bug search users.
- Refactor code.
- Improve performance.

<a name="version_3_6"></a>
## Botble Core 3.6
### 20-07-2019

- Add command to regenerate image sizes: `php artisan cms:media:thumnail:generate`.
- Update translations.
- Optimize performance & refactor code.

<a name="version_3_5"></a>
## Botble Core 3.5
### 30-05-2019
- Restructure asset files.
- Fix security issue in upload user's avatar.
- Change binding type for repositories from `singleton` to `bind`.
- Remove `@author` in comment docs.
- Fix dashboard widgets.
- Allow to create user without role.
- Refactor, clean migrations.

<a name="version_3_4"></a>
## Botble Core 3.4
### 28-03-2019
- Upgraded to the latest Laravel version 5.8
- Change folder structure: move folder /core into /platform folder.
- Improve admin UI.
- Made some change on `assets` module.
    + Refactor some methods.
        + `addJavascript` => `addScripts`
        + `removeJavascript` => `removeScripts`
        + `getJavascript` => `getScripts`
        + `addStylesheets` => `addStyles`
        + `removeStylesheets` => `removeStyles`
        + `getStylesheets` => `getStyles`
        + `addStylesheetsDirectly` => `addStylesDirectly`
        + `addJavascriptDirectly` => `addScriptsDirectly`

    + Change some config keys:
        + `javascript` => `scripts`
        + `stylesheets` => `styles`
        
- Change folder to upload to `storage/uploads`, you need to run command `php artisan storage:link` to create symlink.

- Change event to listen when adding admin menu.

Change `\Botble\Base\Events\SessionStarted::class` to `\Illuminate\Routing\Events\RouteMatched::class`

Example:

```php
\Event::listen(\Illuminate\Routing\Events\RouteMatched::class, function () {
    dashboard_menu()->registerItem([
        'id' => 'your-unique-id', // key of menu, it should unique
        'priority' => 5,
        'parent_id' => null,
        'name' => __('Your menu name'), // menu name, if you don't need translation, you can use the name in plain text
        'icon' => 'fa fa-camera',
        'url' => 'your-menu-url',
        'permissions' => ['permission to access this menu'], // permission should same with route name and it's stored in `permissions` table.
    ]);
});
```

## 3.3 (2018-08-26)

- First release

