<a href="{{route('them-lop')}}">Thêm lớp</a>
<table border='1px' cellspacing="0" cellpadding="0" width="100%">
    <tr>
        <td>
            Mã lớp
        </td>
        <td>
            Tên lớp
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
                {{$each->ten_lop}}
            </td>
            <td>
                <a href="{{route('sua_lop',['id' => $each->id])}}">
                    Sửa
                </a>
            </td>
            <td>
                <a href="{{route('xoa_lop',['id' => $each->id])}}">
                    Xóa
                </a>
            </td>
        </tr>
    @endforeach
</table>