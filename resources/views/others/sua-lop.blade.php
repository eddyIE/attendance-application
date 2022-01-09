<form action="{{route('sua_lop_xu_ly',['id' => $lop[0]->id])}}" method="post">
    @csrf
    <input type="hidden" value="{{$lop[0]->id}}" name="id">
    Tên lớp: <input type="text" name="ten_lop" value="{{$lop[0]->ten_lop}}"><br>
    <button>Sửa</button>
</form>