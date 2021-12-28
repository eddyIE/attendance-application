{{-- <a href="{{route('subject/add')}}">Thêm môn học</a> --}}
<table cellspacing="0" cellpadding="0" width="100%">
    <tr>
        <td>
            Mã môn
        </td>
        <td>
            Tên môn học
        </td>
        <td></td>
        <td></td>
    </tr>
    @foreach($list as $each)
        <tr>
            <td>
                {{$each->id}}
            </td>
            <td>
                {{$each->name}}
            </td>
            <td>
                {{-- <a href="{{route('subject/update',['id' => $each->id])}}"> --}}
                    Sửa
                {{-- </a> --}}
            </td>
            <td>
                {{-- <a href="{{route('subject/delete',['id' => $each->id])}}"> --}}
                    Xóa
                {{-- </a> --}}
            </td>
        </tr>
    @endforeach
</table>