# Configuration

```php
return [
    'default'   => 'vendor/avatar/images/default-avatar.jpg',
    'folder'    => [
        'upload'        => public_path('uploads'),
        'container_dir' => 'avatars',
    ],
    // assets libraries, you can remove if it's existed on your project
    'libraries' => [
        'stylesheets' => [
            '/vendor/avatar/packages/cropper/cropper.min.css',
            '/vendor/avatar/packages/bootstrap/css/bootstrap.min.css',
            '/vendor/avatar/packages/toastr/toastr.min.css',
            '/vendor/avatar/css/avatar.css?v=' . env('AVATAR_VERSION', time()),
        ],
        'javascript'  => [
            '/vendor/avatar/packages/jquery/jquery.min.js',
            '/vendor/avatar/packages/bootstrap/js/bootstrap.min.js',
            '/vendor/avatar/packages/cropper/cropper.min.js',
            '/vendor/avatar/packages/toastr/toastr.min.js',
            '/vendor/avatar/js/utils.js?v=' . env('AVATAR_VERSION', time()),
            '/vendor/avatar/js/avatar.js?v=' . env('AVATAR_VERSION', time()),
        ],
    ],
];

```