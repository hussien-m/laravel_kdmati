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



    <section class="main">
        <div class="div-img-main">
            <div class="row-item">
                <h2>أكبر سوق عربي لبيع وشراء الخدمات المصغرة</h2>
                <h5>أنجز أعمالك بسهولة وأمان بأسعار تبدأ من 5$ فقط</h5>
            </div>
            <div class="form-serch">
                <form action="" class="form-serch-input">
                    <input type="text" placeholder="جرب : تصميم شعار أو ترجمة">
                    <input type="submit" value="بحث" class="btn btn-serch">
                </form>
            </div>

        </div>
    </section>


@include('layouts.frontend.main-sections')
@include('layouts.frontend.sections')



    @include('layouts.frontend.footer')

</body>

</html>
