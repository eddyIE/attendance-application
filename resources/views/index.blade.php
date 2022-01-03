@extends('layout')

@section('content')

    {{--#TODO: Truyền các thông tin tên gv, tên lớp vào đây--}}
    <h2>Chào mừng, {{ session('name') }} </h2>
    <h3>Lớp: BTEC-C01K11</h3>
    <h4>Tổng số giờ: 10 </h4>
    <h4>Số giờ còn lại: 10 </h4>
    <br>
    <form action="#" method="POST">
        <table class="table table-striped align-middle table-bordered">
            <tr class="bg-dark">
                <th td class="text-center fs-5 text-white border-0">STT</th>
                <th class="fs-5 text-white border-0">Tên sinh viên</th>
                <th td class="text-center fs-5 text-white border-0" colspan="4">Điểm danh</th>
                <th class="fs-5 text-white border-0">Ghi chú</th>
            </tr>
            @foreach ($list as $each)
                <tr>
                    <td class="text-center border-0">{{ $loop->index + 1 }}</td>
                    <td class="border-0">
                        <span class="roll fw-bolder"><a href="#">{{ $each->name }}</a></span>
                        <br>
                        <span class="roll fw-lighter fst-italic">({{ $each->birth }})</span>
                    </td>
                    <td class="text-center border-0">
                        <input type="radio" class="btn-check" name="{{ $each->id }}present"
                               value="" id="{{ $each->id }}present" checked>
                        <label class="btn btn-outline-success" for="{{ $each->id }}present">
                            Có mặt
                        </label>
                    </td>
                    <td class="text-center border-0">
                        <input type="radio" class="btn-check" name="{{ $each->id }}present"
                               value="no_reason" id="{{ $each->id }}no_reason">
                        <label class="btn btn-outline-danger" for="{{ $each->id }}no_reason">
                            Nghỉ
                        </label>

                    </td>
                    <td class="text-center border-0">
                        <input type="radio" class="btn-check" name="{{ $each->id }}present"
                               value="late" id="{{ $each->id }}late">
                        <label class="btn btn-outline-dark" for="{{ $each->id }}late">
                            Muộn
                        </label>
                    </td>
                    <td class="text-center border-0">
                        <input type="radio" class="btn-check" name="{{ $each->id }}present"
                               id="{{ $each->id }}with_reason" autocomplete="off">
                        <label class="btn btn-outline-primary" for="{{ $each->id }}with_reason">
                            Có phép
                        </label>
                    </td>
                    <td class="border-0">
                        <input type="text" class="form-control" name="absent_reason" id="absent_reason"
                               placeholder="Lý do nghỉ (nếu có)">
                    </td>
                </tr>
            @endforeach
        </table>
        <button id="submit" class="btn btn-success" type="submit">Lưu điểm danh</button>
    </form>

@endsection
