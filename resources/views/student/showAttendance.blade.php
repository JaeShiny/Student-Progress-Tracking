@extends('bar.body')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <title>แสดงผลการเข้าเรียน</title>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li> </li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <li class="breadcrumb-item active" aria-current="page"><a href="">การเข้าเรียน</a></li>
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
                    <a class="nav-link active" href="" style="color: #000000;">การเข้าเรียน</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/student/grade" style="color: #000000;">ผลการเรียน</a>
                </li>
            </ul><br>

        @foreach ($bios as $bio)
        <h6 align='right'>รหัสนักศึกษา: {{$bio->student_id}} &nbsp;&nbsp;&nbsp;&nbsp;</h6>
        <h6 align='right'>ชื่อ-สกุล: {{$bio->first_name}} &nbsp;{{$bio->last_name}}&nbsp;&nbsp;&nbsp;</h6>
        @endforeach
        <br>

        <div class="container">
                <div class="card bg-light mt" style="box-shadow: 5px 5px 8px 4px rgba(50, 50, 50, .5);">
                    <div class="card-header">
                            <h4 class="w3-bar-item">การเข้าเรียน</h4>
                    </div>


<br>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 float-right">
                <div class="btn-group">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">เทอม/ปีการศึกษา<span class="caret"></span></button>
                    <ul class="dropdown-menu scrollable-menu" role="menu"style="overflow: scroll;height: 200px;overflow-x: unset">
                        @foreach($semesters as $show)
                        <li> <a class="dropdown-item" href="/student/attendance/{{$show->semester}}/{{$show->year}}">{{$show->semester}}/{{$show->year}}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
<br>

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
                    <option value="<">น้อยมาก</option>
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
<br><br><br>
{{-- จบ filter --}}

