@extends('layouts.frontend.front-app')
@section('styles')
@endsection

@section('content')


    <section id="subject-header" class="login subject-header d-none">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-12">
                    <div class="media comment-item-user">
                        <a href="#"><img src="https://kdmati.com/admin/uploads/18799420301655485487.png"
                                class="mr-3 subject-item-image"
                                alt="{{ $service->user->first_name . ' ' . $service->user->last_name }}"></a>
                        <div class="media-body">
                            <h1 class="subject-title">رسالة جديدة
                                إلى:{{ $service->user->first_name . ' ' . $service->user->last_name }}</h1>
                            <p class="subject-meta"><i class="fa fa-cube"></i> الخدمة: جيست بوست في مواقع عملاقة لكسب باك
                                لينك </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="page" class="page half-white">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-12 mx-auto ">
                    <h1 class="page-title mt-0">رسالة جديدة
                        إلى:{{ $service->user->first_name . ' ' . $service->user->last_name }}</h1>

                    <div class="card  new-card">
                        <div class="card-body p-4">

                            <form id="edit_user_register" class="login-form" name="registerform"
                                action="{{ route('user.sendMessage') }}" method="post" enctype="multipart/form-data">
                               @csrf
                               <input type="hidden" name="receiver_id" value="{{ $service->user->id }}" />
                               <input type="hidden" name="sender_id" value="{{ Auth::user()->id }}" />
                               <input type="hidden" name="service_id" value="{{ $service->id }}" />
                                <div class="form-group  ">
                                    <label>محتوى الرسالة: </label>
                                    <textarea class="form-control" rows="5" name="message" required="required" placeholder=""></textarea>
                                    <p class="c-form__hb about-text">
                                        اسأل مقدم الخدمة ما تريد معرفته عن هذه الخدمة. يمنع وضع وسائل تواصل خارجية.
                                    </p>
                                </div>
                                <div class="u-margin-bottom u-checkbox form-check">
                                    <label for="confirm">
                                        <input name="confirm" id="confirm" type="checkbox" value="0"
                                            required="required">
                                        <span>هذه الرسالة لا تحتوي على وسائل تواصل خارجية وأرسلها لأني أرغب بشراء الخدمة
                                            المعروضة.</span>
                                    </label>
                                </div>
                                <div class="u-margin-bottom u-checkbox form-check">
                                    <label for="confirm2">
                                        <input name="confirm2" required="required" id="confirm2" type="checkbox"
                                            value="0">
                                        <span>لقد راجعت </span>
                                        <a href="https://kdmati.com/page/terms" target="_blank" class="u-clr--primary">شروط
                                            موقع خدماتي</a>
                                        <span>وهذه الرسالة لا تخالفها بشيء.</span>
                                    </label>
                                </div>
                                <div class="form-group text-left">
                                    <button type="submit" class="text-center btn btn-primary btn-inline mr-2 ">أرسل
                                        الرسالة</button>
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


@endsection
