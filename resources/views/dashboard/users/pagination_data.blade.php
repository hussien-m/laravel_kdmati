@if ($users->count() > 0)
    @foreach ($users as $key => $row)
        <tr id="{{$row->id}}">

            <td>{{ $users->firstItem() + $key }}</td>
            <td>{{ $row->first_name . ' ' . $row->last_name }}</td>
            <td>{!! $row->status == 1
                ? '<div class="badge bg-success p-1">مفعل</div>'
                : '<div class="badge bg-danger p-1">غير مفعل</div>' !!}</td>
            <td>{{ $row->email }}</td>
            <td>{{ $row->created_at }}</td>

            <td>
                <div class="btn-group btn-group-md" id="tooltip-container">
                    <a href="" class="btn btn-primary"  data-bs-container="#tooltip-container" data-bs-toggle="tooltip" data-bs-placement="top" title="تعديل">
                        <i class="fa fa-edit"></i>
                    </a>

                    <a href="" class="btn btn-success" data-bs-container="#tooltip-container" data-bs-toggle="tooltip" data-bs-placement="top" title="عرض">
                        <i class="fa fa-eye"></i>
                    </a>
                        @if($row->status == 0)
                            <a href="{{ route('admin.user.activate',$row->id) }}" onclick="" class="btn btn-primary"  data-bs-container="#tooltip-container" data-bs-toggle="tooltip" data-bs-placement="top" title="تفعيل">
                                <i class="mdi mdi-thumb-up font-20"></i>
                            </a>
                        @else
                        <a href="{{ route('admin.user.deActivate',$row->id) }}" onclick="" class="btn btn-danger"  data-bs-container="#tooltip-container" data-bs-toggle="tooltip" data-bs-placement="top" title="تعطيل">
                            <i class="mdi mdi-thumb-down font-20"></i>
                        </a>
                        @endif


                        <a href="javascript:void(0);" data-id="{{ $row->id }}" data-name="{{$row->first_name}}" class="btn btn-dark del"  data-bs-container="#tooltip-container" data-bs-toggle="tooltip" data-bs-placement="top" title="حذف">
                            <i class="fa fa-trash"></i>
                        </a>
                </div>
                <form action="javascript:void(0)" method="post" id="delete-customer-{{ $row->id }}" class="d-none">
                    @csrf
                    @method('DELETE')
                </form>
            </td>

        </tr>
    @endforeach
@else
    <td colspan="6" align="center">لايوجد نتائج</td>
@endif
<tr>
    @if ($users->count() > 0)
        <td colspan="3" align="center"> {!! $users->links() !!}</td>
    @endif
</tr>



