@include('layouts.frontend.head')
<body style="overflow-y: scroll;">
    @include('layouts.frontend.navbar')
    @include('layouts.frontend.sidebar')
    <!--top-header-->
    <div class="wrapper" id="main">
        @yield('content')
    </div>
@include('layouts.frontend.footer')
</body>
