<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    @include('partials.top._header')
    @yield('links')
</head>

<body>
    <div id="app">

        @include('partials.top._nav')

        <div class="container">

            @yield('content')

            <flash message="{{ session('flash') }}"></flash>
        </div>

    </div>

    @include('partials.bottom._scripts')
    @yield('scripts')
</body>

</html>