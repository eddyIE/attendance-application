@extends('layout')

@section('content')

    <div class="col-md-6">
        <!-- general form elements -->
        <div class="card card-gray">
            <div class="card-header">
                <h3 class="card-title font-weight-bold text-uppercase">Thông tin khóa học</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ route('store_course') }}" method="post">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Tên khóa học</label>
                        <input type="text" class="form-control" id="name" name="courseName" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="credit_hours">Tổng số giờ</label>
                        <input type="text" class="form-control" id="credit_hours" name="creditHours" autocomplete="off">
                    </div>
                    <div class="row">
                        <div class="col">
                            <!-- select -->
                            <div class="form-group">
                                <label>Lớp học</label>
                                <select class="form-control" name="class">
                                    @foreach($class as $each)
                                        <option value="{{ $each->id }}">{{ $each->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <!-- select -->
                            <div class="form-group">
                                <label>Môn học</label>
                                <select class="form-control" name="subject">
                                    @foreach($subject as $each)
                                        <option value="{{ $each->id }}">{{ $each->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <!-- select -->
                            <div class="form-group">
                                <label>Giảng viên</label>
                                <select class="form-control" name="lecturer">
                                    @foreach($lecturer as $each)
                                        <option value="{{ $each->id }}">{{ $each->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <!-- select -->
                            <div class="form-group">
                                <label>Trạng thái</label>
                                <select class="form-control" name="type">
                                    <option value="0">Giảng viên chính</option>
                                    <option value="1">Giảng viên phụ</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <input type="submit" class="btn btn-success" value="Hoàn tất">
                    <a href="{{ route('course') }}" class="btn btn-secondary">Quay lại</a>
                </div>
            </form>
        </div>
    </div>

@endsection
