@extends('layouts.app')

@section('content')
    <the-projects></the-projects>
@endsection

@section('scripts')

    <script type="text/javascript">
        var BASE_URL = "{{secure_url('/')}}/";
        var PROJECTS = {!! $projects !!};
    </script>

@endsection
