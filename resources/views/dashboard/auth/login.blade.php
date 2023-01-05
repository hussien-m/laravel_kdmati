<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>{{ $option->site_name ?? 'site_name' }} | تسجيل دخول الادارة</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="/assets/images/favicon.ico">

		<!-- App css -->
        <link href="{{ asset('dashboard/assets/css/config/material/bootstrap-rtl.min.css') }}" rel="stylesheet" type="text/css" id="bs-default-stylesheet" />
        <link href="{{ asset('dashboard/assets/css/config/material/app-rtl.min.css') }}" rel="stylesheet" type="text/css" id="app-default-stylesheet" />

		<link href="{{asset('dashboard/assets/css/config/modern/bootstrap-dark.min.css')}}" rel="stylesheet" type="text/css" id="bs-dark-stylesheet" />
		<link href="{{asset('dashboard/assets/css/config/modern/app-dark.min.css')}}" rel="stylesheet" type="text/css" id="app-dark-stylesheet" />

		<!-- icons -->
		<link href="{{asset('dashboard/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@600&display=swap" rel="stylesheet">
        <link href="{{asset('dashboard/assets/libs/sweetalert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css" />
        <style>
            *,h1,h2,h3,h4,h5,h6,span,a,p{
                font-family: 'Cairo', sans-serif;

            }
            .form-control {
             text-align: right;
            }
        </style>
    </head>

    <body class="authentication-bg authentication-bg-pattern">

        <div class="account-pages mt-5 mb-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-4">
                        <div class="card bg-pattern">

                            <div class="card-body p-4">

                                <div class="text-center w-75 m-auto">
                                    <div class="auth-logo">
                                        <a href="index.html" class="logo logo-dark text-center">
                                            <span class="logo-lg">
                                                <img src="{{asset('dashboard/assets/images/logo-dark.png')}}" alt="" height="22">
                                            </span>
                                        </a>

                                        <a href="#" class="logo logo-light text-center">
                                            <span class="logo-lg">
                                                <img src="{{asset('dashboard/assets/images/logo-light.png')}}" alt="" height="22">
                                            </span>
                                        </a>
                                    </div>
                                    <p class="text-muted mb-4 mt-3">قم بإدخال بريدك الالكتروني وكلمة المرور للوصول الى لوحة التحكم الخاصة بك.</p>
                                </div>
                                @if (session()->has('message'))
                                    <div class="card text-white bg-{{ session()->get('type') }} mb-3">
                                        <div class="card-body">
                                            <h6 class="card-title text-white">تسجيل دخول خاطئ</h6>
                                            <p class="card-text">{{ session()->get('message') }}.</p>
                                        </div>
                                    </div>
                                @endif
                                <form action="{{ route('admin.loginPost') }}" method="post">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="emailaddress" class="form-label">البريد الالكتروني</label>
                                        <input class="form-control" type="email" name="email" id="emailaddress" required="" value="admin@app.com" placeholder="البريد الألكتروني">
                                    </div>

                                    <div class="mb-3">
                                        <label for="password" class="form-label">كلمة المرور</label>
                                        <div class="input-group input-group-merge">
                                            <input type="password" id="password" name="password" class="form-control" value="password" placeholder="كلمةالمرور">
                                            <div class="input-group-text" data-password="false">
                                                <span class="password-eye"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="checkbox-signin" checked>
                                            <label class="form-check-label" for="checkbox-signin">تذكرني</label>
                                        </div>
                                    </div>

                                    <div class="text-center d-grid">
                                        <button class="btn btn-primary" type="submit"> تسجيل الدخول</button>
                                    </div>

                                </form>

                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->

                        <div class="row mt-3">
                            <div class="col-12 text-center">
                                <p> <a href="auth-recoverpw.html" class="text-white-50 ms-1">نسيت كلمة المرور?</a></p>
                                <p class="text-white-50">لايوجد لديك حساب? <a href="auth-register.html" class="text-white ms-1"><b>سجل الان</b></a></p>
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->

                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->


        <footer class="footer footer-alt text-white-50">
            2015 - <script>document.write(new Date().getFullYear())</script> &copy;  حسين  محمد<a href="" class="text-white-50">مطور تطبيقات  الويب  </a>
        </footer>

        <!-- Vendor js -->
        <script src="{{asset('dashboard/assets/js/vendor.min.js')}}"></script>

        <!-- App js -->
        <script src="{{asset('dashboard/assets/js/app.min.js')}}"></script>

        <script src="{{asset('dashboard/assets/libs/sweetalert2/sweetalert2.all.min.js')}}"></script>

        <!-- Sweet alert init js-->
        <script src="{{asset('dashboard/assets/js/pages/sweet-alerts.init.js')}}"></script>

    </body>
</html>
