#  Analytics

Integrate with Google Analytics

### Getting credentials

- Go to https://console.developers.google.com/apis/dashboard and create a new project.

![Image](https://laravel-cms.gistensal.com/docs-cms/images/analytics/analytics/step1.png)

![Image](https://laravel-cms.gistensal.com/docs-cms/images/analytics/analytics/step2.png)

- Select your project and click on "ENABLE APIS AND SERVICES":

![Image](https://laravel-cms.gistensal.com/docs-cms/images/analytics/analytics/step3.png)

- Enable API:

![Image](https://laravel-cms.gistensal.com/docs-cms/images/analytics/analytics/step4.png)

![Image](https://laravel-cms.gistensal.com/docs-cms/images/analytics/analytics/step5.png)


- Generate service account key and select role Viewer

![Image](https://laravel-cms.gistensal.com/docs-cms/images/analytics/analytics/step6.png)

![Image](https://laravel-cms.gistensal.com/docs-cms/images/analytics/analytics/step7.png)

- Open JSON file and copy its content, then go to /admin/settings/general and update JSON credentials data for Analytics plugin:

![Image](https://laravel-cms.gistensal.com/docs-cms/images/analytics/analytics/step8.png)

- Go to Google Analytics account: https://analytics.google.com/analytics/web/. Click on "Admin" => "View Settings" and copy "View ID" number, then go to /admin/settings/general and tab "Google Analytics" and paste to field View ID.

Note: Change in Google Analytics 4 property.

When creating a new property, you need to check the "Create a Universal Analytics Property" checkbox.

![Image](https://laravel-cms.gistensal.com/storage/docs/google-analytics/analytics-change-1.png)

Then you will have view settings tab and View ID.

![Image](https://laravel-cms.gistensal.com/storage/docs/google-analytics/analytics-change-2.png)

- Open JSON credentials file and copy client email. Then click on "User management" and add that email to list account. Just need view only permission.

![Image](https://laravel-cms.gistensal.com/docs-cms/images/analytics/analytics/step9.png)

![Image](https://laravel-cms.gistensal.com/docs-cms/images/analytics/analytics/step10.png)

![Image](https://laravel-cms.gistensal.com/docs-cms/images/analytics/analytics/step11.png)

Give your comment here if you got any problem.

Good luck!