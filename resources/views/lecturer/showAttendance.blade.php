@extends('bar.body')
@section('content')

<!DOCTYPE html>
<html>

<head>
    <title>แสดงการเข้าเรียน</title>
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
            <li class="breadcrumb-item" aria-current="page"><a href="/attendance/{{$course->course_id}}">แสดงการเข้าเรียน</a></li>
        </ol>
    </nav>

    <style>
        .row{
            margin-right: 0px;
        }
    </style>

</head>

<body>

<ul class="nav nav-tabs" id="myTab" role="tablist" style="background-color:white;">
    <li class="nav-item">
        <a class="nav-link active" href="/importExportView/{{$course->course_id}}" style="color: #000000;">การเข้าเรียน</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/importExportGrade/{{$course->course_id}}" style="color: #000000;">ผลการเรียน</a>
    </li>
</ul><br>

<div class="row">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <div class="col">
        <div class="list-group" id="list-tab" role="tablist" style="margin-right: -10px">

            <a class="list-group-item list-group-item-action" href="/importExportView/{{$course->course_id}}"><b>เพิ่มการเข้าเรียน</b></a>
            <a class="list-group-item list-group-item-action active" href="/attendance/{{$course->course_id}}"><b>แสดงการเข้าเรียน</b></a>
            <a class="list-group-item list-group-item-action" href="/subject/{{$course->course_id}}"><b>รายชื่อนักศึกษา</b></a>

        </div>
    </div>

<div class="container px-lg-5">
    <div class="row mx-lg-n5">
        <div class="col-11">
            <div class="col py-3 px-lg-5 border bg-light">
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                        <h4 class="w3-bar-item">{{$course->course_id}}&nbsp;{{$course->course_name_eng}}</h4>

    <br><br><br>
    <div class="container">
    <center>
        <table class="table table-hover">
            <thead>
                <tr>
                  <th>รหัสวิชา</th>
                  <th>รหัสนักศึกษา</th>
                  <th>ชื่อ-สกุล</th>
                  <th>จำนวนคาบเรียน</th>
                  <th>จำนวนการเข้าเรียน</th>
                  <th>จำนวนการขาดเรียน</th>
                  <th>รายละเอียด</th>
                </tr>
            </thead>
            @foreach($student as $show_student)
            <tbody>
                <tr>
                  <td>{{$show_student->course_id}}</td>
                  <td>{{$show_student->student_id}}</td>
                  {{-- <td>{{$show_student->users->student_id}} &nbsp;&nbsp; {{$show_student->users->lastname}}</td> --}}
                  <td>{{$show_student->users['name']}}&nbsp;&nbsp;{{$show_student->users['lastname']}}</td>
                  <td>{{$show_student->period_total}}</td>
                  <td>{{$show_student->amount_attendance}}</td>
                  <td>{{$show_student->amount_absence}}</td>
                  <td>
                      <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{$show_student->student_id}}">
                        รายละเอียด
                    </button>
                  </td>
                </tr>
            </tbody>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal{{$show_student->student_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">รายละเอียดการเข้าเรียนของ:&nbsp;{{$show_student->student_id}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                            <div>
                                คาบ1:
                                @if($show_student->period_1 == 1)
                                    attend
                                @else
                                    absence
                                @endif
                            </div>
                            <div>
                                คาบ2:
                                @if($show_student->period_2 == 1)
                                    attend
                                @else
                                    absence
                                @endif
                            </div>
                            <div>
                                คาบ 3:
                                @if($show_student->period_3 == 1)
                                    attend
                                @else
                                    absence
                                @endif
                            </div>
                            <div>
                                คาบ 4:
                                @if($show_student->period_4 == 1)
                                    attend
                                @else
                                    absence
                                @endif
                            </div>
                            <div>
                                คาบ 5:
                                @if($show_student->period_5 == 1)
                                    attend
                                @else
                                    absence
                                @endif
                            </div>
                            <div>
                                คาบ 6:
                                @if($show_student->period_6 == 1)
                                    attend
                                @else
                                    absence
                                @endif
                            </div>
                            <div>
                                คาบ 7:
                                @if($show_student->period_7 == 1)
                                    attend
                                @else
                                    absence
                                @endif
                            </div>
                            <div>
                                คาบ 8:
                                @if($show_student->period_8 == 1)
                                    attend
                                @else
                                    absence
                                @endif
                            </div>
                            <div>
                                คาบ 9:
                                @if($show_student->period_9 == 1)
                                    attend
                                @else
                                    absence
                                @endif
                            </div>
                            <div>
                                คาบ 10:
                                @if($show_student->period_10 == 1)
                                    attend
                                @else
                                    absence
                                @endif
                            </div>
                            <div>
                                คาบ 11:
                                @if($show_student->period_11 == 1)
                                    attend
                                @else
                                    absence
                                @endif
                            </div>
                            <div>
                                คาบ 12:
                                @if($show_student->period_12 == 1)
                                    attend
                                @else
                                    absence
                                @endif
                            </div>
                            <div>
                                คาบ 13:
                                @if($show_student->period_13 == 1)
                                    attend
                                @else
                                    absence
                                @endif
                            </div>
                            <div>
                                คาบ 14:
                                @if($show_student->period_14 == 1)
                                    attend
                                @else
                                    absence
                                @endif
                            </div>
                            <div>
                                คาบ 15:
                                @if($show_student->period_15 == 1)
                                    attend
                                @else
                                    absence
                                @endif
                            </div>
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                        </div>
                    </div>
                    </div>
                </div>
            @endforeach
        </table>
    </center>
    </div>
</div>
</div>
</div><br>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>

@endsection
@extends('bar.header(lec)')
