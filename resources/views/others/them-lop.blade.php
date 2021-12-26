<form action="{{route('them_lop_xu_ly')}}" method="post">
    @csrf
    Tên lớp: <input type="text" name="ten_lop"><br>
    <button>Thêm</button>
</form>