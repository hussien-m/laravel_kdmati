@foreach($users as $key=>$row)
<tr>
 <td>{{ $users->firstItem() +$key }}</td>
 <td>{{ $row->first_name.' '.$row->last_name  }}</td>
 <td>{!! ($row->status==1) ? '<div class="badge bg-success p-1">مفعل</div>' :'<div class="badge bg-danger p-1">غير مفعل</div>'  !!}</td>
 <td>{{ $row->email }}</td>
 <td>{{ $row->created_at }}</td>

 <td>
    <div class="btn-group btn-group-md">
        <a href="" class="btn btn-primary">
            <i class="fa fa-edit"></i>
        </a>

        <a href="" class="btn btn-success">
            <i class="fa fa-eye"></i>
        </a>
        <a href="javascript:void(0);" onclick="" class="btn btn-danger">
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
<tr>
 <td colspan="3" align="center">
  {!! $users->links() !!}
 </td>
</tr>
