@extends('layouts.frontend.front-app')

@section('styles')
    <style>
        #cups {
            font-size: 19px;
            padding: 0px 10px;
            height: auto;
            text-align: center;
            width: 100%;
        }
    </style>
@endsection


@section('content')

    @php
        $image = explode(',', $service->images);
        $tags = explode(',', $service->tags);
    @endphp
    <div class="modal fade" id="cart-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">إشعار</h5>
                </div>
                <div class="modal-body">
                    تم إضافة الخدمة الى سلة المشتريات
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-primary">ادفع الآن</a>
                    <button type="button" class="btn btn-dark btn-outline text-dark" data-dismiss="modal">تصفح
                        المزيد</button>
                </div>
            </div>
        </div>
    </div>

    <section id="subject-header" class="login subject-header ">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-lg-8">
                    <div class="media comment-item-user">
                        <a href="#{{ $service->user->first_name }}"><img
                                src="https://kdmati.com/admin/avatars/16381207751660819112.jpg"
                                class="mr-3 subject-item-image" alt="{{ $service->user->first_name }}"></a>
                        <div class="media-body">
                            <h1 class="subject-title">{{ $service->title }}</h1>
                            <p class="subject-meta"> <i class="fa fa-bars fa-fw"></i> <a class="cat-meta"
                                    href="{{ route('categorySlug', $service->category->slug) }}">
                                    <span>{{ $service->category->name }}</span>
                                </a> <span class="cat-seperator">&nbsp;/&nbsp;</span> <a class="cat-meta"
                                    href="{{ route('categorySlug', $service->category->slug) }}">
                                    <span>{{ $service->subCategory->name }}</span> </a> <i class="far fa-clock fa-fw"></i>
                                مدة التسليم: {{ config('duration.'.$service->duration) }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 text-left text-lg-right text-md-right">
                    <div class="btn-group">
                        <a href="#add-to-cart" type="button" class="btn btn-primary"><i class="fa fa-shopping-cart"></i>
                            اشتري الخدمة</a>
                        <button type="button" class="btn btn btn-primary dropdown-toggle dropdown-toggle-split"
                            id="dropdownMenuReference" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                            data-reference="parent">
                            <span class="sr-only"> </span>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuReference">
                            <a class="dropdown-item" href="{{ route('message.new',$service->id) }}"><i class="fa fa-fw fa-envelope"></i> تواصل مع البائع</a>
                            <a class="dropdown-item" id="add-to-favourite" data-id="7267" href="#"><i
                                    class="fa fa-briefcase fa-fw"></i> <span class="favourite_text">اضافة الى
                                    المفضلة</span></a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section id="subject-body" class="login  ">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                </div>
                <div class="col-md-8 col-lg-8  ">
                    <div class="card subject-card subject-body-card">
                        <div class="card-body">
                            <img src="{{ asset('upload/images/' . $image[0]) }}"
                                class="service-image img-fluid w-100 img-responsive">

                            <div class="subject-content pre">{{ $service->description }}</div>
                        </div>
                    </div>
                    @if($service->addons->count() >= 1)
                    <div class="card subject-card subject-addon-services-card">

                        <div class="card-header form-card-header">
                            <h2 class="card-header-title">تطويرات متوفرة لهذه الخدمة</h2>
                        </div>

                        <div class="card-body py-3 px-0 comments2">
                            @forelse ($service->addons as $addons)
                            <div class="comment-item comment-body">
                                <label for="upgrade-15159" class="u-no--margin">
                                    <input type="checkbox" class="service_upgrade_check service_addon" id="upgrade-{{ $addons->id }}"
                                        name="service_upgrade_check" value="{{ $addons->id }}" data-price="{{ $addons->price }}"> <strong>{{ $addons->title }}</strong>
                                    <span></span>
                                </label>
                                <p class="c-form__hb about-text">مقابل {{ $addons->price }}$ على سعر الخدمة. سيزيد مدة التنفيذ {{ config('duration.'.$addons->duration) }} {{ $addons->duration > 1 ? "إضافية":"إضافي" }}.</p>
                            </div>
                            @empty
                            @endforelse

                        </div>
                    </div>
                    @endif
                    <div class="card  subject-card comment-form-card" id="add-to-cart">
                        <div class="card-header form-card-header">
                            <h2 class="card-header-title">اشتري الخدمة <a class="color-primary float-right contact-link"
                                    href="{{ route('message.new',$service->id) }}">تواصل مع البائع</a></h2>
                        </div>
                        <div class="card-body p-lg-3">
                            <form method="POST" action="" class="comment-form">
                                <input type="hidden" id="id" value="7267" name="id">
                                <input type="hidden" id="title" value="إنشاء مدونة بلوجر بدقة عالية و قالب مميز في أي مجال تريده" name="title">
                                <input type="hidden" id="slug"
                                    value="https://kdmati.com/service/7267-انشا--مدونة-بلوجر-blogger-باللغة-العربية-أو-الانجليزية"
                                    name="slug">
                                <input type="hidden" id="amount" value="5" name="amount">
                                <input type="hidden" id="addon_ids" value="" name="addon_ids">
                                <h3 class="u-margin-bottom mb-2 text-center">
                                    <span>عدد مرات الطلب</span>
                                    <div class="form-group amount-selector">
                                        <select id="service_quantity" name="quantity" required="required"
                                            class="form-control">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </div>
                                    <span>المبلغ النهائي</span>
                                    <strong class="total_order_price" id="total_price">5</strong><strong>$</strong>
                                </h3>
                                <div class="form-group text-center">
                                    <button type="submit" name="action" value="add"
                                        class="text-center btn btn-primary  ">
                                        <i class="fa fa-shopping-cart"></i> أضف الى
                                        سلة المشتريات</button>
                                </div>
                            </form>
                        </div>
                    </div>


                    <div class="card  subject-card subject-comments-card" id="review-list">
                        <div class="card-header form-card-header">
                            <h2 class="card-header-title">آراء المشترين</h2>
                        </div>

                        <div class="card-body py-3 px-0 comments2">

                            <div class=" empty-content">
                                <p>لا يوجد تقييمات حتى الان</p>
                            </div>

                        </div>
                    </div>
                    <div class="card subject-card  ">
                        <div class="card-header form-card-header">
                            <h2 class="card-header-title">اعزمني على كوب من القهوة</h2>
                        </div>

                        <div class="card-body">
                            <form id="edit_user_register" class="login-form" name="registerform"
                                action="https://kdmati.com/coffee" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="uid" value="17814">
                                <div class="d-flex justify-content-between align-items-center">
                                    <label> <strong>عدد الاكواب</strong> (x5$): </label>
                                    <label><strong>المجموع : </strong><span id="coffee-total">5$</span></label>

                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-coffee"></i></span>
                                    </div>
                                    <div class="form-group cups-group">
                                        <select id="cups" name="cups" required="required" class="form-control">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </div>
                                    <div class="input-group-append">
                                        <button type="submit"
                                            class="text-center btn btn-primary btn-inline btn-sm">اشتري</button>

                                    </div>
                                </div>

                            </form>

                        </div>

                    </div>
                    <div class="card subject-card ">
                        <div class="card-header form-card-header">
                            <h2 class="card-header-title">خدمات مقترحة</h2>
                        </div>

                        <div class="card-body">
                            <div class="row row-eq-height services-row">

                                <div class="service-item-container col-md-4  ">
                                    <div class="card service-item  ">
                                        <a class="service-item-link"
                                            href="https://kdmati.com/service/8916-مخططات-ER-diagram---وصف-قاعدة-البيانات">
                                            <img loading="lazy"
                                                src="https://kdmati.com/admin/uploads/12870364271675250923.png"
                                                width="340" height="190" class=" service-item-image"
                                                alt="رسم مخططات  وصف قاعدة البيانات "></a>
                                        <div class="card-body service-item-body">
                                            <div class="media service-item-user align-self-center align-items-center">
                                                <a class="service-avatar-link"
                                                    href="https://kdmati.com/user/yousefalashqer"><img loading="lazy"
                                                        width="38" height="38"
                                                        class="service-item-avatar rounded-circle align-self-center mr-2"
                                                        src="https://teams.microsoft.com/api/mt/part/emea-02/beta/users/defaultProfilePictureV2?displayName=yousef alashqer&amp;shortenSingleWord=false&amp;voidCache=true"
                                                        alt="yousef alashqer"></a>
                                                <div class="media-body">
                                                    <h5 class="mt-0"><a class="service-item-userlink "
                                                            href="https://kdmati.com/user/yousefalashqer">yousef
                                                            alashqer</a></h5>
                                                </div>
                                            </div>

                                            <h5 class="card-title service-item-title"><a class="service-item-link"
                                                    href="https://kdmati.com/service/8916-مخططات-ER-diagram---وصف-قاعدة-البيانات">رسم
                                                    مخططات وصف قاعدة البيانات </a></h5>
                                        </div>
                                        <div class="card-footer service-item-footer row align-items-baseline">
                                            <div class="col-6  text-left">
                                                <h5 class="service-item-price"><i class="fal fa-usd-circle"></i> 5 دولار
                                                </h5>
                                            </div>
                                            <div class="col-6 text-right">
                                                <h5 class="service-item-rate text-primary"><i class="fas fa-star"></i> 0
                                                    <span class="text-gray">( 0 )</span></h5>
                                            </div>

                                        </div>

                                    </div>
                                </div>

                            </div>


                        </div>
                    </div>
                    <div class="card  subject-card comment-form-card">
                        <div class="card-header form-card-header">
                            <h2 class="card-header-title">كلمات افتتاحية</h2>
                        </div>

                        <div class="card-body p-lg-3">
                            <ul class="tags-list list-inline">
                                <li class="tag-item list-inline-item">
                                    @for($i = 0; $i < count($tags); $i++)
                                    <a href="#" class="tag-link btn btn-primary btn-outline">{{ $tags[$i] }}</a>
                                    </li>
                                    @endfor
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card subject-card subject-side-card ">
                        <div class="card-header form-card-header">
                            <h2 class="card-header-title">تقييم الخدمة</h2>
                        </div>

                        <div class="card-body">
                            <ul class="c-list c-list--rating list-inline">

                                <li class="c-list__item list-inline-item"><i class="far fa-star "></i></li>
                                <li class="c-list__item list-inline-item"><i class="far fa-star "></i></li>
                                <li class="c-list__item list-inline-item"><i class="far fa-star "></i></li>
                                <li class="c-list__item list-inline-item"><i class="far fa-star"></i></li>
                                <li class="c-list__item list-inline-item"><i class="far fa-star "></i></li>
                            </ul>
                            <div class="row review-count-row py-3">
                                <div class="col-6">
                                    <p><a href="#review-list"><i class="fa fa-thumbs-up"></i> <span>0 ايجابي</span></a>
                                    </p>
                                </div>
                                <div class="col-6 ">
                                    <p><a href="#review-list"><i class="fa fa-thumbs-down"></i> <span>0 سلبى</span></a>
                                    </p>
                                </div>
                            </div>
                            <p class="service-meta-item"><i class="fa fa-reply fa-fw"></i> <span>م. سرعة رد: 1 ساعة</span>
                            </p>
                            <p class="service-meta-item"><i class="fa fa-shopping-cart fa-fw"></i> <span> 0 خدمات
                                    مباعة</span></p>
                            <p class="service-meta-item"><i class="fa fa-truck fa-fw"></i> <span> 0 طلبات جاري
                                    تنفيذها</span></p>
                            <p class="service-meta-item w-100"><i class="fa fa-clock fa-fw"></i> <span>مدة تنفيذ : {{ config('duration.'.$service->duration) }}
                                </span></p>
                        </div>

                        <div class="card-footer bg-white">
                            <div class="media comment-item-user">
                                <a href="https://kdmati.com/user/Aimad1710"><img
                                        src="https://kdmati.com/admin/avatars/16381207751660819112.jpg"
                                        class="mr-3 comment-item-image" alt="{{ $service->user->first_name }}"></a>
                                <div class="media-body">
                                    <h5 class="comment-user-name"><a class="comment-user-link"
                                            href="https://kdmati.com/user/Aimad1710">{{ $service->user->first_name.' '.$service->user->last_name  }} </a> <a
                                            class="btn btn-primary btn-outline float-right"
                                            href="{{ route('message.new',$service->id) }}">تواصل</a></h5>

                                    <small class="comment-meta"><i class="fa fa-fw fa-briefcase"></i> بائع نشيط</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card subject-card subject-side-card mb-4">

                        <div class="card-body p-0">
                            <a class="service-item-link" target="_blank" href="https://kdmati.com/page/guarantee"> <img
                                    src="https://kdmati.com/assets/images/security.png" class=" img-fluid p-0 "
                                    alt="ضمان حقوقك"></a>
                        </div>
                    </div>

                    <div class="card text-center  subject-card subject-side-card">

                        <div class="card-body p-2">

                            <div class="ribbon">اعلان مدفوع</div>
                            <a class="service-item-link" target="_blank"
                                href="https://kdmati.com/service/1813-%D8%A5%D8%B4%D9%87%D8%A7%D8%B1-%D8%AE%D8%AF%D9%85%D8%AA%D9%83-%D8%B9%D8%A8%D8%B1-%D8%A5%D8%B9%D9%84%D8%A7%D9%86%D8%A7%D8%AA-%D9%85%D9%88%D9%82%D8%B9-%D8%AE%D8%AF%D9%85%D8%A7%D8%AA%D9%8A">
                                <img src="https://kdmati.com/admin/uploads/16887541051669550122.png" class=" img-fluid "
                                    alt="للاعلان في موقع خدماتي "></a>
                            <div class="card-body service-item-body">
                                <h5 class="card-title service-item-title text-center"><a class="service-item-link"
                                        href="https://kdmati.com/service/1813-%D8%A5%D8%B4%D9%87%D8%A7%D8%B1-%D8%AE%D8%AF%D9%85%D8%AA%D9%83-%D8%B9%D8%A8%D8%B1-%D8%A5%D8%B9%D9%84%D8%A7%D9%86%D8%A7%D8%AA-%D9%85%D9%88%D9%82%D8%B9-%D8%AE%D8%AF%D9%85%D8%A7%D8%AA%D9%8A">للاعلان
                                        في موقع خدماتي </a></h5>
                            </div>
                        </div>

                    </div>



                </div>
            </div>
        </div>
    </section>


@stop


@section('scripts')

    <script>
$("body").on('change', '#cups', function() {
            let cups = $(this).val();
            $("#coffee-total").html((cups*5)+"$");
        });
        $("body").on('change', '#service_quantity, input[type=checkbox].service_addon', function() {
            calculate_total();
        });

        function calculate_total() {
            var price = 5;
            var quanitiy = $("#service_quantity").val();
            var total = price * quanitiy;
            if ($("input[type=checkbox].service_addon:checkbox:checked").length > 0) {
                // any one is checked

                $("#ids").val("");
                var addons_price = 0;
                var sList = "";
                $('input[type=checkbox].service_addon').each(function() {
                    if (this.checked) {
                        var sThisVal = $(this).val();
                        addons_price = addons_price + $(this).data("price");
                        sList += (sList == "" ? sThisVal : "," + sThisVal);

                    }
                });


                $("#addon_ids").val(sList);

                var total = (addons_price * quanitiy) + (price * quanitiy);

                $("#total_price").html(total);
                $("#amount").val(total);


            } else {

                $("#addon_ids").val("");
                $("#total_price").html(total);
                $("#amount").val(total);

            }
        }
    </script>

@endsection
