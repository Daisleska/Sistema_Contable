<link rel="shortcut icon" href="{{ URL::asset('Shreyu/assets/images/favicon.ico') }}">

@yield('css')
{{-- cdn del vue.js --}}
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<!-- App css -->

<link href="{{ URL::asset('Shreyu/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('sweetalert/sweetalert.css') }}" rel="stylesheet" type="text/css" />

@if(isset($isDark) && $isDark)
<link href="{{ URL::asset('Shreyu/assets/css/bootstrap-dark.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('Shreyu/assets/css/app-dark.min.css') }}" rel="stylesheet" type="text/css" />
@else
<link href="{{ URL::asset('Shreyu/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />

    @if(isset($isRTL) && $isRTL)
    <link href="{{ URL::asset('Shreyu/assets/css/app-rtl.min.css') }}" rel="stylesheet" type="text/css" />
    @else
    <link href="{{ URL::asset('Shreyu/assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />

    @endif
@endif
