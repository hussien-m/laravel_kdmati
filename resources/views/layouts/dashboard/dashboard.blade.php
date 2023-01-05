
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>{{ $option->site_name ?? 'Site_name' }}</title>
    <meta name="csrf-token" content="{{csrf_token()}}" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('dashboard/assets/images/favicon.ico') }}">
    @yield('styles')
    <!-- App css -->
    <link href="{{ asset('dashboard/assets/css/config/purple/bootstrap-rtl.min.css') }}" rel="stylesheet"
        type="text/css" id="bs-default-stylesheet"   />
    <link href="{{ asset('dashboard/assets/css/config/purple/app-rtl.min.css') }}" rel="stylesheet" type="text/css"
        id="app-default-stylesheet"  />

    <link href="{{ asset('dashboard/assets/css/config/purple/bootstrap-dark-rtl.min.css') }}" rel="stylesheet"
        type="text/css" id="bs-dark-stylesheet"   />
    <link href="{{ asset('dashboard/assets/css/config/purple/app-dark-rtl.min.css') }}" rel="stylesheet"
        type="text/css" id="app-dark-stylesheet"   />

    <!-- icons -->
    <link href="{{ asset('dashboard/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@600&display=swap" rel="stylesheet">
    <style>
        *,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        span,
        a,
        p {
            font-family: 'Cairo', sans-serif;

        }
    </style>

</head>

<!-- body start -->

<body class="loading" data-layout='{"mode": "light", "width": "fluid", "menuPosition": "fixed", "sidebar": { "color": "light", "size": "default", "showuser": false}, "topbar": {"color": "dark"}, "showRightSidebarOnPageLoad": true}'>
    <!-- Begin page -->
    <div id="wrapper">

        <!-- Topbar Start -->
        @include('layouts.dashboard.navbar')
        <!-- end Topbar -->

        <!-- ========== Left Sidebar Start ========== -->
        @include('layouts.dashboard.sidebar')

        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            <div class="content">

                <!-- Start Content-->
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            @if(!Request::is('admin/dashboard'))
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="#">الرئيسية</a></li>
                                            <li class="breadcrumb-item"><a href="#"onclick="history.back()" >رجوع للخلف</a></li>
                                            <li class="breadcrumb-item active">{{ $page_name ?? "لايوجد اسم" }}</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">{{ $page_name ?? "لايوجد اسم" }}</h4>
                                </div>
                            @endif
                        </div>
                    </div>
                    <!-- end page title -->

                    @yield('content')


                </div> <!-- container -->

            </div> <!-- content -->

            <!-- Footer Start -->
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <script>
                                document.write(new Date().getFullYear())
                            </script> &copy; UBold theme by <a href="">Coderthemes</a>
                        </div>
                        <div class="col-md-6">
                            <div class="text-md-end footer-links d-none d-sm-block">
                                <a href="javascript:void(0);">About Us</a>
                                <a href="javascript:void(0);">Help</a>
                                <a href="javascript:void(0);">Contact Us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- end Footer -->

        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->


    </div>
    <!-- END wrapper -->

    <!-- Right Sidebar -->
    <div class="right-bar">
        <div data-simplebar class="h-100">

            <!-- Nav tabs -->
            <ul class="nav nav-tabs nav-bordered nav-justified" role="tablist">
                <li class="nav-item">
                    <a class="nav-link py-2 active" data-bs-toggle="tab" href="#settings-tab" role="tab">
                        <i class="mdi mdi-cog-outline d-block font-22 my-1"></i>
                    </a>
                </li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content pt-0">



                <div class="tab-pane active" id="settings-tab" role="tabpanel">
                    <h6 class="fw-medium px-3 m-0 py-2 font-13 text-uppercase bg-light">
                        <span class="d-block py-1">اعدادات ثيم لوحة التحكم</span>
                    </h6>

                    <div class="p-3">
                        <div class="alert alert-warning" role="alert">
                            <strong>تخصيص </strong> يمكنك اختيار, القائمة الجانبية القوائم, الى اخره.

                        </div>

                        <h6 class="fw-medium font-14 mt-4 mb-2 pb-1">نظام الالوان</h6>
                        <div class="form-check form-switch mb-1">
                            <input type="checkbox" class="form-check-input light" name="color-scheme-mode" value="light"
                                id="light-mode-check"    />
                            <label class="form-check-label" for="light-mode-check">الوضع المضئ</label>
                        </div>

                        <div class="form-check form-switch mb-1">
                            <input type="checkbox" class="form-check-input night" name="color-scheme-mode" value="dark"
                                id="dark-mode-check" />
                            <label class="form-check-label" for="dark-mode-check">الوضع الليلي</label>
                        </div>

                    </div>

                </div>
            </div>

        </div> <!-- end slimscroll-menu-->
    </div>
    <!-- /Right-bar -->

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <!-- Vendor js -->
    <script src="{{ asset('dashboard/assets/js/vendor.min.js') }}"></script>

    <!-- Chart JS -->
    <script src="{{ asset('dashboard/assets/libs/chart.js/Chart.bundle.min.js') }}"></script>

    <script src="{{ asset('dashboard/assets/libs/moment/min/moment.min.js') }}"></script>
    <script src="{{ asset('dashboard/assets/libs/jquery.scrollto/jquery.scrollTo.min.js') }}"></script>

    <!-- Chat app -->
    <script src="{{ asset('dashboard/assets/js/pages/jquery.chat.js') }}"></script>

    <!-- Todo app -->
    <script src="{{ asset('dashboard/assets/js/pages/jquery.todo.js') }}"></script>

    <!-- Dashboard init JS -->
    <script src="{{ asset('dashboard/assets/js/pages/dashboard-3.init.js') }}"></script>

    <!-- App js-->
    <script src="{{ asset('dashboard/assets/js/app.min.js') }}"></script>
    <script src="{{ asset('dashboard/assets/js/pages/fontawesome.init.js') }}"></script>
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        $('.night').on('click' ,function(){

                var dark = 1;

                $.ajax({

                    url:"settings/dark/",
                    method: "get",
                    data: {
                        dark:dark,
                    }
                });

            })

        $('.light').on('click' ,function(){

                var dark = 0;

                $.ajax({

                    url:"settings/light/",
                    method: "get",
                    data: {
                        dark:dark,
                    }
                });

            })
    </script>
    <script>
        @if (Session::has('message'))

            toastr.options = {
                "closeButton": true,
                "debug": false,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
                }
                var type = "{{ Session::get('type', 'info') }}";
                switch (type) {
                    case 'info':
                        toastr.info("{{ Session::get('message') }}");
                        break;
                    case 'warning':
                        toastr.warning("{{ Session::get('message') }}");
                        break;
                    case 'success':
                        toastr.success("{{ Session::get('message') }}");
                        break;
                    case 'error':
                        toastr.error("{{ Session::get('message') }}");
                        break;
                }
            @endif
    </script>
    @yield('scripts')
</body>

</html>
