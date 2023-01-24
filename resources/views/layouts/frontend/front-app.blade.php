<body>
    @include('layouts.frontend.head')
    @include('layouts.frontend.navbar')

    <div class="subheader-search" id="item1">

        <form action="" id="item1">
            <input type="text" placeholder="ابحث عن ...." id="item1">
        </form>

    </div>

    <div class="userlistacount" id="item1">
        <ul id="item1">
            <li id="item1"><a href="#" id="item1"><i class="bi bi-person-fill" id="item1"></i>Hashem</a></li>
            <li id="item1"><a href="#" id="item1"><i class="bi bi-bookmark-check-fill" id="item1"></i>مجموعاتى</a></li>
            <li id="item1"><a href="#" id="item1"><i class="bi bi-currency-dollar" id="item1"></i>الرصيد</a></li>
            <li id="item1"><a href="#" id="item1"><i class="bi bi-sliders" id="item1"></i>الأعدادت</a></li>
        </ul>
        <hr id="item1">
        <ul id="item1">
            <li id="item1"><a href="#" id="item1"><i class="bi bi-person-fill-gear" id="item1"></i>تعديل الحساب</a></li>
            <li id="item1"><a href="#" id="item1"><i class="bi bi-bandaid-fill" id="item1"></i>مساعدة</a></li>
        </ul>
        <hr id="item1">
        <ul id="item1">
            <li id="item1"><a href="{{ route('logout') }}"
                onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();" id="item1"> ><i class="bi bi-box-arrow-right" id="item1"></i>خروج</a></li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </ul>
    </div>






    <div class="shadow-list"></div>

    <div class="v-list" id="sidebar" id="item1">
        <div class="serch-item" id="serchdiv" id="item1">

            <form action="" id="item1">
                <input type="text" placeholder="ابحث عن ...." id="serchform" id="item1">
            </form>

        </div>
        <div class="item-nav-swatch-v" id="item1">

            <ul class="list-swatch" id="item1">

                <li id="item1"><a href="#" id="item1"> <i id="item1" class="bi bi-plus"></i><span id="item1">أضف خدمة
                        </span></a></li>
                <li id="item1"><a href="#" id="item1"> <i id="item1" class="bi bi-bag"></i> <span
                            id="item1">المشتريات</span></a></li>
                <li class="m-v"> <a href="#"><i class="bi bi-chat-left"></i> الرسائل</a></li>
                <li id="item1"><a href="#" id="item1"> <i id="item1" class="bi bi-box-arrow-in-down"></i> <span
                            id="item1">الطلبات الواردة</span></a></li>
                <li id="item1"><a id="item1" class="drpdownlist li-drpdownlist" href="#"> <i id="item1"
                            class="bi bi-grid-3x3-gap"></i><span id="item1">التصنيفات</span><i id="item1"
                            class="bi bi-arrow-down-circle arrow-cat"></i></a></li>

            </ul>



        </div>

        <div id="item1" class="item-nav-v sub-list">
            <ul id="item1" class="list-swatch item-main-list">
                <li id="item1"><a id="item1" href="#"> <span id="item1">أعمال</span></a></li>
                <li id="item1"><a id="item1" href="#"> <span id="item1">برمجمة و تتطوير</span></a></li>
                <li id="item1"><a id="item1" href="#"> <span id="item1">تسويق إليكترونى</span></a></li>
                <li id="item1"><a id="item1" href="#"> <span id="item1">تدريب عن بعد</span></a></li>
                <li id="item1"><a id="item1" href="#"> <span id="item1">تصميم فيديو</span></a></li>
                <li id="item1"><a id="item1" href="#"> <span id="item1">تصميم</span></a></li>
                <li id="item1"><a id="item1" href="#"><span id="item1">صوتيات</span></a></li>
                <li id="item1"><a id="item1" href="#"> <span id="item1">كتابة و ترجمة</span></a></li>
            </ul>
        </div>



        <div class="social-sv" id="item1">
            <ul class="list-swatch social-sv-list" id="item1">
                <li id="item1"><a id="item1" class="sub-list-tow-btn li-drpdownlist" href="#"><i id="item1"
                            class="bi bi-chat-square-dots "></i><span id="item1">ملتقى خدماتى</span><i id="item1"
                            class="bi bi-arrow-down-circle arrow-sv"></i></a></li>

            </ul>

        </div>

        <div id="item1" class="item-nav-v sub-list-tow">
            <ul id="item1" class="list-swatch item-main-list">
                <li id="item1"><a id="item1" href="#"> <span id="item1">نماذج أعمال قمت بتنفيذها</span></a></li>
                <li id="item1"><a id="item1" href="#"> <span id="item1">طلبات الخدمات الغير موجودة</span></a></li>
                <li id="item1"><a id="item1" href="#"> <span id="item1">تجارب و قصص المستخدمين</span></a></li>
                <li id="item1"><a id="item1" href="#"> <span id="item1">معلومات عامه حول خدماتى</span></a></li>
            </ul>
        </div>

    </div>


