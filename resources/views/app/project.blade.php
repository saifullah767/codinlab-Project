<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title> CodinLab </title>
        <link rel="stylesheet" href="/app/css/app.css">
    </head>
    
    <body class="font-sans antialiased">
    
        <script type="text/javascript">
            var BASE_URL = "{{secure_url('/')}}/";
            var USER = {!! $user !!};
            var PROJECT = {!! $project !!};
            var COMMENTS = {!! $comments !!};
        </script>
        
        <div id="codinlab_project">
            @yield('content')
        </div>

    @yield('scripts')
        <script src="/app/js/project.js"></script>
    </body>
</html>
