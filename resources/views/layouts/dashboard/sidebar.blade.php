            <div class="vertical-menu">

                <div data-simplebar class="h-100">

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <!-- Left Menu Start -->
                        <ul class="metismenu list-unstyled" id="side-menu">
                            <li class="menu-title">القائمة الرئيسية</li>
                            <li class="mm-active">
                                <a href="{{ route('admin.dashboard') }}" class="waves-effect">
                                    <i class="ti-home"></i>
                                    <span>الرئيسية</span>
                                </a>
                            </li>

                            <li class="mm-active">
                                <a href="{{ route('admin.dashboard') }}" class="waves-effect">
                                    <i class="dripicons-graph-bar"></i>
                                    <span>إحصائيات عامة</span>
                                </a>
                            </li>

                            <li class="menu-title">لوحة التحكم</li>
                            <li class="mm-active">
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="dripicons-gear"></i>

                                    <span>الادارة</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="pages-login.html"><i class="dripicons-user-group"></i>المدراء</a></li>
                                    <li><a href="pages-register.html"><i class="fa fa-tasks"></i>القواعد</a></li>
                                    <li><a href="pages-register-2.html"><i class="fa fa-lock"></i>الصلاحيات</a></li>
                                    <li><a href="{{ route('admin.settings') }}"><i class="dripicons-gear"></i>اعدادات عامة</a></li>
                                    <li><a href="pages-recoverpw-2.html"><i class="fa fa-cog"></i> الواجهة الرئيسية</a></li>
                                    <li><a href="pages-recoverpw-2.html"><i class="dripicons-list"></i>سجل الاحدات </a></li>
                                </ul>
                            </li>

                            <li class="menu-title">إدارة العملاء</li>
                            <li class="mm-active">
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="dripicons-swap"></i>

                                    <span>التوثيقات</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="pages-login.html"><i class="dripicons-checkmark"></i>بانتظار التفعيل <span class="badge badge-info badge-pill float-right">0</span></a></li>
                                    <li><a href="pages-login-2.html"><i class="dripicons-list"></i>الجميع</a></li>
                                </ul>
                            </li>

                            <li class="menu-title">منصة خدماتي</li>
                            <li class="mm-active">
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="fa fa-users"></i>

                                    <span>الاعضاء</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="{{ route('admin.unactive.users') }}"><i class="dripicons-checkmark"></i>بانتظار التفعيل <span class="badge badge-info badge-pill float-right">{{ $deactive ?? "0" }}</span></a></li>
                                    <li><a href="{{ route('admin.users.index') }}"><i class="dripicons-view-list-large"></i>الجميع</a></li>
                                    <li><a href="pages-login.html"><i class="dripicons-plus"></i>أضافة عضو</a></li>
                                </ul>
                            </li>
                            <li class="mm-active">
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="dripicons-swap"></i>

                                    <span>التصنيفات</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="{{ route('admin.categories.index') }}"><i class="dripicons-view-list-large"></i>الجميع</a></li>
                                    <li><a href="pages-login.html"><i class="dripicons-plus"></i>أضافة تصنيف</a></li>
                                </ul>
                            </li>

                            <li class="mm-active">
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="dripicons-view-thumb"></i>

                                    <span>الخدمات</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="#"><i class="dripicons-checkmark"></i>بانتظار التفعيل <span class="badge badge-info badge-pill float-right">0</span></a></li>
                                    <li><a href="{{ route('admin.services.index') }}"><i class="dripicons-list"></i>الجميع</a></li>
                                </ul>
                            </li>

                            <li class="menu-title">القسم المالي</li>

                            <li class="mm-active">
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="mdi mdi-cash-multiple"></i>

                                    <span>طلبات السحب</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="pages-login.html"><i class="dripicons-checkmark"></i>بانتظار التأكيد <span class="badge badge-info badge-pill float-right">0</span></a></li>
                                    <li><a href="pages-login-2.html"><i class="dripicons-list"></i>الطلبات المقبولة</a></li>
                                </ul>
                            </li>

                            <li class="mm-active">
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="mdi mdi-cash-multiple"></i>

                                    <span>بوابات الدفع</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="{{ route("admin.payment-methods.create") }}"><i class="dripicons-checkmark"></i>أضف جديد</a></li>
                                    <li><a href="{{ route("admin.payment-methods.index") }}"><i class="dripicons-list"></i>جميع البوابات</a></li>
                                </ul>
                            </li>


                        </ul>
                    </div>
                    <!-- Sidebar -->
                </div>
            </div>