<center>
    <div class="container-fluid">

        <table class="table table-hover">
            <thead>
                    <tr>
                            <th style="width: 13%"><center>รหัสวิชา</center></th>
                            <th>รหัสนักศึกษา</th>
                            <th style="width: 31%"><center>ชื่อ-สกุล</center></th>
                            <th style="width: 12%">จำนวนคาบเรียน</th>
                            <th style="width: 14%">จำนวนการเข้าเรียน</th>
                            <th style="width: 14%">จำนวนการขาดเรียน</th>
                            <th style="width: 15%"><center>รายละเอียด</center></th>
                    </tr>
            </thead>
            @foreach($attendance as $student)
            <tbody>
                <tr>
                  <td><center>{{$student->course_id}}</center></td>
                    <td>
                        <a href="/profileDuringS/{{$student->student_id}}" style="color: black;text-decoration-line: none">
                            {{$student->student_id}}
                        </a>
                    </td>
                    <td>
                        <a href="/profileDuringS/{{$student->student_id}}" style="color: black;text-decoration-line: none">
                            {{$student->users['name']}}&nbsp;&nbsp;{{$student->users['lastname']}}
                        </a>
                    </td>
                  <td><center>{{$student->period_total}}</center></td>
                  <td><center>{{$student->amount_attendance}}</center></td>
                  <td><center>{{$student->amount_absence}}</center></td>
                  <td>
                      <!-- Button trigger modal -->
                 <center>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{$student->student_id}}">
                        ทฤษฎี
                    </button><br><br>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal2{{$student->student_id}}">
                       &nbsp;&nbsp;Lab&nbsp;&nbsp;
                    </button>
                </center>
                  </td>
                </tr>
            </tbody>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal{{$student->student_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">รายละเอียดการเข้าเรียนของ:&nbsp;{{$student->student_id}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                            <div>
                                <b>คาบ 1:</b>
                                @if($student->period_1 == 1)
                                    attend
                                @else
                                <p style="color: red"> absence</p>
                                @endif
                            </div>
                            <div>
                                <b>คาบ 2:</b>
                                @if($student->period_2 == 1)
                                    attend
                                @else
                                <p style="color: red"> absence</p>
                                @endif
                            </div>
                            <div>
                                <b>คาบ 3:</b>
                                @if($student->period_3 == 1)
                                    attend
                                @else
                                <p style="color: red"> absence</p>
                                @endif
                            </div>
                            <div>
                                <b>คาบ 4:</b>
                                @if($student->period_4 == 1)
                                    attend
                                @else
                                <p style="color: red"> absence</p>
                                @endif
                            </div>
                            <div>
                                <b>คาบ 5:</b>
                                @if($student->period_5 == 1)
                                    attend
                                @else
                                <p style="color: red"> absence</p>
                                @endif
                            </div>
                            <div>
                                <b>คาบ 6:</b>
                                @if($student->period_6 == 1)
                                    attend
                                @else
                                <p style="color: red"> absence</p>
                                @endif
                            </div>
                            <div>
                                <b>คาบ 7:</b>
                                @if($student->period_7 == 1)
                                    attend
                                @else
                                <p style="color: red"> absence</p>
                                @endif
                            </div>
                            <div>
                                <b>คาบ 8:</b>
                                @if($student->period_8 == 1)
                                    attend
                                @else
                                <p style="color: red"> absence</p>
                                @endif
                            </div>
                            <div>
                                <b>คาบ 9:</b>
                                @if($student->period_9 == 1)
                                    attend
                                @else
                                <p style="color: red"> absence</p>
                                @endif
                            </div>
                            <div>
                                <b>คาบ 10:</b>
                                @if($student->period_10 == 1)
                                    attend
                                @else
                                <p style="color: red"> absence</p>
                                @endif
                            </div>
                            <div>
                                <b>คาบ 11:</b>
                                @if($student->period_11 == 1)
                                    attend
                                @else
                                <p style="color: red"> absence</p>
                                @endif
                            </div>
                            <div>
                                <b>คาบ 12:</b>
                                @if($student->period_12 == 1)
                                    attend
                                @else
                                <p style="color: red"> absence</p>
                                @endif
                            </div>
                            <div>
                                <b>คาบ 13:</b>
                                @if($student->period_13 == 1)
                                    attend
                                @else
                                <p style="color: red"> absence</p>
                                @endif
                            </div>
                            <div>
                                <b>คาบ 14:</b>
                                @if($student->period_14 == 1)
                                    attend
                                @else
                                <p style="color: red"> absence</p>
                                @endif
                            </div>
                            <div>
                                <b>คาบ 15:</b>
                                @if($student->period_15 == 1)
                                    attend
                                @else
                                <p style="color: red"> absence</p>
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
                            <p style="color: red"> absence</p>
                            @endif
                        </div>
                        <div>
                            <b>คาบ2:</b>
                            @if($show_student->period_2 == 1)
                                attend
                            @else
                            <p style="color: red"> absence</p>
                            @endif
                        </div>
                        <div>
                            <b>คาบ 3:</b>
                            @if($show_student->period_3 == 1)
                                attend
                            @else
                            <p style="color: red"> absence</p>
                            @endif
                        </div>
                        <div>
                            <b>คาบ 4:</b>
                            @if($show_student->period_4 == 1)
                                attend
                            @else
                            <p style="color: red"> absence</p>
                            @endif
                        </div>
                        <div>
                            <b>คาบ 5:</b>
                            @if($show_student->period_5 == 1)
                                attend
                            @else
                            <p style="color: red"> absence</p>
                            @endif
                        </div>
                        <div>
                            <b>คาบ 6:</b>
                            @if($show_student->period_6 == 1)
                                attend
                            @else
                            <p style="color: red"> absence</p>
                            @endif
                        </div>
                        <div>
                            <b>คาบ 7:</b>
                            @if($show_student->period_7 == 1)
                                attend
                            @else
                            <p style="color: red"> absence</p>
                            @endif
                        </div>
                        <div>
                            <b>คาบ 8:</b>
                            @if($show_student->period_8 == 1)
                                attend
                            @else
                            <p style="color: red"> absence</p>
                            @endif
                        </div>
                        <div>
                            <b>คาบ 9:</b>
                            @if($show_student->period_9 == 1)
                                attend
                            @else
                            <p style="color: red"> absence</p>
                            @endif
                        </div>
                        <div>
                            <b>คาบ 10:</b>
                            @if($show_student->period_10 == 1)
                                attend
                            @else
                            <p style="color: red"> absence</p>
                            @endif
                        </div>
                        <div>
                            <b>คาบ 11:</b>
                            @if($show_student->period_11 == 1)
                                attend
                            @else
                            <p style="color: red"> absence</p>
                            @endif
                        </div>
                        <div>
                            <b>คาบ 12:</b>
                            @if($show_student->period_12 == 1)
                                attend
                            @else
                            <p style="color: red"> absence</p>
                            @endif
                        </div>
                        <div>
                            <b>คาบ 13:</b>
                            @if($show_student->period_13 == 1)
                                attend
                            @else
                            <p style="color: red"> absence</p>
                            @endif
                        </div>
                        <div>
                            <b>คาบ 14:</b>
                            @if($show_student->period_14 == 1)
                                attend
                            @else
                            <p style="color: red"> absence</p>
                            @endif
                        </div>
                        <div>
                            <b>คาบ 15:</b>
                            @if($show_student->period_15 == 1)
                                attend
                            @else
                            <p style="color: red"> absence</p>
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

    </div>
</div>
</div>
</center>
<br><br><br>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>

@endsection
@extends('bar.header(student)')
