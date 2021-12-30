<html>

<head>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}" />
    <title>Trang chủ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <!-- Custom styles for this template -->
    <link href="{{ asset('css/navbar-fixed-top.css') }}" rel="stylesheet">
    {{-- <script>
    var numberOfDays = <?php echo $node->getDays(); ?>;
    var class_id = <?php echo $class_id; ?>;
    var teacher_id = <?php echo $teacher_id; ?>;
  </script> --}}
    <script src="{{ asset('js/take.js') }}"></script>
</head>

<body>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-expand-sm bg-dark">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand text-uppercase text-white fw-bold fs-1" href="index">Hệ thống điểm danh</a>
            </div>
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link text-white fs-5" href="#">Dashboard</a></li>
                <li class="nav-item"><a class="nav-link text-white fs-5" href="#">Profile</a></li>
                <li class="nav-item"><a class="nav-link text-white fs-5" href="#">Statistics</a></li>
                <li class="nav-item"><a class="nav-link text-white fs-5" href="#">About</a></li>
                <li class="nav-item"><a class="nav-link text-white fs-5" href="#">Contact</a></li>
                <li class="nav-item"><a class="nav-link text-white fs-5" href="#">Logout</a></li>
            </ul>
        </div>
    </nav></br><br>


    <div class="container">

        {{-- #TODO: Truyền các thông tin tên gv, tên lớp vào đây --}}
        <h2>Chào mừng, giảng viên </h2>
        <h3>Lớp: BTEC-C01K11</h3>
        <h4>Tổng số giờ: 10 </h4>
        <h4>Số giờ còn lại: 10 </h4>
        <br>
        <form action="{{ route('create') }}" method="POST">
            @csrf
            <div id="studentRecords">
                <div class="student-record">
                    <table class="table table-striped align-middle table-bordered">
                        <tr class="bg-dark">
                            <th td class="text-center fs-5 text-white">STT</th>
                            <th class="fs-5 text-white">Tên sinh viên</th>
                            <th td class="text-center fs-5 text-white" colspan="4">Điểm danh</th>
                            <th class="fs-5 text-white">Ghi chú</th>
                        </tr>
                        @foreach ($list as $each)
                            <tr>
                                <input type="hidden" name="students[{{ $loop->index + 1 }}][student_id]"
                                    value="{{ $each->id }}" />
                                <td class="text-center">{{ $loop->index + 1 }}</td>
                                <td class="">
                                    <span class="roll fw-bolder"><a href="#">{{ $each->name }}</a></span>
                                    <span class="text-danger fw-bold">({{ $each->absents }}/5)</span>
                                    <span class="fw-bold fst-italic"> - P:{{ $each->permission }}</span>
                                    <br>
                                    <span class="roll fw-lighter fst-italic">({{ $each->birthdate }})</span>
                                </td>
                                <td class="text-center">
                                    <input type="radio" class="btn-check"
                                        name="students[{{ $loop->index + 1 }}][status]" value=""
                                        id="<?php echo $each->id; ?>_status" checked>
                                    <label class="btn btn-outline-success" for="<?php echo $each->id; ?>_status">
                                        Có mặt
                                    </label>
                                </td>
                                <td class="text-center">
                                    <input type="radio" class="btn-check"
                                        name="students[{{ $loop->index + 1 }}][status]" value="without reason"
                                        id="<?php echo $each->id; ?>no_reason">
                                    <label class="btn btn-outline-danger" for="<?php echo $each->id; ?>no_reason">
                                        Nghỉ
                                    </label>

                                </td>
                                <td class="text-center">
                                    <input type="radio" class="btn-check"
                                        name="students[{{ $loop->index + 1 }}][status]" value="late"
                                        id="<?php echo $each->id; ?>late">
                                    <label class="btn btn-outline-dark" for="<?php echo $each->id; ?>late">
                                        Muộn
                                    </label>
                                </td>
                                <td class="text-center">
                                    <input type="radio" class="btn-check"
                                        name="students[{{ $loop->index + 1 }}][status]"
                                        id="<?php echo $each->id; ?>with_reason" autocomplete="off" value="with reason">
                                    <label class="btn btn-outline-primary" for="<?php echo $each->id; ?>with_reason">
                                        Có phép
                                    </label>
                                </td>
                                <td>
                                    <input type="text" class="form-control"
                                        name="students[{{ $loop->index + 1 }}][absent_reason]"
                                        id="<?php echo $each->id; ?>_absent_reason" placeholder="Lý do nghỉ (nếu có)">
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
            <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <h2 class="text-center"> Instructions </h2>
                        <hr>
                        <ol class="text-left">
                            <li>Click on any student's roll number to see his/her records, attendance percentage etc.
                            </li>
                            <li>The number next to any student shows the number of days he/she has attended your class
                            </li>
                            <li>Click the <button class="btn">A</button> button next to that roll number to
                                mark
                                that student as present</li>
                            <li>Click the <button class="btn btn-success">P</button> button if you have accidentally
                                marked
                                that student as present</li>
                            <li>Click the <button class="btn btn-danger">&times;</button> button to delete that roll
                                number
                                (can't undo this action)</li>
                            <li>Click the <button class="btn btn-success">Send</button> button at top to save your
                                attendance details</li>
                        </ol>
                    </div>
                </div>
            </div>
            <br>
            Giờ bắt đầu:
            <input type="time" class="timepicker" id="start" name="start" min="06:00" max="23:00" required>
            Giờ kết thúc:
            <input type="time" class="timepicker" id="end" name="end" min="06:00" max="23:00" required>
            <br>
            <br>
            <textarea class="form-control" placeholder="Ghi chú:" rows="3"></textarea>
            <br>
            <br>
            <button class="btn btn-primary" data-toggle="modal" data-target="bs-example-modal-sm">Hỗ trợ</button>
            <button id="submit" class="btn btn-success" type="submit">Lưu điểm danh</button>
        </form>
    </div>
</body>

</html>
