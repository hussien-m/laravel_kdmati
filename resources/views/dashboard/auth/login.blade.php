
<!doctype html>
<html lang="en" dir="rtl">

    <head>

        <meta charset="utf-8">
        <title>Login 2 | Veltrix - Admin & Dashboard Template</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description">
        <meta content="Themesbrand" name="author">
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('dashboard/assets/images/favicon.ico') }}">

        <!-- Bootstrap Css -->
        <link href="{{ asset('dashboard/assets/css/bootstrap-rtl.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css">
        <!-- Icons Css -->
        <link href="{{ asset('dashboard/assets/css/icons-rtl.min.css') }}" rel="stylesheet" type="text/css">
        <!-- App Css-->
        <link href="{{ asset('dashboard/assets/css/app-dark-rtl.min.css') }}" id="app-style" rel="stylesheet" type="text/css">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@600&display=swap" rel="stylesheet">

        <style>
            *,h1,h2,h3,h4,h5,h6,span,a,p{
            font-family: 'Cairo', sans-serif;
            }
        </style>

    </head>

    <body class="account-pages">
        <div class="home-btn d-none d-sm-block">
            <a href="index.html" class="text-dark"><i class="fas fa-home h2"></i></a>
        </div>
        <div class="account-pages my-5 pt-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-4">
                        <div class="card overflow-hidden">
                            <div class="bg-primary">
                                <div class="text-primary text-center p-4">
                                    <h5 class="text-white font-size-20">أهلا بك</h5>
                                    <p class="text-white-50">سجل الدخول للوصول للوحة التحكم !</p>
                                    <a href="index.html" class="logo logo-admin">
                                        <img src="{{ asset('dashboard/assets/logo-sm.ico') }}" height="24" alt="logo">
                                    </a>
                                </div>
                            </div>

                            <div class="card-body p-4">
                                @if (session()->has('message'))
                                <div class="mt-5 alert alert-danger  alert-dismissible fade show mb-0" role="alert">
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    <strong>دخول خاطئ : </strong> {{ session()->get('message') }}.
                                </div>
                                @endif
                                <div class="p-3">
                                    <form class="mt-4" action="{{ route('admin.loginPost') }}" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <label class="form-label" for="username">اسم المستخدم أو البريد الالكتروني</label>
                                            <input type="text" name="email" class="form-control" id="username" placeholder="اسم المستخدم أو البريد الالكتروني">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label" for="userpassword">كلمة المرور</label>
                                            <input type="password" name="password" class="form-control" id="userpassword" placeholder="كلمة المرور">
                                        </div>

                                        <div class="mb-3 row">
                                            <div class="col-sm-6">
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="customControlInline">
                                                    <label class="form-check-label" for="customControlInline">تذكرني</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 text-end">
                                                <button class="btn btn-primary w-md waves-effect waves-light" type="submit">تسجيل الدخول</button>
                                            </div>
                                        </div>

                                        <div class="mt-2 mb-0 row">
                                            <div class="col-12 mt-4">
                                                <a href="pages-recoverpw.html"><i class="mdi mdi-lock"></i> هل نسيت كلمة المرور ؟</a>
                                            </div>
                                        </div>

                                    </form>

                                </div>
                            </div>

                        </div>

                        <div class="mt-5 text-center">
                            <p class="mb-0">© <script>document.write(new Date().getFullYear())</script>2023 منصة خدماتي <i class="mdi mdi-heart text-danger"></i> خدماتي</p>
                        </div>


                    </div>
                </div>
            </div>
        </div>

    <!-- JAVASCRIPT -->
    <script src="{{ asset('dashboard/assets/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('dashboard/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('dashboard/assets/libs/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('dashboard/assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('dashboard/assets/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('dashboard/assets/js/app.js') }}"></script>

    </body>
</html>
