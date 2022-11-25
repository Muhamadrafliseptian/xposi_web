<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @include('layouts.partials.css.style')
    @yield('app_css')
    <link rel="icon" type="image/png" href="" />

    <title>
       XPOSI
    </title>
</head>

<body>
    <div class="dashboard-main-wrapper">
        @include('layouts.partials.navbar.navbar')

        @include('layouts.partials.sidebar.sidebar')

        <div class="dashboard-wrapper">
            <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content ">
                    @yield('app_breadcrumb')
                    @yield('app_content')
                </div>
            </div>
            @include('layouts.partials.footer.footer')
        </div>
    </div>
    @include('layouts.partials.js.style')
    @if (session('message'))
        {!! session('message') !!}
    @endif
    @yield('app_js')
</body>

</html>
