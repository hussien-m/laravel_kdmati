@extends('layouts.dashboard.dashboard')

@section('styles')
@endsection

@section('content')

<div class="card">
    <div class="table-responsive">
        <table class="table">
            <thead>
                <th>#</th>
                <th>الاسم</th>
                <th>الحالة</th>
                <th>أنشئت في</th>
                <th>الخيارات</th>
            </thead>
            <tbody>
                @forelse($methods as $key => $method)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $method->name}}</td>
                    <td>{{ $method->status == 'active' ? 'مفعل':'غير مفعل' }}</td>
                    <td>{{ $method->created_at}}</td>
                    <td>
                        <div class="btn-group btn-group-md" id="tooltip-container">
                            <a href="{{ route('admin.payment-methods.edit',$method->id) }}" class="btn btn-primary"  data-bs-container="#tooltip-container" data-bs-toggle="tooltip" data-bs-placement="top" title="تعديل">
                                <i class="fa fa-edit"></i>
                            </a>

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

                @empty
                <tr>
                    <td colspan="6" align="center">
                        <h5>لاتوجد بوابات دفع متاحة</h5>
                        <a href="{{ route('admin.payment-methods.create') }}" class="btn btn-primary"  data-bs-container="#tooltip-container" data-bs-toggle="tooltip" data-bs-placement="top" title="أضف بوابة دفع">
                            أضف بوابة دفع جديدة
                        </a>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@stop

@section('scripts')
@endsection
