@include('layouts.frontend.head')
<body>
    @include('layouts.frontend.navbar')
    @include('layouts.frontend.sidebar')
    <!--top-header-->
    <div class="wrapper" id="main">
        @yield('content')
    </div>
@include('layouts.frontend.footer')
</body>
