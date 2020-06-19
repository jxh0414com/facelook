<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>FaceLook</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">
        <link href="https://cdn.jsdelivr.net/npm/@mdi/font@5.x/css/materialdesignicons.min.css" type="text/css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Material+Icons" type="text/css" rel="stylesheet">
    </head>
    <body>
        <App id="app"></App>
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
