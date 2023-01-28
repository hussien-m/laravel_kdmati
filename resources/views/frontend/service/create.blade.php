@extends('layouts.frontend.front-app')

@section('styles')
<!--dropzone.min.css-->


<!--plyr.css-->
<link rel="stylesheet" href="{{ asset('frontend/assets/css/plyr.min.css') }}" defer async>
@endsection


@section('content')

<div class="modal fade" id="youtube-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <iframe width="100%" height="400" src="https://www.youtube.com/embed/6EFT_8bkRTU" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>
            </div>
        </div>
    </div>
</div>


<section id="page" class="page half-white">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-12 mx-auto ">
                <h1 class="page-title2">أضف خدمة جديدة <a href="#" type="button" class="text-primary btn btn-primary btn-outline " data-toggle="modal" data-target="#youtube-modal">نصائح لقبول الخدمة</a> </h1>
                <div class="card  new-card">
                    <div class="card-body ">
                        <form id="edit_user_register" class="login-form" name="registerform" action="{{ route("post-service") }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group ">
                                <label class="mb-1">أضف عنوان مناسب:</label>
                                <p class="c-form__hb about-text mb-2 mt-0">أضف عنوان بسيط يوضح عملك.</p>
                                <input type="text" name="title" class="form-control " placeholder="ادخل هنا" required="" value="">
                            </div>
                            <div class=" row">
                                <div class="form-group col-md-6">
                                    <label>التصنيف:</label>
                                    <select class="form-control" name="category_id" id="category_id" required="required">
                                        <option selected disabled>القسم</option>
                                        @forelse ($categories as $cat )
                                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>

                                        @empty

                                        @endforelse
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>قسم فرعي</label>
                                    <div id="subcategory-container">
                                        <select class="form-control" name="sub_cat_id" id="sub_cat_id">
                                            <option value="">اختر التصنيف الفرعى</option>
                                        </select>
                                    </div>
                                </div>

                            </div>
                            <div class="form-group  ">
                                <label>وصف قصير : </label>
                                <p class="c-form__hb about-text">أضف وصف قصير يوصف عملك.</p>

                                <textarea class="form-control" rows="5" required="required" name="description" placeholder="ادخل هنا    "></textarea>
                            </div>

                            <div class="form-group  ">
                                <input id="files" name="images" type="hidden" value="">

                                <label>ارفع صور لأعمالك :</label>
                                <p class="c-form__hb about-text">يمكنك رفع اكتر من صوره لنفس العمل .</p>
                                <p class="c-form__hb about-text">القياس: (800x470) بكسل · الحجم الأقصى: 5MB. العدد
                                    المسموح: 10 ملفات.</p>
                                <p class="c-form__hb about-text">اختيار فيديو أو صورة مصممة بشكل جيد ستظهر خدمتك بشكل
                                    احترافي وتزيد من مبيعاتك.</p>


                                <div class="collapse multi-collapse show" id="fileAccordion">
                                    <div class="card card-body  file-card-body">

                                        <div class="inner-page">

                                            <div class="uploader-container">
                                                <div action="{{ route('image.upload') }}" class="dropzone2 files-container">
                                                    <div class="fallback">
                                                        <input name="file" type="file" multiple />
                                                    </div>

                                                </div>

                                                <div class="media recorder">
                                                    <div class="align-self-center mr-2 file-btn-container" id="file-btn">
                                                        <div class="file-icon">
                                                            <i class="fa fa-fw fa-cloud-upload"></i>
                                                        </div>
                                                    </div>
                                                    <div class="media-body record-body">
                                                        <h5 class="mt-0 record-title"> اسحب الملفات هنا


                                                        </h5>
                                                        <p class="record-description">أو انقر للاختيار يدويا</p>
                                                    </div>
                                                </div>

                                            </div>


                                            <!-- Preview collection of uploaded documents -->
                                            <div class="preview-container dz-preview uploaded-files">
                                                <div id="previews">
                                                    <div id="onyx-dropzone-template">
                                                        <div class="onyx-dropzone-info">
                                                            <div class="thumb-container">
                                                                <img data-dz-thumbnail />
                                                            </div>
                                                            <div class="details">
                                                                <div>
                                                                    <span class="text-primary" style=""><i class="far fa-check-circle"></i></span>
                                                                    <span data-dz-name></span> حجم الملف: <span data-dz-size></span>
                                                                </div>
                                                                <div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress></span></div>
                                                                <div class="dz-error-message"><span data-dz-errormessage></span></div>
                                                                <div class="actions">
                                                                    <a href="#!" data-dz-remove class="delete-file confirm">
                                                                        <i class="fa fa-times"></i> حذف

                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>

                                    </div>
                                </div>



                            </div>

                            <div class="form-group">
                                <label> رابط فيديو يوتيوب:</label>
                                <input type="url" name="youtube" placeholder="قم باضافة رابط اليوتيوب" class="form-control " value="">
                            </div>
                            <div class="form-group">
                                <label>كلمات مفتاحية:</label>
                                <input type="text" name="tags" placeholder="مثال: تطوير مواقع, ووردبريس, تصميم" class="form-control " required="" value="">
                            </div>
                            <div class="form-group ">
                                <label>مدة التسليم:</label>
                                <p class="c-form__hb about-text">حدد مدة تسليم مناسبة لك. يستطيع المشتري إلغاء الخدمة
                                    مباشرة في حال التأخر بتسليم الخدمة في الموعد المحدد.</p>
                                <select class="form-control" name="duration" required="required">
                                    @foreach (config('duration') as $key => $duration)
                                    <option value="{{ $key }}">{{ $duration }}</option>
                                    @endforeach
                                </select>

                            </div>
                            <div class="form-group  ">
                                <label>تعليمات للمشتري: </label>
                                <p class="c-form__hb about-text">المعلومات التي تحتاجها من المشتري لتنفيذ الخدمة. تظهر
                                    هذه المعلومات بعد شراء الخدمة فقط.</p>
                                <textarea class="form-control" rows="5" required="required" name="instructions" placeholder="ادخل هنا"></textarea>
                            </div>

                            <div id="addons" class="addon-servivces">
                                <label>أضف تطويراً لهذه الخدمة:</label>


                            </div>

                            <div class="form-group">
                                <button type="button" id="add_addon" class="btn btn-primary btn-outline btn-custom float-right">
                                    <i class="fa fa-plus"></i>
                                    <span>أضف تطويراً لهذه الخدمة</span>
                                </button>
                            </div>
                            <div class="form-group text-left">
                                <button type="submit" class="text-center btn btn-primary btn-inline mr-2 btn-custom">أضف
                                    الخدمة</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@stop


