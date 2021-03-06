<?php

use Platform\Base\Models\MetaBox as MetaBoxModel;
use Platform\Base\Supports\BaseSeeder;
use Platform\Language\Models\LanguageMeta;
use Platform\Page\Models\Page;
use Platform\Slug\Models\Slug;

class PageSeeder extends BaseSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'en_US' => [
                [
                    'name'     => 'Contact',
                    'content'  => Html::tag('p',
                            'Address: North Link Building, 10 Admiralty Street, 757695 Singapore') .
                        Html::tag('p', 'Hotline: 18006268') .
                        Html::tag('p', 'Email: contact@botble.com') .
                        Html::tag('p',
                            '[google-map]North Link Building, 10 Admiralty Street, 757695 Singapore[/google-map]') .
                        Html::tag('p', 'For the fastest reply, please use the contact form below.') .
                        Html::tag('p', '[contact-form][/contact-form]'),
                    'template' => 'default',
                    'user_id'  => 1,
                ],
                [
                    'name'     => 'Cookie Policy',
                    'content'  => Html::tag('h3', 'EU Cookie Consent') .
                        Html::tag('p', 'To use this Website we are using Cookies and collecting some Data. To be compliant with the EU GDPR we give you to choose if you allow us to use certain Cookies and to collect some Data.') .
                        Html::tag('h4', 'Essential Data') .
                        Html::tag('p', 'The Essential Data is needed to run the Site you are visiting technically. You can not deactivate them.') .
                        Html::tag('p', '- Session Cookie: PHP uses a Cookie to identify user sessions. Without this Cookie the Website is not working.') .
                        Html::tag('p', '- XSRF-Token Cookie: Laravel automatically generates a CSRF "token" for each active user session managed by the application. This token is used to verify that the authenticated user is the one actually making the requests to the application.'),
                    'template' => 'default',
                    'user_id'  => 1,
                ],
            ],
            'vi'    => [
                [
                    'name'     => 'Li??n h???',
                    'content'  => Html::tag('p',
                            '?????a ch???: North Link Building, 10 Admiralty Street, 757695 Singapore') .
                        Html::tag('p', '???????ng d??y n??ng: 18006268') .
                        Html::tag('p', 'Email: contact@botble.com') .
                        Html::tag('p',
                            '[google-map]North Link Building, 10 Admiralty Street, 757695 Singapore[/google-map]') .
                        Html::tag('p', '????? ???????c tr??? l???i nhanh nh???t, vui l??ng s??? d???ng bi???u m???u li??n h??? b??n d?????i.') .
                        Html::tag('p', '[contact-form][/contact-form]'),
                    'template' => 'default',
                    'user_id'  => 1,
                ],
                [
                    'name'     => 'Cookie Policy',
                    'content'  => Html::tag('h3', 'EU Cookie Consent') .
                        Html::tag('p', '????? s??? d???ng Trang web n??y, ch??ng t??i ??ang s??? d???ng Cookie v?? thu th???p m???t s??? D??? li???u. ????? tu??n th??? GDPR c???a Li??n minh Ch??u ??u, ch??ng t??i cho b???n l???a ch???n n???u b???n cho ph??p ch??ng t??i s??? d???ng m???t s??? Cookie nh???t ?????nh v?? thu th???p m???t s??? D??? li???u.') .
                        Html::tag('h4', 'D??? li???u c???n thi???t') .
                        Html::tag('p', 'D??? li???u c???n thi???t l?? c???n thi???t ????? ch???y Trang web b???n ??ang truy c???p v??? m???t k??? thu???t. B???n kh??ng th??? h???y k??ch ho???t ch??ng.') .
                        Html::tag('p', '- Session Cookie: PHP s??? d???ng Cookie ????? x??c ?????nh phi??n c???a ng?????i d??ng. N???u kh??ng c?? Cookie n??y, trang web s??? kh??ng ho???t ?????ng.') .
                        Html::tag('p', '- XSRF-Token Cookie: Laravel t??? ?????ng t???o "token" CSRF cho m???i phi??n ng?????i d??ng ??ang ho???t ?????ng do ???ng d???ng qu???n l??. Token n??y ???????c s??? d???ng ????? x??c minh r???ng ng?????i d??ng ???? x??c th???c l?? ng?????i th???c s??? ????a ra y??u c???u ?????i v???i ???ng d???ng.'),
                    'template' => 'default',
                    'user_id'  => 1,
                ],
            ],
        ];

        Page::truncate();
        Slug::where('reference_type', Page::class)->delete();
        MetaBoxModel::where('reference_type', Page::class)->delete();
        LanguageMeta::where('reference_type', Page::class)->delete();

        foreach ($data as $locale => $pages) {
            foreach ($pages as $index => $item) {
                $page = Page::create($item);

                Slug::create([
                    'reference_type' => Page::class,
                    'reference_id'   => $page->id,
                    'key'            => Str::slug($page->name),
                    'prefix'         => SlugHelper::getPrefix(Page::class),
                ]);

                $originValue = md5($page->id . Page::class . time());

                $languageMeta = LanguageMeta::where([
                    'reference_id'   => $index + 1,
                    'reference_type' => Page::class,
                ])->first();

                if ($languageMeta) {
                    $originValue = $languageMeta->lang_meta_origin;
                }

                LanguageMeta::insert([
                    'reference_id'     => $page->id,
                    'reference_type'   => Page::class,
                    'lang_meta_code'   => $locale,
                    'lang_meta_origin' => $originValue,
                ]);
            }
        }
    }
}
