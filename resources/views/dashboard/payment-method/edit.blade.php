@extends('layouts.dashboard.dashboard')

@section('styles')
@endsection

@section('content')
    <div class="card">

        <div class="card-body">
            <form method="post" action="{{ route('admin.payment-methods.update',$method->id) }}">
                @csrf
                @method('PUT')
                <fieldset class="fieldset">
                    <legend>المعلومات الاساسية</legend>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label for="name" class="form-label">إسم البوابة</label>
                                <input type="text" name="name" id="name" class="form-control" value="{{ $method->name ?? old('name') }}">
                            </div>
                        </div> <!-- end col -->
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label for="status" class="form-label">الحالة</label>
                                <select class="form-control" name="status">
                                    <option value="active"   {{ $method->status == 'active'? 'selected':'' }} >مفعل</option>
                                    <option value="inactive" {{ $method->status == 'inactive'? 'selected':'' }}  >غير مفعل</option>
                                </select>
                            </div>
                        </div> <!-- end col -->
                    </div>
                </fieldset>

                @if($options)
                    <fieldset class="fieldset">
                        <legend>الاعدادات</legend>
                        <div class="row">

                            @foreach($options as $key=>$option)
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">{{ $option['label'] }}</label>
                                        <input type="text" name="options[{{ $key }}]" id="{{ $key }}" class="form-control" value="{{ $method->options[$key] ?? old('name') }}">
                                    </div>
                                </div> <!-- end col -->
                            @endforeach


                        </div>
                    </fieldset>
                @endif

                <div class="row">
                    <div class="col-lg-12">
                        <button type="submit" class="btn btn-primary">تعديل</button>
                    </div> <!-- end col -->
                </div>
            <!-- end row-->
            </form>
        </div>

    </div>


@stop

@section('scripts')
@endsection
