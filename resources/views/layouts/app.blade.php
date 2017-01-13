<html>
<head>
    <script src="{{ URL::asset('js/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
    <script src="{{URL::asset('js/all.js')}}"></script>
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ URL::asset('css/font-awesome.min.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ URL::asset('css/main.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ URL::asset('css/styles.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{URL::asset('css/overrides.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/style_Vitaliy.css')}}">
    <meta name="_token" content="{{ csrf_token() }}" />
    @yield('headData')
</head>
<body>
@yield('header')
@yield('navigation')
<div>
    @yield('wrapper')
</div>
<div id="testDiv">

</div>
@yield('footer')
</body>
</html>