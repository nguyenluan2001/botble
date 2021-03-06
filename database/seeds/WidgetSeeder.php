<?php

use Platform\Base\Supports\BaseSeeder;
use Platform\Widget\Models\Widget as WidgetModel;

class WidgetSeeder extends BaseSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        WidgetModel::truncate();

        $this->uploadFiles('widgets');

        $data = [
            'en_US' => [
                [
                    'widget_id'  => 'RecentPostsWidget',
                    'sidebar_id' => 'footer_sidebar',
                    'position'   => 0,
                    'data'       => [
                        'id'             => 'RecentPostsWidget',
                        'name'           => 'Recent Posts',
                        'number_display' => 5,
                    ],
                ],
                [
                    'widget_id'  => 'RecentPostsWidget',
                    'sidebar_id' => 'top_sidebar',
                    'position'   => 0,
                    'data'       => [
                        'id'             => 'RecentPostsWidget',
                        'name'           => 'Recent Posts',
                        'number_display' => 5,
                    ],
                ],
                [
                    'widget_id'  => 'TagsWidget',
                    'sidebar_id' => 'primary_sidebar',
                    'position'   => 0,
                    'data'       => [
                        'id'             => 'TagsWidget',
                        'name'           => 'Tags',
                        'number_display' => 5,
                    ],
                ],
                [
                    'widget_id'  => 'CustomMenuWidget',
                    'sidebar_id' => 'primary_sidebar',
                    'position'   => 1,
                    'data'       => [
                        'id'      => 'CustomMenuWidget',
                        'name'    => 'Categories',
                        'menu_id' => 'featured-categories',
                    ],
                ],
                [
                    'widget_id'  => 'CustomMenuWidget',
                    'sidebar_id' => 'primary_sidebar',
                    'position'   => 2,
                    'data'       => [
                        'id'      => 'CustomMenuWidget',
                        'name'    => 'Social',
                        'menu_id' => 'social',
                    ],
                ],
                [
                    'widget_id'  => 'CustomMenuWidget',
                    'sidebar_id' => 'footer_sidebar',
                    'position'   => 1,
                    'data'       => [
                        'id'      => 'CustomMenuWidget',
                        'name'    => 'Favorite Websites',
                        'menu_id' => 'favorite-websites',
                    ],
                ],
                [
                    'widget_id'  => 'CustomMenuWidget',
                    'sidebar_id' => 'footer_sidebar',
                    'position'   => 2,
                    'data'       => [
                        'id'      => 'CustomMenuWidget',
                        'name'    => 'My Links',
                        'menu_id' => 'my-links',
                    ],
                ],
            ],
            'vi'    => [
                [
                    'widget_id'  => 'RecentPostsWidget',
                    'sidebar_id' => 'footer_sidebar',
                    'position'   => 0,
                    'data'       => [
                        'id'             => 'RecentPostsWidget',
                        'name'           => 'B??i vi???t g???n ????y',
                        'number_display' => 5,
                    ],
                ],
                [
                    'widget_id'  => 'RecentPostsWidget',
                    'sidebar_id' => 'top_sidebar',
                    'position'   => 0,
                    'data'       => [
                        'id'             => 'RecentPostsWidget',
                        'name'           => 'B??i vi???t g???n ????y',
                        'number_display' => 5,
                    ],
                ],
                [
                    'widget_id'  => 'TagsWidget',
                    'sidebar_id' => 'primary_sidebar',
                    'position'   => 0,
                    'data'       => [
                        'id'             => 'TagsWidget',
                        'name'           => 'Tags',
                        'number_display' => 5,
                    ],
                ],
                [
                    'widget_id'  => 'CustomMenuWidget',
                    'sidebar_id' => 'primary_sidebar',
                    'position'   => 1,
                    'data'       => [
                        'id'      => 'CustomMenuWidget',
                        'name'    => 'Danh m???c n???i b???t',
                        'menu_id' => 'danh-muc-noi-bat',
                    ],
                ],
                [
                    'widget_id'  => 'CustomMenuWidget',
                    'sidebar_id' => 'primary_sidebar',
                    'position'   => 2,
                    'data'       => [
                        'id'      => 'CustomMenuWidget',
                        'name'    => 'M???ng x?? h???i',
                        'menu_id' => 'social',
                    ],
                ],
                [
                    'widget_id'  => 'CustomMenuWidget',
                    'sidebar_id' => 'footer_sidebar',
                    'position'   => 1,
                    'data'       => [
                        'id'      => 'CustomMenuWidget',
                        'name'    => 'Trang web y??u th??ch',
                        'menu_id' => 'trang-web-yeu-thich',
                    ],
                ],
                [
                    'widget_id'  => 'CustomMenuWidget',
                    'sidebar_id' => 'footer_sidebar',
                    'position'   => 2,
                    'data'       => [
                        'id'      => 'CustomMenuWidget',
                        'name'    => 'Li??n k???t',
                        'menu_id' => 'lien-ket',
                    ],
                ],
            ],
        ];

        foreach ($data as $locale => $widgets) {
            foreach ($widgets as $item) {
                $item['theme'] = $locale == 'en_US' ? 'ripple' : ('ripple-' . $locale);
                WidgetModel::create($item);
            }
        }

        $data = [
            'en_US' => [
                [
                    'widget_id'  => 'RecentPostsWidget',
                    'sidebar_id' => 'footer_sidebar',
                    'position'   => 0,
                    'data'       => [
                        'id'             => 'RecentPostsWidget',
                        'name'           => 'Recent Posts',
                        'number_display' => 5,
                    ],
                ],
                [
                    'widget_id'  => 'PopularPostsWidget',
                    'sidebar_id' => 'primary_sidebar',
                    'position'   => 0,
                    'data'       => [
                        'id'             => 'PopularPostsWidget',
                        'name'           => 'Top Views',
                        'number_display' => 5,
                    ],
                ],
                [
                    'widget_id'  => 'VideoPostsWidget',
                    'sidebar_id' => 'primary_sidebar',
                    'position'   => 1,
                    'data'       => [
                        'id'             => 'VideoPostsWidget',
                        'name'           => 'Video posts',
                        'number_display' => 1,
                    ],
                ],
                [
                    'widget_id'  => 'FacebookWidget',
                    'sidebar_id' => 'primary_sidebar',
                    'position'   => 2,
                    'data'       => [
                        'id'            => 'FacebookWidget',
                        'name'          => '',
                        'facebook_name' => 'Botble Technologies',
                        'facebook_id'   => 'https://www.facebook.com/botble.technologies',
                    ],
                ],
                [
                    'widget_id'  => 'AdsWidget',
                    'sidebar_id' => 'primary_sidebar',
                    'position'   => 3,
                    'data'       => [
                        'id'         => 'AdsWidget',
                        'name'       => '',
                        'image_url'  => RvMedia::getImageUrl('widgets/300x250.jpg'),
                        'image_link' => 'https://google.com',
                    ],
                ],
                [
                    'widget_id'  => 'CustomMenuWidget',
                    'sidebar_id' => 'footer_sidebar',
                    'position'   => 1,
                    'data'       => [
                        'id'      => 'CustomMenuWidget',
                        'name'    => 'Favorite Websites',
                        'menu_id' => 'favorite-websites',
                    ],
                ],
                [
                    'widget_id'  => 'CustomMenuWidget',
                    'sidebar_id' => 'footer_sidebar',
                    'position'   => 2,
                    'data'       => [
                        'id'      => 'CustomMenuWidget',
                        'name'    => 'My Links',
                        'menu_id' => 'my-links',
                    ],
                ],
                [
                    'widget_id'  => 'CustomMenuWidget',
                    'sidebar_id' => 'footer_sidebar',
                    'position'   => 3,
                    'data'       => [
                        'id'      => 'CustomMenuWidget',
                        'name'    => 'Featured categories',
                        'menu_id' => 'featured-categories',
                    ],
                ],
            ],
            'vi'    => [
                [
                    'widget_id'  => 'PopularPostsWidget',
                    'sidebar_id' => 'primary_sidebar',
                    'position'   => 0,
                    'data'       => [
                        'id'             => 'PopularPostsWidget',
                        'name'           => 'B??i vi???t n???i b???t',
                        'number_display' => 5,
                    ],
                ],
                [
                    'widget_id'  => 'VideoPostsWidget',
                    'sidebar_id' => 'primary_sidebar',
                    'position'   => 1,
                    'data'       => [
                        'id'             => 'VideoPostsWidget',
                        'name'           => 'B??i vi???t video',
                        'number_display' => 1,
                    ],
                ],
                [
                    'widget_id'  => 'FacebookWidget',
                    'sidebar_id' => 'primary_sidebar',
                    'position'   => 2,
                    'data'       => [
                        'id'            => 'FacebookWidget',
                        'name'          => '',
                        'facebook_name' => 'Botble Technologies',
                        'facebook_id'   => 'https://www.facebook.com/botble.technologies',
                    ],
                ],
                [
                    'widget_id'  => 'AdsWidget',
                    'sidebar_id' => 'primary_sidebar',
                    'position'   => 3,
                    'data'       => [
                        'id'         => 'AdsWidget',
                        'name'       => '',
                        'image_url'  => RvMedia::getImageUrl('widgets/300x250.jpg'),
                        'image_link' => 'https://google.com',
                    ],
                ],
                [
                    'widget_id'  => 'RecentPostsWidget',
                    'sidebar_id' => 'footer_sidebar',
                    'position'   => 0,
                    'data'       => [
                        'id'             => 'RecentPostsWidget',
                        'name'           => 'B??i vi???t g???n ????y',
                        'number_display' => 5,
                    ],
                ],
                [
                    'widget_id'  => 'CustomMenuWidget',
                    'sidebar_id' => 'footer_sidebar',
                    'position'   => 1,
                    'data'       => [
                        'id'      => 'CustomMenuWidget',
                        'name'    => 'Trang web y??u th??ch',
                        'menu_id' => 'trang-web-yeu-thich',
                    ],
                ],
                [
                    'widget_id'  => 'CustomMenuWidget',
                    'sidebar_id' => 'footer_sidebar',
                    'position'   => 2,
                    'data'       => [
                        'id'      => 'CustomMenuWidget',
                        'name'    => 'Li??n k???t',
                        'menu_id' => 'lien-ket',
                    ],
                ],
                [
                    'widget_id'  => 'CustomMenuWidget',
                    'sidebar_id' => 'footer_sidebar',
                    'position'   => 3,
                    'data'       => [
                        'id'      => 'CustomMenuWidget',
                        'name'    => 'Danh m???c n???i b???t',
                        'menu_id' => 'danh-muc-noi-bat',
                    ],
                ],
            ],
        ];

        foreach ($data as $locale => $widgets) {
            foreach ($widgets as $item) {
                $item['theme'] = $locale == 'en_US' ? 'newstv' : ('newstv-' . $locale);
                WidgetModel::create($item);
            }
        }
    }
}
