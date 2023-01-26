@include('layouts.frontend.head')
<body>
    @include('layouts.frontend.navbar')
    @include('layouts.frontend.sidebar')
    <!--top-header-->
    <div class="wrapper" id="main">


      <x-frontend.main-category-component />



      @include('layouts.frontend.main-service')




    </div>
@include('layouts.frontend.footer')
</body>
