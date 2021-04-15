<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('common.head')
<body class="@yield('body_class')">
    {{-- @include('common.header') --}}

    <div class="wrapper">

      @yield('content')

      @include('common.footer')

    </div>
    @yield('javascript')
</body>
</html>
