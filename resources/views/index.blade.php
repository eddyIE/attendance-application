<html>

<head>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}" />
    <title>Trang chủ</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-theme.min.css') }}">
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
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Online Attendance</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="teacher.php">Dashboard</a></li>
                    <li><a href="profile.php">Profile</a></li>

                    <li><a href="statistics.php">Statistics</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="#contact">Contact</a></li>
                    <li><a href="logout.php">Logout</a></li>

                </ul>
            </div>
            <!--/.nav-collapse -->
        </div>
    </nav></br></br></br></br>


    <div class="container">
        {{-- #TODO: Truyền các thông tin tên gv, tên lớp vào đây --}}
        <?php
        echo '<h1>Welcome , Giao vien </h1>';
        echo '<h3>Class : BTEC-C01K11</h3>';
        echo '<h3>Number of Classes conducted : 10 </h3>';
        echo '<button class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-sm">Help me!</button>
                                                                         <button id="submit" class="btn btn-success">Send</button>';
        ?>
        <div id="studentRecords">
            <div class="student-record">
                <form action="" method="POST">
                    <table class="table">
                        @foreach ($list as $each)
                            <tr>
                                <td>
                                    <span class="roll"><a href="#">{{ $each->name }}</a></span>
                                </td>
                                <td>
                                    <span class="present"></span>
                                </td>
                                <td>
                                    <input type="radio" name="<?php echo($each->id)?>present" value="1" id="di_hoc">Đi học
                                </td>
                                <td>
                                    <input type="radio" name="<?php echo($each->id)?>present" value="no reason" id="no_reason">Nghỉ
                                </td>
                                <td>
                                    <input type="radio" name="<?php echo($each->id)?>present" value="late" id="with_reason">Muộn
                                </td>
                                <td>
                                    <input type="radio" name="<?php echo($each->id)?>present" value="with reason" id="late">Có phép
                                </td>
                                {{-- <button class="marker btn">A</button>
                                <button class="btn btn-danger delete-roll" data-toggle="modal"
                                    data-target=".delete-warning">&times;</button> --}}
                            </tr>
                        @endforeach
                    </table>
                </form>
            </div>
        </div>
        <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <h2 class="text-center"> Instructions </h2>
                    <hr>
                    <ol class="text-left">
                        <li>Click on any student's roll number to see his/her records, attendance percentage etc.</li>
                        <li>The number next to any student shows the number of days he/she has attended your class</li>
                        <li>Click the <button class="btn">A</button> button next to that roll number to mark
                            that student as present</li>
                        <li>Click the <button class="btn btn-success">P</button> button if you have accidentally marked
                            that student as present</li>
                        <li>Click the <button class="btn btn-danger">&times;</button> button to delete that roll number
                            (can't undo this action)</li>
                        <li>Click the <button class="btn btn-success">Send</button> button at top to save your
                            attendance details</li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="modal fade delete-warning" tabindex="-1" role="dialog" aria-labelledby="delete-warning"
            aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <h2 class="text-center"> Do you really want to delete <span class="warning-roll"></span> ?</h2>
                    <hr>
                    <div class="text-center">
                        <p>
                            Are you sure you want to delete <span class="warning-roll"></span> ? <br>
                            You can't undo this action.
                        </p>
                        <button class="btn btn-danger delete-rollnumber">Delete</button> <button class="btn btn-primary"
                            onclick="$('.delete-warning').modal('hide');">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
