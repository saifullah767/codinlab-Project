@extends('layouts.app')

@section('content')
    <the-users></the-users>
@endsection

@section('scripts')

    <script type="text/javascript">
        var BASE_URL = "{{secure_url('/')}}/";
        var USERS = {!! $users !!};
        var PROJECTS = {!! $projects !!};

    </script>

@endsection
