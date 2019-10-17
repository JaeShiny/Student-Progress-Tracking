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
            <li class="breadcrumb-item active" aria-current="page"><a href="{{ url('subjectNotiL') }}">การแจ้งเตือน</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="">วิชา: {{$course->course_id}}</a></li>
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
            <div class="col-sm-1"></div>
            <div class="col-sm">

                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal22">
                    พฤติกรรมและปัญหา&nbsp;&nbsp;
                    <span class="badge badge-light">
                    <p>{{$riskproblem}}</p>
                </span>
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal22" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            @foreach ($risk_problem as $show_problem)
                            <div class="modal-header">

                                <h5 class="modal-title" id="exampleModalLabel">รหัสนักศึกษา {{$show_problem->student_id}}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <b>หัวข้อของปัญหา :</b> {{$show_problem->problem_type}}
                                <br>
                                <b>รายละเอียด :</b> {{$show_problem->problem_topic}}
                                <br>
                                <b>ระดับความเสี่ยง :</b> {{$show_problem->risk_level}}
                            </div>
                            <div class="modal-footer">
                            </div>
                            <div class="modal-body" style="margin-top: -7%">

                                <p class="card-text"><small class="text-muted" style="float: right">&nbsp;&nbsp;วันที่เกิดปัญหา : {{$show_problem->date}}</small></p>
                                <p class="card-text"><small class="text-muted" style="float: right">วันที่เพิ่ม : {{$show_problem->created_at}}</small></p>
                                <br>

                                <p class="card-text"><small class="text-muted" style="float: right">ผู้เพิ่ม : {{$show_problem->users->name}}</small></p>
                            </div>

                            <div class="modal-footer">

                            </div>

                            @endforeach

                        </div>
                    </div>
                </div>

            </div>
            <div class="col-sm">

                <!-- Button trigger modal -->
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
                    การแจ้งเตือนการเข้าเรียน&nbsp;&nbsp;
                    <span class="badge badge-light">
            <p>{{$riskattendance}}</p>
        </span>
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            @foreach ($risk_attendance as $show_problem)
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">
              รหัสนักศึกษา : {{$show_problem->student_id}}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <b>รหัสวิชา :</b> {{$show_problem->course_id}}
                            </div>
                            <div class="modal-body">
                                <b>จำนวนที่ขาด :</b> {{$show_problem->amount_absence}}
                            </div>
                            <br> @endforeach
                            <hr>
                            <div class="modal-footer">
                                @foreach ($risk_attendance as $show_problem)
                                <p class="card-text">
                                    <small class="text-muted">ผู้เพิ่ม : อาจารย์ {{$show_problem->person_add}}</small>
                                </p>
                                <br> @endforeach
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-sm">

                {{-- แจ้งเตือนปัญหาและพฤติกรรม --}}

                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal3">
                    การแจ้งเตือนผลการเรียน&nbsp;&nbsp;
                    <span class="badge badge-light">
        <p>{{$riskgrade}}</p>
    </span>
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            @foreach ($risk_grade as $show_problem)
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">
                                    <b>รหัสนักศึกษา :</b> {{$show_problem->student_id}}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <b>รหัสวิชา : </b>{{$show_problem->course_id}}
                            </div>
                            <div class="modal-body">
                                <b>คะแนนรวมทั้งหมด :</b> {{$show_problem->total_all}}/100
                            </div>
                            @endforeach {{--
                            <div class="modal-footer"> --}}
                                <div class="modal-footer">
                                    @foreach ($risk_attendance as $show_problem)
                                    <p class="card-text"><small class="text-muted">ผู้เพิ่ม : อาจารย์ {{$show_problem->person_add}}</small></p>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <center>
        <br> {{-- แจ้งเตือนปัญหาและพฤติกรรม --}}
        <h6 style="position: relative; left: -31%">การแจ้งเตือนปัญหาและพฤติกรรม</h6>
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
                    <td scope="row">{{$show_problem->student_id}}</td>
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
        <br>
        <br> {{-- แจ้งเตือนการเข้าเรียน --}}
        <h6 style="position: relative; left: -33%">การแจ้งเตือนการเข้าเรียน</h6>
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
                    <td scope="row">{{$show_problem->student_id}}</td>
                    <td>{{$show_problem->course_id}}</td>
                    <td>{{$show_problem->amount_absence}}</td>

                    <td>อาจารย์ {{$show_problem->person_add}}</td>
                </tr>

                @endforeach

            </tbody>
        </table>
        <br>
        <br> {{-- แจ้งเตือนผลการเรียน --}}
        <h6 style="position: relative; left: -33%">การแจ้งเตือนผลการเรียน</h6>
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
                    <td scope="row">{{$show_problem->student_id}}</td>
                    <td>{{$show_problem->course_id}}</td>
                    <td>{{$show_problem->total_all}}/100</td>

                    <td>อาจารย์ {{$show_problem->person_add}}</td>
                </tr>

                @endforeach

            </tbody>
        </table>
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

@endsection @extends('bar.header(lec)')
