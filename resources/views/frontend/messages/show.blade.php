@extends('layouts.frontend.front-app')
@section('styles')
    <!--dropzone.min.css-->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/dropzone.min.css') }}" async:true>

    <!--plyr.css-->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/plyr.min.css') }}" defer  async>
@endsection

@section('content')
   <section id="subject-header" class="login subject-header ">
        <div class="container mt-2">
            <div class="row">
                <div class="col-md-9 col-lg-9">
                    <div class="media comment-item-user">
                        <a href="#"><img src="https://kdmati.com/admin/uploads/18799420301655485487.png"
                                class="mr-3 subject-item-image" alt="Khaled Fozan"></a>
                        <div class="media-body">
                            <h1 class="subject-title">{{ $service->title }}</h1>
                            <p class="subject-meta"><a class="user" href="#"><i
                                        class="fa fa-fw fa-user"></i> {{ $service->user->first_name.' '.$service->user->last_name }} </a> <i class="far fa-clock fa-fw"></i> آخر
                                تفاعل : منذ 3 ساعة</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 text-right">
                    <a href="{{ route('service.show',$service->slug) }}"
                        class="btn btn-primary form-button"><i class="fa fa-eye"></i> شاهد الخدمة</a>
                </div>
            </div>
        </div>
    </section>
    <section id="subject-body" class="login  ">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-12  ">
                    <div class="card  subject-card subject-comments-card" id="review-list">

                            <livewire:frontend.show-messages :conversation_id="$conversation->id"/>



                        <div class="card-footer service-footer">
                            <div id="respond" style="display: none;"></div>
                            <form method="POST"  enctype="multipart/form-data" class="message-form"
                                id="message-form">
                                <input id="conversation_id" name="conversation_id" type="hidden" value="{{ $conversation->id ?? old('conversation_id') }}">

                                <input id="files" name="files" type="hidden" value="">
                                <input type="hidden" name="record" id="record-input" value="">
                                <div class="form-group  ">
                                    <textarea class="form-control" rows="5" name="message" placeholder="" id="message"></textarea>
                                </div>
                                <div class="form-group">
                                    <button type="button" data-toggle="collapse" href="#fileAccordion" role="button" aria-expanded="false" aria-controls="fileAccordion" class="btn btn-default btn-sm  action-btn"><i class="fa fa-paperclip"></i> <span> أرفق ملفات</span></button>
                                    <button type="button" data-toggle="collapse" href="#audioAccordion" role="button" aria-expanded="false" aria-controls="audioAccordion" class="btn btn-default btn-sm  action-btn"><i class="fa fa-microphone"></i> <span> أضف رسالة صوتية</span></button>


                                            <div class="collapse multi-collapse mt-2" id="fileAccordion" style="height: 128px;">
                                                <div class="card card-body  file-card-body">
                                                   <div class="inner-page">
                                                      <div class="uploader-container">
                                                         <div action="{{ route("image.upload") }}" class="dropzone2">
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
                                                               <p class="mt-2 record-title" style="font-size:14px"> اسحب الملفات هنا
                                                               </p>
                                                               <p class="record-description"  style="font-size:14px">أو انقر للاختيار يدويا</p>
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
                                                                        <span class="text-primary"><i class="far fa-check-circle"></i></span>
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

                                    <div class="collapse multi-collapse" id="audioAccordion">
                                        <div class="card card-body audio-card-body">
                                            <div class="media recorder">
                                                <div class="align-self-center mr-2 recorder-btn-container"
                                                    id="record-btn">
                                                    <div class="record-icon">
                                                        <i class="fa fa-fw fa-microphone"></i>
                                                    </div>
                                                </div>
                                                <div class="media-body record-body">
                                                    <h5 class="mt-2 record-title"><span id="title-inner"
                                                            style="font-size:14px">اضغط على الميكروفون لتبدأ التسجيل
                                                        </span> <span class="float-right">
                                                            <a class="btn btn-danger btn-sm delete-record confirm"
                                                                id="delete-record">
                                                                <i class="fa fa-times"></i> حذف
                                                            </a>
                                                        </span>
                                                    </h5>
                                                    <p class="record-description" style="font-size:14px">ستتمكن من مراجعة
                                                        الرسالة قبل إرسالها</p>
                                                </div>
                                            </div>
                                            <div class="playlist">
                                                <div class="plyr" id="recordingsList">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group text-left">
                                    <button  type="button" href="#" id="submit-btn"
                                        class="text-center btn btn-primary form-button">أرسل</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card  subject-card comment-form-card">
                        <div class="card-header form-card-header">
                            <h2 class="card-header-title text-danger">ملاحظات هامة لحماية حسابك</h2>
                        </div>
                        <div class="card-body p-lg-3">
                            <div class="pre instructions">- الحفاظ على معلومات وبياناتك الشخصية مسؤوليتك وعليك الانتباه إلى
                                أدق التفاصيل.
                                - بيانات تسجيل الدخول وحساباتك المالية يجب أن تظل قيد السرية ولا يعرفها أي شخص.
                                - في حالة مخالفة التعليمات وأرسلت أي معلومات تخصك تقع نتيجة ذلك على مسؤوليتك.</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop

@section('scripts')

<script defer>

$(function() {
    $('#submit-btn').on('click',function(){
        var message = $("#message").val();
        var record =  $("#record-input").val();
        var files =   $("#files").val();
        var conversation_id = $("#conversation_id").val();

        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': "{{ csrf_token() }}"
        }
    });
        $.ajax({

          url:"{{ route('sendMessageNow') }}",
          'type':"POST",
          'dataType':'json',
          data:{

                _token: "{{ csrf_token() }}",
                message: message,
                record: record,
                files : files,
                conversation_id: conversation_id,

          },success: function(data){
            Livewire.emit('updateMessages');
            //Livewire.emit('test');
            $("#message").val(" ");
            $(".action-btn").addClass("collapsed");
            $(".multi-collapse").removeClass("show");
            $("#previews,#recordingsList").html("");
          },
        });

    });
});


</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.js" defer async></script>

<script src="{{ asset('frontend/assets/js/plyr.min.js') }}" defer async></script>

<script src="{{ asset('frontend/assets/js/recorder.js') }}" defer async></script>

<script src="{{ asset('frontend/assets/js/app.js?v=4') }}" defer async></script>
@endsection
