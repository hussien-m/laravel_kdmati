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
                <th>الاسم</th>
                <th>الوصف</th>
                <th>الترتيب</th>
                <th>الحالة</th>
                <th>التصنيفات الفرعية</th>
                <th>الخيارات</th>
            </thead>
            <tbody>
                @foreach($categories as $key => $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td><a class="image-popup-no-margins" href="{{asset($category->image)}}">
                        <img class="img-fluid rounded img-thumbnail" alt="" src="{{asset($category->image)}}" width="90">
                    </a></td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->description }}</td>
                    <td>{{ $category->sort }}</td>
                    <td>{!! ($category->status == 1)? "<div class='badge bg-success p-1'>مفعل</div>":"<div class='badge bg-danger p-1'>غير مفعل</div>" !!}</td>
                    <td>{{ $category->parent()->count() }}</td>
                    <td>
                        <div class="btn-group btn-group-md" id="tooltip-container">
                            <a href="" class="btn btn-primary"  data-bs-container="#tooltip-container" data-bs-toggle="tooltip" data-bs-placement="top" title="تعديل">
                                <i class="fa fa-edit"></i>
                            </a>

                            <a href="" class="btn btn-success" data-bs-container="#tooltip-container" data-bs-toggle="tooltip" data-bs-placement="top" title="عرض">
                                <i class="fa fa-eye"></i>
                            </a>
                            <a href="{{ route('admin.sub.category',$category->slug) }}" onclick="" class="btn btn-info"  data-bs-container="#tooltip-container" data-bs-toggle="tooltip" data-bs-placement="top" title="التصنيفات الفرعية">
                                <i class="fa fa-list"></i>
                            </a>
                            <a href="javascript:void(0);" onclick="" class="btn btn-primary"  data-bs-container="#tooltip-container" data-bs-toggle="tooltip" data-bs-placement="top" title="تعطيل">
                                <i class="mdi mdi-thumb-down font-20"></i>
                            </a>
                            <a href="javascript:void(0);" onclick="" class="btn btn-danger"  data-bs-container="#tooltip-container" data-bs-toggle="tooltip" data-bs-placement="top" title="حذف">
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
