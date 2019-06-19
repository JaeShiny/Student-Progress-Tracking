@extends('bar.body')
@section('content')

<!DOCTYPE html>
<html>

<head>
    <title>เพิ่มไฟล์</title>
    <link rel="stylesheet" href="csste.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-grid.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-reboot.css">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <li class="breadcrumb-item" aria-current="page"><a href="{{ url('course') }}">วิชาที่สอน</a></li>
            <li class="breadcrumb-item" aria-current="page"><a href="">เพิ่มไฟล์</a></li>
        </ol>

    </nav>
</head>

<body>

    <h6>&nbsp;&nbsp;&nbsp;{{$course->course_id}}:&nbsp;{{$course->course_name_eng}}</h6><br>

<div class="row">

    <div class="col-3" style="background-color: #FFFFFF;">

        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">เพิ่มการเข้าเรียน</a>
            <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">ดูการเข้าเรียน</a>
            <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">เพิ่มผลการเรียน</a>
            <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile2" role="tab" aria-controls="v-pills-profile" aria-selected="false">ดูผลการเรียน</a>
        </div>
    </div>

    <div class="col-8" style="background-color: #FFFFF0;">
        <div class="tab-content" id="v-pills-tabContent">
            <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">

                <div class="container">
                    <div class="card bg-light mt-3">
                        <div class="card-header">
                            เพิ่มการเข้าเรียน
                        </div>
                        <div class="card-body">
                            <form action="/import/{{$course->course_id}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="course_id" value="{{$course->course_id}}">
                                <input type="file" name="file" class="form-control">
                                <br>
                                <button class="btn btn-success">เพิ่มการเข้าเรียน</button>
                                <a class="btn btn-warning" href="{{ route('export') }}">Export การเข้าเรียน</a>
                            </form>

                        </div>
                    </div>
                </div>

            </div>
            <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">

                    <div class="container"><center>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                      <th>รหัสวิชา</th>
                                      <th>รหัสนักศึกษา</th>
                                      {{-- <th>ชื่อ-สกุล</th> --}}
                                      <th>จำนวนชั่วโมงเรียน</th>
                                      <th>จำนวนการขาดเรียน</th>
                                      <th>จำนวนการลา</th>
                                    </tr>
                                </thead>
                                @foreach($student as $show_student)
                                <tbody>
                                    <tr>
                                      <td>{{$show_student->course_id}}</td>
                                      <td>{{$show_student->student_id}}</td>
                                      {{-- <td>{{$show_student->id->name}} &nbsp;&nbsp; {{$show_student->id->last_name}}</td> --}}
                                      <td>{{$show_student->amount_attendance}}</td>
                                      <td>{{$show_student->amount_absence}}</td>
                                      <td>{{$show_student->amount_takeleave}}</td>
                                    </tr>
                                </tbody>
                                @endforeach
                            </table></center>
                        </div>

            </div>
            <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">

                <div class="container">
                    <div class="card bg-light mt-3">
                        <div class="card-header">
                            เพิ่มผลการเรียน
                        </div>
                        <div class="card-body">
                            <form action="/import/{{$course->course_id}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="course_id" value="{{$course->course_id}}">
                                <input type="file" name="file" class="form-control">
                                <br>
                                <button class="btn btn-success">เพิ่มผลการเรียน</button>
                                <a class="btn btn-warning" href="{{ route('export') }}">Export ผลการเรียน</a>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
            <div class="tab-pane fade" id="v-pills-profile2" role="tabpanel" aria-labelledby="v-pills-profile-tab">

                <center>
                    <table class="table table-hover">
                        <thead>
                            <tr align="center">
                                <th scope="col">รหัสนักศึกษา</th>
                                <th scope="col">คะแนนเก็บ</th>
                                <th scope="col">คะแนนกลางภาค</th>
                                <th scope="col">คะแนนปลายภาค</th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr align="center">
                                <th scope="row">59130500001</th>
                                <td>10</a>
                                </td>
                                <td>20</td>
                                <td>30</td>

                            </tr>

                        </tbody>
                    </table>

                    <br>
                    <br>
                    <br>

                </center>

            </div>
        </div>
    </div>
</div>




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>

@endsection
@extends('bar.header(lec)')