@include('layouts.frontend.category')

<section id="page" class="page">
    <div class="container">
        <div class="row commnunity-row mt-4">
            <div class="col-md-12 col-lg-12 mt-4">
                <h3 class="page-title mt-0 text-left mt-4">البحث: خدمة </h3>
            </div>
        </div>

    </div>



</section>

<section class="py-3">
    <div class="container">
        <form>
        <div class="row">
            <div class="col-md-3 messages-sidebar">
                <div class="messages-sidebar-widget">
                    <h4 class="messages-sidebar-widget-title">الأقسام </h4>
                    <ul class="list-group list-group-flush sidebar-form-list">
                                                    <li class="list-group-item  align-items-center sidebar-form-list-item sidebar-category-item">
                                <label class="category-label"><a href="https://kdmati.com/category/30-أعمال">أعمال  <span class="badge badge-dark badge-pill">
                                     268</span></a></label>
                            </li>
                                                    <li class="list-group-item  align-items-center sidebar-form-list-item sidebar-category-item">
                                <label class="category-label"><a href="https://kdmati.com/category/22-برمجة-وتطوير">برمجة وتطوير  <span class="badge badge-dark badge-pill">
                                     365</span></a></label>
                            </li>
                                                    <li class="list-group-item  align-items-center sidebar-form-list-item sidebar-category-item">
                                <label class="category-label"><a href="https://kdmati.com/category/23-تسويق-الكتروني">تسويق إلكتروني  <span class="badge badge-dark badge-pill">
                                     527</span></a></label>
                            </li>
                                                    <li class="list-group-item  align-items-center sidebar-form-list-item sidebar-category-item">
                                <label class="category-label"><a href="https://kdmati.com/category/24-تدريب-عن-بعد">تدريب عن بعد  <span class="badge badge-dark badge-pill">
                                     110</span></a></label>
                            </li>
                                                    <li class="list-group-item  align-items-center sidebar-form-list-item sidebar-category-item">
                                <label class="category-label"><a href="https://kdmati.com/category/25-تصميم-فيديو">تصميم فيديو  <span class="badge badge-dark badge-pill">
                                     101</span></a></label>
                            </li>
                                                    <li class="list-group-item  align-items-center sidebar-form-list-item sidebar-category-item">
                                <label class="category-label"><a href="https://kdmati.com/category/26-تصميم">تصميم  <span class="badge badge-dark badge-pill">
                                     1113</span></a></label>
                            </li>
                                                    <li class="list-group-item  align-items-center sidebar-form-list-item sidebar-category-item">
                                <label class="category-label"><a href="https://kdmati.com/category/27-صوتيات">صوتيات  <span class="badge badge-dark badge-pill">
                                     87</span></a></label>
                            </li>
                                                    <li class="list-group-item  align-items-center sidebar-form-list-item sidebar-category-item">
                                <label class="category-label"><a href="https://kdmati.com/category/28-كتابة-وترجمة">كتابة وترجمة  <span class="badge badge-dark badge-pill">
                                     1034</span></a></label>
                            </li>
                                            </ul>

                </div>

                <div class="messages-sidebar-widget">
                    <h4 class="messages-sidebar-widget-title">تقييم الخدمة </h4>
                    <ul class="list-group list-group-flush sidebar-form-list star-list">
                        <li class="list-group-item d-flex justify-content-between align-items-center  sidebar-form-list-item">
                            <label for="rate5">
                                <input type="radio" onchange="this.form.submit()" value="5" name="rate" id="rate5" class="filter">
                                <span> <i class="fa fa-star clr--warning"></i><i class="fa fa-star clr--warning"></i><i class="fa fa-star clr--warning"></i><i class="fa fa-star clr--warning"></i><i class="fa fa-star clr--warning"></i> </span>
                            </label>

                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center sidebar-form-list-item">
                            <label for="rate4">
                                <input type="radio" onchange="this.form.submit()" value="4" name="rate" id="rate4" class="filter">
                                <span> <i class="fa fa-star clr--warning"></i><i class="fa fa-star clr--warning"></i><i class="fa fa-star clr--warning"></i><i class="fa fa-star clr--warning"></i> أو أكثر </span>
                            </label>



                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center sidebar-form-list-item">
                            <label for="rate3">
                                <input type="radio" onchange="this.form.submit()" value="3" name="rate" id="rate3" class="filter">
                                <span> <i class="fa fa-star clr--warning"></i><i class="fa fa-star clr--warning"></i><i class="fa fa-star clr--warning"></i> أو أكثر </span>
                            </label>


                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center sidebar-form-list-item">
                            <label for="rate2">
                                <input type="radio" onchange="this.form.submit()" value="2" name="rate" id="rate2" class="filter">
                                <span> <i class="fa fa-star clr--warning"></i><i class="fa fa-star clr--warning"></i> أو أكثر </span>
                            </label>


                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center sidebar-form-list-item">
                            <label for="rate1">
                                <input type="radio" onchange="this.form.submit()" value="1" name="rate" id="rate1" class="filter">
                                <span> <i class="fa fa-star clr--warning"></i> أو أكثر </span>
                            </label>


                        </li>
                    </ul>

                </div>
                <div class="messages-sidebar-widget">
                    <h4 class="messages-sidebar-widget-title">مستوى البائع </h4>
                    <ul class="list-group list-group-flush sidebar-form-list">
                                                <li class="list-group-item d-flex justify-content-between align-items-center sidebar-form-list-item">
                            <label for="level5">
                                <input type="checkbox" onchange="this.form.submit()" value="1" name="level[]" id="level5" class="filter">
                                <span> بائع جديد </span>
                            </label>
                        </li>
                                                <li class="list-group-item d-flex justify-content-between align-items-center sidebar-form-list-item">
                            <label for="level6">
                                <input type="checkbox" onchange="this.form.submit()" value="10" name="level[]" id="level6" class="filter">
                                <span> بائع نشيط </span>
                            </label>
                        </li>
                                                <li class="list-group-item d-flex justify-content-between align-items-center sidebar-form-list-item">
                            <label for="level7">
                                <input type="checkbox" onchange="this.form.submit()" value="50" name="level[]" id="level7" class="filter">
                                <span> بائع متميز </span>
                            </label>
                        </li>
                                                <li class="list-group-item d-flex justify-content-between align-items-center sidebar-form-list-item">
                            <label for="level9">
                                <input type="checkbox" onchange="this.form.submit()" value="100" name="level[]" id="level9" class="filter">
                                <span> بائع موثوق </span>
                            </label>
                        </li>
                                            </ul>

                </div>

                <div class="messages-sidebar-widget">
                    <h4 class="messages-sidebar-widget-title">حالة البائع </h4>
                    <ul class="list-group list-group-flush sidebar-form-list">
                        <li class="list-group-item d-flex justify-content-between align-items-center sidebar-form-list-item">
                            <label for="online">
                                <input type="checkbox" onchange="this.form.submit()" name="online" value="1" id="online" class="filter">
                                <span> متواجد حالياً </span>
                            </label>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center sidebar-form-list-item">
                            <label for="verified">
                                <input type="checkbox" onchange="this.form.submit()" name="verified" value="1" id="verified" class="filter">
                                <span> حساب موثق </span>
                            </label>
                        </li>
                    </ul>

                </div>
            </div>
            <div class="col-md-9 messages-body mobile-services">
                <div class="row row-eq-height services-row">
                                            <div class="empty-content col-md-12">
                            <p>لا يوجد نتائج</p>
                        </div>
                                        <div class="clearfix"></div>
                </div>

            </div>
        </div>
        </form>
    </div>
</section>



    @include('layouts.frontend.footer')

</body>

</html>
