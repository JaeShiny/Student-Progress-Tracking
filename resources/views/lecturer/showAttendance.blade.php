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
            {{-- <li class="breadcrumb-item" aria-current="page"><a href="{{ url('course') }}">วิชาที่สอน</a></li> --}}
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

    <div class="container">
            <div class="card bg-light mt" style="position: relative;display: table;">
                <div class="card-header">
                        <h4 class="w3-bar-item">{{$course->course_id}}&nbsp;{{$course->course_name_eng}}</h4>
                </div>
    <br><br><br>

    <center>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th style="width: 13%"><center>รหัสวิชา</center></th>
                    <th>รหัสนักศึกษา</th>
                    <th style="width: 35%"><center>ชื่อ-สกุล</center></th>
                    <th>จำนวนคาบเรียน</th>
                    <th>จำนวนการเข้าเรียน</th>
                    <th>จำนวนการขาดเรียน</th>
                    <th><center>รายละเอียด</center></th>
                </tr>
            </thead>
            @foreach($student as $show_student)
            <tbody>
                <tr>
                  <td><center>{{$show_student->course_id}}</center></td>
                  <td>{{$show_student->student_id}}</td>
                  {{-- <td>{{$show_student->users->student_id}} &nbsp;&nbsp; {{$show_student->users->lastname}}</td> --}}
                  <td>{{$show_student->users['name']}}&nbsp;&nbsp;{{$show_student->users['lastname']}}</td>
                  <td><center>{{$show_student->period_total}}</center></td>
                  <td><center>{{$show_student->amount_attendance}}</center></td>
                  <td><center>{{$show_student->amount_absence}}</center></td>
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
                                <b>คาบ1:</b>
                                @if($show_student->period_1 == 1)
                                    attend
                                @else
                                    absence
                                @endif
                            </div>
                            <div>
                                <b>คาบ2:</b>
                                @if($show_student->period_2 == 1)
                                    attend
                                @else
                                    absence
                                @endif
                            </div>
                            <div>
                                <b>คาบ 3:</b>
                                @if($show_student->period_3 == 1)
                                    attend
                                @else
                                    absence
                                @endif
                            </div>
                            <div>
                                <b>คาบ 4:</b>
                                @if($show_student->period_4 == 1)
                                    attend
                                @else
                                    absence
                                @endif
                            </div>
                            <div>
                                <b>คาบ 5:</b>
                                @if($show_student->period_5 == 1)
                                    attend
                                @else
                                    absence
                                @endif
                            </div>
                            <div>
                                <b>คาบ 6:</b>
                                @if($show_student->period_6 == 1)
                                    attend
                                @else
                                    absence
                                @endif
                            </div>
                            <div>
                                <b>คาบ 7:</b>
                                @if($show_student->period_7 == 1)
                                    attend
                                @else
                                    absence
                                @endif
                            </div>
                            <div>
                                <b>คาบ 8:</b>
                                @if($show_student->period_8 == 1)
                                    attend
                                @else
                                    absence
                                @endif
                            </div>
                            <div>
                                <b>คาบ 9:</b>
                                @if($show_student->period_9 == 1)
                                    attend
                                @else
                                    absence
                                @endif
                            </div>
                            <div>
                                <b>คาบ 10:</b>
                                @if($show_student->period_10 == 1)
                                    attend
                                @else
                                    absence
                                @endif
                            </div>
                            <div>
                                <b>คาบ 11:</b>
                                @if($show_student->period_11 == 1)
                                    attend
                                @else
                                    absence
                                @endif
                            </div>
                            <div>
                                <b>คาบ 12:</b>
                                @if($show_student->period_12 == 1)
                                    attend
                                @else
                                    absence
                                @endif
                            </div>
                            <div>
                                <b>คาบ 13:</b>
                                @if($show_student->period_13 == 1)
                                    attend
                                @else
                                    absence
                                @endif
                            </div>
                            <div>
                                <b>คาบ 14:</b>
                                @if($show_student->period_14 == 1)
                                    attend
                                @else
                                    absence
                                @endif
                            </div>
                            <div>
                                <b>คาบ 15:</b>
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

</body>

</html>

@endsection
@extends('bar.header(lec)')
