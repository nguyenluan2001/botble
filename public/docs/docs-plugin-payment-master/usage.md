# Usage

### Display payment form

\- Using short code

```php
{!! do_shortcode('[payment-form currency="USD" amount="10" name="Our product" callback_url="http://your-domain.com/payment/callback" return_url="http://your-domain.com"][/payment-form]') !!}
```

### Display payment info

\- Using short code. After payment success, transaction will be saved into `payments` table in database. You can show it by `charge_id`.

```php
{!! do_shortcode('[payment-info charge_id="chargeId"][/payment-info]') !!}
```