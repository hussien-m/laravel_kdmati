@include('layouts.frontend.head')
<body>
    @include('layouts.frontend.navbar')
    @include('layouts.frontend.sidebar')
    <!--top-header-->
    <div class="wrapper" id="main">


      <x-frontend.main-category-component />
      
      <x-frontend.service-component/>








    </div>
@include('layouts.frontend.footer')
</body>
