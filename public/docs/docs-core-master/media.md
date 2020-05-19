# Change media image sizes

## Option 1: Override media config
Copy `platform/core/media/config/media.php` to `config/media.php` and change the media sizes.

```php
<?php

return [
    ...
    'sizes' => [
        'thumb'    => '150x150',
        'featured' => '560x380',
        'medium'   => '540x360',
    ],
    ...
];

```

## Option 2: Modify it from your theme, media sizes will depend on your theme.
Add to `platform/themes/your-theme/functions/functions.php` or in your plugin service providers.

```php
\RvMedia::addSize('featured', 560, 380);
```

Add many sizes:
```php
\RvMedia::addSize('featured', 560, 380)
    ->addSize(<name>, <width>, <height>)
    ...
```

How to use:

```php
    {{ get_image_url($post->image, 'post-small') }}
    {{ get_object_image($post->image, 'post-small') }}
```

# Custom upload

You can create your custom upload with `RvMedia` facade.

Ex:

```
\RvMedia::handleUpload(request()->input('file'), 0, 'your-folder`);
```

Or

```
rv_media_handle_upload(request()->input('file'), 0, 'your-folder`);
```

# Get image by size

To get image by size, you can use `get_image_url($url, $size = null, $relative_path = false, $default = null)`.

Ex:

```
get_image_url($post->image, 'thumb');
```

If you have registered other size, you can change `thumb` by your size's name.

# Upload file from a path

You can fake a file upload from a path with `UploadedFile` and upload it using `RvMedia::handleUpload()`

Ex:
```php
$folder = \Botble\Media\Models\MediaFolder::create([
    'name' => 'Example',
    'slug' => 'example',
]);
$fileUpload = new \Illuminate\Http\UploadedFile(database_path('files/example.png'), 'example.png', 'image/png', null, true);
$image = \RvMedia::handleUpload($fileUpload, $folder->id);
```