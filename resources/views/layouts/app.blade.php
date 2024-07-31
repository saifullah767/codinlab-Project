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
            var USER_ = {!! Auth::user() !!};
        </script>
        
        <div id="app_codinlab">
            <master-layout>
                @yield('content')
            </master-layout>
        </div>

    @yield('scripts')
        <script src="/app/js/routes.js"></script>
        
    </body>
</html>
