<!doctype html>
<html lang="{{ locale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title></title>

    <link href="https://fonts.googleapis.com/css?family=Montserrat&amp;subset=cyrillic" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <style>
        noscript {
            display: flex;
            justify-content: center;
            width: 100%;
            height: 100%;
            margin-top: 15px;
        }

        noscript > span {
            display: block;
            width: 40%;
            padding: 20px;
            font-size: 1.2rem;
            text-align: center;
            -webkit-box-shadow: 0 2px 4px -1px rgba(0, 0, 0, .2), 0 4px 5px 0 rgba(0, 0, 0, .14), 0 1px 10px 0 rgba(0, 0, 0, .12);
            -moz-box-shadow: 0 2px 4px -1px rgba(0, 0, 0, .2), 0 4px 5px 0 rgba(0, 0, 0, .14), 0 1px 10px 0 rgba(0, 0, 0, .12);
            box-shadow: 0 2px 4px -1px rgba(0, 0, 0, .2), 0 4px 5px 0 rgba(0, 0, 0, .14), 0 1px 10px 0 rgba(0, 0, 0, .12);
        }
    </style>

    <script src="https://www.google.com/recaptcha/api.js?render={{env('GOOGLE_RECAPTCHA_SITE_KEY')}}"></script>

    <script type="text/javascript">

        /* Used in "app.js". */
        const googleReCaptchaSiteKey = '{{env('GOOGLE_RECAPTCHA_SITE_KEY')}}',
            translate = Object.freeze(JSON.parse('{!! json_encode(__('app'), JSON_UNESCAPED_UNICODE) !!}')),
            locale = '{{ locale() }}';
    </script>
</head>
<body>
    <div id="app">
        <app :auth-user="{{json_encode($authUser, JSON_UNESCAPED_UNICODE)}}"></app>

        <noscript>
            <span>
                {!! trans('messages.errors.noscript') !!}
            </span>
        </noscript>
    </div>

    <script src="{{ mix('/js/app.js') }}"></script>
</body>
</html>