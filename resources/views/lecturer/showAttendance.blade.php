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

    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            {{-- <li class="breadcrumb-item" aria-current="page"><a href="{{ url('course') }}">วิชาที่สอน</a></li> --}}
            <li class="breadcrumb-item" aria-current="page"><a href="#">แสดงการเข้าเรียน</a></li>
        </ol>
    </nav>

    <style>
        .row{
            margin-right: 0px;
        }
    .dropdown-menu{
    overflow:scroll;
    }

    </style>

</head>

<body>

<ul class="nav nav-tabs" id="myTab" role="tablist" style="background-color:white;">
    <li class="nav-item">
        <a class="nav-link active" href="" style="color: #000000;">การเข้าเรียน</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/showGrade/{{$course->course_id}}/{{$se}}/{{$ye}}" style="color: #000000;">ผลการเรียน</a>
    </li>
</ul><br>
{{--
<div class="row">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <div class="col">
        <div class="list-group" id="list-tab" role="tablist" style="margin-right: -10px">

            <a class="list-group-item list-group-item-action" href="/importExportView/{{$course->course_id}}"><b>เพิ่มการเข้าเรียน</b></a>
            <a class="list-group-item list-group-item-action active" href="#"><b>แสดงการเข้าเรียน</b></a>
            {{-- <a class="list-group-item list-group-item-action" href="/subject/{{$course->course_id}}"><b>รายชื่อนักศึกษา</b></a> --}}
{{--
        </div>
    </div>
--}}

    <div class="container">
            <div class="card bg-light mt" style="box-shadow: 5px 5px 8px 4px rgba(50, 50, 50, .5);">
                <div class="card-header">
                        <h4 class="w3-bar-item">{{$course->course_id}}&nbsp;{{$course->course_name_eng}}</h4>
                </div>


<br>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 float-right">
                <div class="btn-group">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">เทอม/ปีการศึกษา<span class="caret"></span></button>
                    <ul class="dropdown-menu scrollable-menu" role="menu">
                        @foreach($gen as $show)
                        <li> <a class="dropdown-item" href="/attendance/{{$course->course_id}}/{{$show->semester}}/{{$show->year}}">{{$show->semester}}/{{$show->year}}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
{{-- filter --}}
<div id="form-wrapper" style="max-width:1000px;margin:auto;">
<div class="container">

    <form class="form-inline">

        <div class="form-group mb-2">
          <label class="sr-only">หัวข้อ</label>
          <input type="text" readonly class="form-control-plaintext" value="จำนวนขาดเรียน:">
        </div>

        <div class="form-group mx-sm-3 mb-2">
            <label for="exampleFormControlSelect1">
                <select class="form-control" id="exampleFormControlSelect1" name="absent_condition">
                    <option>กรุณาเลือก</option>
                    <option value=">">มากกว่า</option>
                    <option value="<">น้อยกว่า</option>
                    <option value=">=">มากกว่าเท่ากับ</option>
                    <option value="<=">น้อยกว่าเท่ากับ</option>
                    <option value="=">เท่ากับ</option>
                </select>
            </label>
        </div>

        <div class="form-group mx-sm-3 mb-2">
            <label class="sr-only">ค่า</label>
            <input class="form-control" id="inputPassword2" placeholder="ค่า" name="absent_value">
        </div>

        <button type="submit" class="btn btn-primary mb-2">ค้นหา</button>

    </form>

</div>
</div>
<br>
{{-- จบ filter --}}
    <center>
        <br><br>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th style="width: 13%"><center>รหัสวิชา</center></th>
                    <th>รหัสนักศึกษา</th>
                    <th style="width: 31%"><center>ชื่อ-สกุล</center></th>
                    <th style="width: 12%">จำนวนคาบเรียน</th>
                    <th style="width: 15%">จำนวนการเข้าเรียน</th>
                    <th style="width: 15%">จำนวนการขาดเรียน</th>
                    <th style="width: 18%"><center>รายละเอียด</center></th>
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
                <center>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{$show_student->student_id}}">
                        ทฤษฎี
                    </button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <br>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal2{{$show_student->student_id}}">
                        Lab
                    </button>
                </center>
                  </td>
                </tr>
            </tbody>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal{{$show_student->student_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">รายละเอียดการเข้าเรียน(ทฤษฎี)ของ:&nbsp;{{$show_student->student_id}}</h5>
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

@foreach ($attendance2 as $show_student)

<!-- Modal -->
<div class="modal fade" id="exampleModal2{{$show_student->student_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">รายละเอียดการเข้าเรียน(Lab)ของ:&nbsp;{{$show_student->student_id}}</h5>
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
@endforeach


        </table><br>
    </center>
    </div>
</div>
</div>
</div><br><br>

</body>

</html>

@endsection
@extends('bar.header(lec)')
