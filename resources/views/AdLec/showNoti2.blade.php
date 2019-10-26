@extends('bar.body') @section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>การแจ้งเตือน</title>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li> </li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <li class="breadcrumb-item active" aria-current="page"><a href="{{ url('indexNoti') }}">การแจ้งเตือน</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="{{ url('subjectNotiAL2') }}">การแจ้งเตือนตามวิชา</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="" name="mode">วิชา: {{$course->course_id}}</a></li>
        </ol>
    </nav>

</head>

<body>
    {{--
    <h3 align='center'>การแจ้งเตือน</h3>
    <br> --}}
    <h5 align='center'>{{$course->course_id}}</h5>
    <h6 align='center'>{{$course->course_name_eng}}</h6>
    <br>

    <div class="container">
        <div class="row">

            <div class="col-sm-4">

                <div class="card mb-3" style="max-width: 400px;box-shadow: 5px 5px 8px 4px rgba(50, 50, 50, .5); ">
                    <div class="row no-gutters">
                        <div class="col-md-4">

                            <img src="../img/feedback.png" class="card-img" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">

                                <b> <p class="card-text">
                                                การแจ้งเตือน
                                            </p></b> {{--
                                <h5 class="card-title">การแจ้งเตือนพฤติกรรมและปัญหา</h5>--}}
                                <p class="card-text">
                                    <button type="button" class="btn btn-danger" data-toggle="modal">
                                        <a href="#exampleModal1" style="text-decoration-line: none;color: white"> พฤติกรรมและปัญหา&nbsp;&nbsp;</a>
                                        <span class="badge badge-light">
                                                <p>{{$riskproblem}}</p>
                                            </span>
                                    </button>
                                </p>

                                {{--
                                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>--}}
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-sm">

                <div class="card mb-3" style="max-width: 400px;box-shadow: 5px 5px 8px 4px rgba(50, 50, 50, .5); ">
                    <div class="row no-gutters">
                        <div class="col-md-4">

                            <img src="../img/feedback.png" class="card-img" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">

                                <b> <p class="card-text">
                                                การแจ้งเตือน
                                            </p></b> {{--
                                <h5 class="card-title">การแจ้งเตือนพฤติกรรมและปัญหา</h5>--}}
                                <p class="card-text">
                                    <button type="button" class="btn btn-danger" data-target="#exampleModal">
                                        <a href="#exampleModal2" style="text-decoration-line: none;color: white">การเข้าเรียน&nbsp;&nbsp;</a>
                                        <span class="badge badge-light">
                                        <p>{{$riskattendance}}</p>
                                    </span>
                                    </button>
                                </p>

                                {{--
                                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>--}}
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-sm">

                <div class="card mb-3" style="max-width: 400px;box-shadow: 5px 5px 8px 4px rgba(50, 50, 50, .5); ">
                    <div class="row no-gutters">
                        <div class="col-md-4">

                            <img src="../img/feedback.png" class="card-img" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">

                                <b> <p class="card-text">
                                                การแจ้งเตือน
                                            </p></b> {{--
                                <h5 class="card-title">การแจ้งเตือนพฤติกรรมและปัญหา</h5>--}}
                                <p class="card-text">
                                    <button type="button" class="btn btn-danger" data-target="#exampleModal3">
                                        <a href="#exampleModal3" style="text-decoration-line: none;color: white">ผลการเรียน&nbsp;&nbsp;</a>
                                        <span class="badge badge-light">
                                    <p>{{$riskgrade}}</p>
                                </span>
                                    </button>
                                </p>

                                {{--
                                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>--}}
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <br>
    <center>
        <br> {{-- แจ้งเตือนปัญหาและพฤติกรรม --}}

        <button type="button" class="btn btn-outline-white" style="border-color: white; position: relative; left: -30%"><img src="../img/noti.png" style="width: 12%;float: left">
            <h5><a name="exampleModal1">การแจ้งเตือนปัญหาและพฤติกรรม</a></h5></button>
        <br>
        <br>
        <br>
        <br>
        <table class="table" width="60%">
            <thead class="thead-light">
                <tr>
                    <th scope="col">รหัสนักศึกษา</th>
                    <th scope="col">ประเภทพฤติกรรม/ปัญหา</th>
                    <th scope="col">หัวข้อของปัญหา</th>
                    <th scope="col">พฤติกรรม/ปัญหา</th>
                    <th scope="col">ระดับความเสี่ยง</th>
                    <th scope="col">วันที่เพิ่ม</th>
                    <th scope="col">วันที่เกิดปัญหา</th>
                    <th scope="col">ผู้เพิ่ม</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($risk_problem as $show_problem)

                <tr>
                    <td scope="row">
                        <a href="/notiproblemL/{{$show_problem->student_id}}" style="color: black;text-decoration-line: none">
                            {{$show_problem->student_id}}
                        </a>
                    </td>
                    <td>{{$show_problem->problem_type}}</td>
                    <td>{{$show_problem->problem_topic}}</td>
                    <td>{{$show_problem->problem_detail}}</td>
                    <td>{{$show_problem->risk_level}}</td>
                    <td>{{$show_problem->created_at}}</td>
                    <td>{{$show_problem->date}}</td>
                    <td>อาจารย์ {{$show_problem->users->name}}</td>
                </tr>

                @endforeach

            </tbody>
        </table>
        <a href="#mode"><img src="../img/arrow.jpg" style="width: 15px;position: relative;float: right;right: 11%" ></a>
        <br>
        <br> {{-- แจ้งเตือนการเข้าเรียน --}}
        <button type="button" class="btn btn-outline-white" style="border-color: white; position: relative; left: -32%"><img src="../img/noti.png" style="width: 15%;float: left">
            <h5><a name="exampleModal2">การแจ้งเตือนการเข้าเรียน</a></h5></button>
        <br>
        <br>
        <br>
        <br>

        <table class="table" width="60%">
            <thead class="thead-light">
                <tr>
                    <th scope="col">รหัสนักศึกษา</th>
                    <th scope="col">รหัสวิชา</th>
                    <th scope="col">จำนวนที่ขาด</th>
                    <th scope="col">ผู้เพิ่ม</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($risk_attendance as $show_problem)

                <tr>
                    <td scope="row">
                        <a href="/notiproblemL/{{$show_problem->student_id}}" style="color: black;text-decoration-line: none">
                            {{$show_problem->student_id}}
                        </a>
                    </td>
                    <td>{{$show_problem->course_id}}</td>
                    <td>{{$show_problem->amount_absence}}</td>

                    <td>อาจารย์ {{$show_problem->person_add}}</td>
                </tr>

                @endforeach

            </tbody>
        </table>
        <a href="#mode"><img src="../img/arrow.jpg" style="width: 15px;position: relative;float: right;right: 11%" ></a>
        <br>
        <br> {{-- แจ้งเตือนผลการเรียน --}}
        <button type="button" class="btn btn-outline-white" style="border-color: white; position: relative; left: -32%"><img src="../img/noti.png" style="width: 15%;float: left">
            <h5><a name="exampleModal3">การแจ้งเตือนผลการเรียน</a></h5></button>
        <br>
        <br>
        <br>
        <br>

        <table class="table" width="60%">
            <thead class="thead-light">
                <tr>
                    <th scope="col">รหัสนักศึกษา</th>
                    <th scope="col">รหัสวิชา</th>
                    <th scope="col">คะแนนรวมทั้งหมด</th>
                    <th scope="col">ผู้เพิ่ม</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($risk_grade as $show_problem)

                <tr>
                    <td scope="row">
                        <a href="/notiproblemL/{{$show_problem->student_id}}" style="color: black;text-decoration-line: none">
                            {{$show_problem->student_id}}
                        </a>
                    </td>
                    <td>{{$show_problem->course_id}}</td>
                    <td>{{$show_problem->total_all}}/100</td>

                    <td>อาจารย์ {{$show_problem->person_add}}</td>
                </tr>

                @endforeach

            </tbody>
        </table>
        <a href="#mode"><img src="../img/arrow.jpg" style="width: 15px;position: relative;float: right;right: 11%" ></a>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
    </center>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>

@endsection @extends('bar.header(AdLec)')
