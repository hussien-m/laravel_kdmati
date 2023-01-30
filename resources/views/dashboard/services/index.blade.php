@extends('layouts.dashboard.dashboard')

@section('styles')
<link href="{{asset('dashboard/assets/libs/magnific-popup/magnific-popup.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')

<div class="card p-4">
    <form action="javascript:void(0)" method="get">
        <div class="row">
            <div class="col-md-8 col-sm-12">
                <div class="form-group">
                    <input type="text" name="serach" id="serach" class="txtSearch form-control" placeholder="عبارة البحث">
                </div>
            </div>
        </div>
    </form>
</div>
<div class="card">
    <div class="table-responsive">
        <table class="table">
            <thead>
                <th>#</th>
                <th>الصورة</th>
                <th>صاحب الخدمة</th>
                <th>العنوان</th>
                <th>القسم</th>
                <th>القسم الفرعي</th>
                <th>الحالة</th>
                <th>أنشئت في</th>
                <th>الخيارات</th>
            </thead>
            <tbody>
                @foreach($services as $key => $service)
                @php
                    $image = explode(',',$service->images)
                @endphp
                <tr>
                    <td>{{ $service->id }}</td>
                    <td><a class="image-popup-no-margins" href="{{asset("upload/images/".$image[0])}}">
                        <img class="img-fluid rounded img-thumbnail" alt="" src="{{asset("upload/images/".$image[0])}}" width="90">
                    </a></td>
                    <td>{{ $service->user->first_name .' '.$service->user->last_name }}</td>
                    <td>{{ $service->title }}</td>
                    <td>{{ $service->category->name }}</td>
                    <td>{{ $service->subCategory->name }}</td>
                    <td>{!! ($service->status == 1)? "<div class='badge bg-success p-1'>مفعل</div>":"<div class='badge bg-danger p-1'>غير مفعل</div>" !!}</td>
                    <td>{{ $service->created_at}}</td>
                    <td>
                        <div class="btn-group btn-group-md" id="tooltip-container">
                            <a href="" class="btn btn-primary"  data-bs-container="#tooltip-container" data-bs-toggle="tooltip" data-bs-placement="top" title="تعديل">
                                <i class="fa fa-edit"></i>
                            </a>

                            <a href="" class="btn btn-success" data-bs-container="#tooltip-container" data-bs-toggle="tooltip" data-bs-placement="top" title="عرض">
                                <i class="fa fa-eye"></i>
                            </a>
                                @if($service->status == 0)
                                    <a href="{{ route("admin.service.activate",$service->id) }}" onclick="" class="btn btn-primary"  data-bs-container="#tooltip-container" data-bs-toggle="tooltip" data-bs-placement="top" title="تفعيل">
                                        <i class="mdi mdi-thumb-up font-20"></i>
                                    </a>
                                @else
                                <a href="{{ route("admin.service.deActivate",$service->id) }}" onclick="" class="btn btn-danger"  data-bs-container="#tooltip-container" data-bs-toggle="tooltip" data-bs-placement="top" title="تعطيل">
                                    <i class="mdi mdi-thumb-down font-20"></i>
                                </a>
                                @endif


                                <a href="javascript:void(0);" data-id="#" data-name="#" class="btn btn-dark del"  data-bs-container="#tooltip-container" data-bs-toggle="tooltip" data-bs-placement="top" title="حذف">
                                    <i class="fa fa-trash"></i>
                                </a>
                        </div>
                        <form action="" method="post" id="" class="d-none">
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>
                </tr>

                @endforeach
            </tbody>
        </table>
    </div>
</div>

@stop

@section('scripts')
        <!-- Magnific Popup-->
        <script src="{{asset('dashboard/assets/libs/magnific-popup/jquery.magnific-popup.min.js')}}"></script>

        <!-- Tour init js-->
        <script src="{{asset('dashboard/assets/js/pages/lightbox.init.js')}}"></script>
@endsection
