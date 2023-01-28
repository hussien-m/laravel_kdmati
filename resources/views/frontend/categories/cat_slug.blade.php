@extends('layouts.frontend.front-app')

@section('styles') @endsection

@section('content')
<section id="page" class="page">
    <div class="container">
        <div class="row commnunity-row">
            <div class="col-md-12 col-lg-12 mx-auto ">
                <form method="POST">

                    <h1 class="page-title mt-0 pb-0 text-left">أعمال <select onchange="this.form.submit()" class="btn btn-primary btn-outline float-right" name="sort">
                            <option value="p2.total DESC">خدمات مميزة</option>
                            <option value="service.id DESC">أضيفت حديثاً</option>
                            <option value="p2.total ASC">خدمات صاعدة</option>
                        </select> <button class="btn btn-primary btn-outline float-right sidebar-btn" id="sidbar-btn" type="button"><i class="fa fa-sliders-h"></i></button>
                    </h1>
                </form>

                <h2 class="page-subtitle mb-2 ">مجموعة من الخدمات التي تدعم أعمالكم وتغطي مختلف المجالات مثل الخدمات
                    المالية والقانونية واستشارات الأعمال والتجارة الإلكترونية </h2>
            </div>
        </div>

    </div>
</section>

<section class=" py-3">
    <div class="container">

        <div class="row">
            <div class="col-md-3 messages-sidebar">
                <div class="messages-sidebar-widget">
                    <h4 class="messages-sidebar-widget-title">الأقسام </h4>

                    <ul class="c-list c-list--vert c-list--filter filters-list">
                        <li class="c-list__item " data-filter-id="" data-sub-filter-id="" data-clear-filters="true">
                            <a href="#" class="c-list__link filter closeLink is-active" data-deselect-others="">
                                <span>جميع الاقسام</span>
                                <span class="c-badge u-pull--left">326</span>
                            </a>
                        </li>


                       @foreach ( $categories as $category )

                       <li class="c-list__item" data-filter-id="3" data-sub-filter-id="">
                           <a href="#" class="c-list__link filter closeLink" data-deselect-others="">
                               <span>{{ $category->name }}</span>
                               <span class="c-badge u-pull--left">66</span>
                            </a>
                            <ul class="c-list c-list--vert c-list--sub u-hidden">
                                @foreach($category->parent as $parent)
                                <li data-filter-id="3" data-sub-filter-id="20" class="c-list__item ">
                                    <a href="#" class="menu-item c-list__link filter closeLink" data-deselect-others="">
                                        <span>{{ $parent->name }}</span>
                                        <span class="c-badge u-pull--left">1</span>
                                    </a>
                                </li>
                                @endforeach
                            </ul>

                        </li>
                        @endforeach
                    </ul>





                </div>
                <div class="messages-sidebar-widget">
                    <h4 class="messages-sidebar-widget-title">تقييم الخدمة </h4>
                    <ul class="list-group list-group-flush sidebar-form-list">
                        <li class="list-group-item d-flex justify-content-between align-items-center sidebar-form-list-item star-list">
                            <label for="rate5">
                                <input type="radio" onchange="this.form.submit()" value="5" name="rate" id="rate5" class="filter">
                                <span> <i class="fa fa-star clr--warning"></i><i class="fa fa-star clr--warning"></i><i class="fa fa-star clr--warning"></i><i class="fa fa-star clr--warning"></i><i class="fa fa-star clr--warning"></i>
                                </span>
                            </label>

                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center sidebar-form-list-item">
                            <label for="rate4">
                                <input type="radio" onchange="this.form.submit()" value="4" name="rate" id="rate4" class="filter">
                                <span> <i class="fa fa-star clr--warning"></i><i class="fa fa-star clr--warning"></i><i class="fa fa-star clr--warning"></i><i class="fa fa-star clr--warning"></i>
                                    أو أكثر </span>
                            </label>



                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center sidebar-form-list-item">
                            <label for="rate3">
                                <input type="radio" onchange="this.form.submit()" value="3" name="rate" id="rate3" class="filter">
                                <span> <i class="fa fa-star clr--warning"></i><i class="fa fa-star clr--warning"></i><i class="fa fa-star clr--warning"></i>
                                    أو أكثر </span>
                            </label>


                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center sidebar-form-list-item">
                            <label for="rate2">
                                <input type="radio" onchange="this.form.submit()" value="2" name="rate" id="rate2" class="filter">
                                <span> <i class="fa fa-star clr--warning"></i><i class="fa fa-star clr--warning"></i> أو
                                    أكثر </span>
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







            <div class="col-md-9 messages-body mobile-services ">
                <div class="row row-eq-height services-row read-more-services">
                    <div class="service-item-container col-md-4  ">
                        <div class="card service-item  ">
                            <a class="service-item-link" href="https://kdmati.com/service/1038-افحص-موقعك-أو-متجرك-الالكتروني-بشكل-كامل-وحلول-لتحسينه">
                                <img loading="lazy" src="https://kdmati.com/admin/uploads/12952265911641170946.png" width="340" height="190" class=" service-item-image" alt="افحص موقعك أو متجرك الالكتروني بشكل كامل وحلول لتحسينه"></a>
                            <div class="card-body service-item-body">
                                <div class="media service-item-user align-self-center align-items-center">
                                    <a class="service-avatar-link" href="https://kdmati.com/user/Khaled-fozan"><img loading="lazy" width="38" height="38" class="service-item-avatar rounded-circle align-self-center mr-2" src="https://kdmati.com/admin/avatars/18799420301655485487.png" alt="Khaled Fozan"></a>
                                    <div class="media-body">
                                        <h5 class="mt-0"><a class="service-item-userlink " href="https://kdmati.com/user/Khaled-fozan">Khaled Fozan</a></h5>
                                    </div>
                                </div>

                                <h5 class="card-title service-item-title"><a class="service-item-link" href="https://kdmati.com/service/1038-افحص-موقعك-أو-متجرك-الالكتروني-بشكل-كامل-وحلول-لتحسينه">افحص
                                        موقعك أو متجرك الالكتروني بشكل كامل وحلول لتحسينه</a></h5>
                            </div>
                            <div class="card-footer service-item-footer row align-items-baseline">
                                <div class="col-6  text-left">
                                    <h5 class="service-item-price"><i class="fal fa-usd-circle"></i> 5 دولار</h5>
                                </div>
                                <div class="col-6 text-right">
                                    <h5 class="service-item-rate text-primary"><i class="fas fa-star"></i> 5 <span class="text-gray">( 4 )</span></h5>
                                </div>

                            </div>

                        </div>
                    </div>

                    <div class="text-center col-md-12 clearfix cleax-fix my-3">
                        <button type="button" class="btn btn-primary btn-custom " id="read-more">عرض المزيد</button>
                    </div>
                    <div class="clearfix"></div>
                </div>

            </div>
        </div>




    </div>
</section>
@stop

@section('scripts')

<script>
    $('.c-list__link.filter').click(function(e) {
        //alert("sd");
        $(this).parent().find('.c-list--sub').toggleClass('u-hidden')
        e.preventDefault();
    })

</script>

@endsection