@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.js"></script>

<script src="{{ asset('frontend/assets/js/plyr.min.js') }}" defer></script>

<script src="{{ asset('frontend/assets/js/recorder.js') }}" defer></script>

<script>
    $(document.body).on('click', '.remove', function() {
        $(this).parent().remove();
        var numItems = $('.addon-service-item').length;
        if (numItems == 0) {
            $("#addons").hide();
        }
    });
    $(document.body).on('click', '#add_addon', function() {
        $("#addons").show();
        $("#addons").append('<div class="bg-gray addon-service-item"> <button type="button" class="remove"><i class="fa fa-times"></i></button><div class="form-group "> <input type="text" name="addon_title[]" class="form-control " required value=""><p class="c-form__hb about-text"> <span>تطويرات الخدمة المقدمة اختيارية فقط ولا يمكن أن تجبر المشتري على طلبها. </span></p></div><div class="form-group"> <select name="addon_price[]" class="form-control" required="required"><option value="5">مقابل 5 دولار اضافة لسعر الخدمة</option><option value="10">مقابل 10 دولار اضافة لسعر الخدمة</option><option value="15">مقابل 15 دولار اضافة لسعر الخدمة</option><option value="20">مقابل 20 دولار اضافة لسعر الخدمة</option><option value="25">مقابل 25 دولار اضافة لسعر الخدمة</option><option value="30">مقابل 30 دولار اضافة لسعر الخدمة</option><option value="35">مقابل 35 دولار اضافة لسعر الخدمة</option><option value="40">مقابل 40 دولار اضافة لسعر الخدمة</option><option value="45">مقابل 45 دولار اضافة لسعر الخدمة</option><option value="50">مقابل 50 دولار اضافة لسعر الخدمة</option><option value="75">مقابل 75 دولار اضافة لسعر الخدمة</option><option value="100">مقابل 100 دولار اضافة لسعر الخدمة</option><option value="200">مقابل 200 دولار اضافة لسعر الخدمة</option> </select></div><div class="row"><div class="form-group col-md-6"> <select name="addon_type[]" class="form-control addont-type" required="required"><option value="1">سيزيد من مدة تنفيذ الخدمة</option><option value="2">لن يغيّر من مدة تنفيذ هذه الخدمة</option> </select></div><div class="form-group col-md-6"> <select class="form-control" name="addon_duration[]" required="required"><option value="1">يوم واحد</option><option value="2">يومين</option><option value="3">ثلاثة أيام</option><option value="4">أربعة أيام</option><option value="5">خمسة أيام</option><option value="6">ستة أيام</option><option value="7">أسبوع</option><option value="14">أسبوعين</option><option value="21">ثلاثة أسابيع</option><option value="30">شهر</option> </select></div></div></div>');
    });

    $("body").on('change', '.addont-type    ', function() {
        if ($(this).val() == 2) {
            $(this).parent().siblings(".col-md-6").hide();
        } else {
            $(this).parent().siblings(".col-md-6").show();
        }
    });

    //categoryAJax

    $('#category_id').on("change", function() {

        var category_id = $('#category_id').val();

        $("#sub_cat_id").html(" ");

        $.ajax({

            type: 'get',
             url: "{{ route('get-sub-category') }}",
              data: {
                'category_id': category_id
            }
            , success: function(data) {
                document.getElementById('sub_cat_id').innerHTML += '<option value="0" disabled="true" selected="true">اختر التصنيف الفرعي</option>';

                for (var i = 0; i < data.length; i++) {
                    document.getElementById('sub_cat_id').innerHTML += '<option value="' + data[i].id + '">' + data[i]['name'] + '</option>';
                }
            }
            , error: function() {}
        });

    });

</script>
@endsection
