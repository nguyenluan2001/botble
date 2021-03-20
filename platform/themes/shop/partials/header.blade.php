<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=5, user-scalable=1" name="viewport" />

    <!-- Fonts-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css?family={{ urlencode(theme_option('primary_font', 'Roboto')) }}" rel="stylesheet" type="text/css">
    <!-- CSS Library-->

    <style>
        :root {
            --color-1st: {
                    {
                    theme_option('primary_color', '#ff2b4a')
                }
            }

            ;
            --primary-font: '{{ theme_option('primary_font', 'Roboto') }}',
            sans-serif;
        }
    </style>

    {!! Theme::header() !!}
</head>

<body @if (BaseHelper::siteLanguageDirection()=='rtl' ) dir="rtl" @endif>
    <header>
        <div class="container">
            <div id="logo">
                <a href="{{route('public.index')}}"><img src="https://shopwise.botble.com/storage/general/logo.png" alt=""></a>
            </div>
            <div id="search">
                <form action="">
                    <input type="text" placeholder="Search">
                </form>
            </div>
            <div id="contact">
                <i class="fas fa-phone-volume"></i>
                0916225150
            </div>
        </div>
    </header>