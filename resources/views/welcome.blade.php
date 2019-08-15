<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Forever Alone</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        <div id="app">
            {{ csrf_field() }}
{{--            <user-dashboard></user-dashboard>--}}
{{--            <life-cycle></life-cycle>--}}
{{--            <binding-html></binding-html>--}}
{{--            <form-input-binding></form-input-binding>--}}
{{--            <event-handing></event-handing>--}}
            <parent></parent>
        </div>
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
