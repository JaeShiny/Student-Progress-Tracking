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
            {{-- <li class="breadcrumb-item" aria-current="page"><a href="/attendanceA/{{$student->student_id}}">แสดงการเข้าเรียน</a></li> --}}
            <li class="breadcrumb-item" aria-current="page"><a href="/advisor/showAtt">การเข้าเรียนและผลการเรียน</a></li>
            <li class="breadcrumb-item" aria-current="page"><a href="">การเข้าเรียน</a></li>
        </ol>
    </nav>

    <style>
        .row{
            margin-right: 0px;
        }
    </style>

</head>

<body>

{{-- <ul class="nav nav-tabs" id="myTab" role="tablist" style="background-color:white;">
    <li class="nav-item">
        <a class="nav-link active" href="" style="color: #000000;">การเข้าเรียน</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/showGradeA/{{$student}}" style="color: #000000;">ผลการเรียน</a>
    </li>
</ul><br> --}}

@foreach ($student as $students)
    <h6 align='right'>รหัสนักศึกษา: {{$students->student_id}} &nbsp;&nbsp;&nbsp;&nbsp;</h6>
    <h6 align='right'>ชื่อ-สกุล: {{$students->users['name']}} &nbsp;{{$students->users['lastname']}}&nbsp;&nbsp;&nbsp;</h6>
@endforeach
<br>

<div class="row">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

    <div class="container">
        {{-- <div class="card bg-light mt" style="position: relative;display: table;">
            <div class="card-header">
                <h5>การเข้าเรียน</h5>
            </div> --}}
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
            @foreach($student as $student)
            <tbody>
                <tr>
                  <td><center>{{$student->course_id}}</center></td>
                  <td>{{$student->student_id}}</td>
                  <td>{{$student->users['name']}}&nbsp;&nbsp;{{$student->users['lastname']}}</td>
                  <td><center>{{$student->period_total}}</center></td>
                  <td><center>{{$student->amount_attendance}}</center></td>
                  <td><center>{{$student->amount_absence}}</center></td>
                  <td>
                      <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{$student->student_id}}">
                        รายละเอียด
                    </button>
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
                                    absence
                                @endif
                            </div>
                            <div>
                                <b>คาบ 2:</b>
                                @if($student->period_2 == 1)
                                    attend
                                @else
                                    absence
                                @endif
                            </div>
                            <div>
                                <b>คาบ 3:</b>
                                @if($student->period_3 == 1)
                                    attend
                                @else
                                    absence
                                @endif
                            </div>
                            <div>
                                <b>คาบ 4:</b>
                                @if($student->period_4 == 1)
                                    attend
                                @else
                                    absence
                                @endif
                            </div>
                            <div>
                                <b>คาบ 5:</b>
                                @if($student->period_5 == 1)
                                    attend
                                @else
                                    absence
                                @endif
                            </div>
                            <div>
                                <b>คาบ 6:</b>
                                @if($student->period_6 == 1)
                                    attend
                                @else
                                    absence
                                @endif
                            </div>
                            <div>
                                <b>คาบ 7:</b>
                                @if($student->period_7 == 1)
                                    attend
                                @else
                                    absence
                                @endif
                            </div>
                            <div>
                                <b>คาบ 8:</b>
                                @if($student->period_8 == 1)
                                    attend
                                @else
                                    absence
                                @endif
                            </div>
                            <div>
                                <b>คาบ 9:</b>
                                @if($student->period_9 == 1)
                                    attend
                                @else
                                    absence
                                @endif
                            </div>
                            <div>
                                <b>คาบ 10:</b>
                                @if($student->period_10 == 1)
                                    attend
                                @else
                                    absence
                                @endif
                            </div>
                            <div>
                                <b>คาบ 11:</b>
                                @if($student->period_11 == 1)
                                    attend
                                @else
                                    absence
                                @endif
                            </div>
                            <div>
                                <b>คาบ 12:</b>
                                @if($student->period_12 == 1)
                                    attend
                                @else
                                    absence
                                @endif
                            </div>
                            <div>
                                <b>คาบ 13:</b>
                                @if($student->period_13 == 1)
                                    attend
                                @else
                                    absence
                                @endif
                            </div>
                            <div>
                                <b>คาบ 14:</b>
                                @if($student->period_14 == 1)
                                    attend
                                @else
                                    absence
                                @endif
                            </div>
                            <div>
                                <b>คาบ 15:</b>
                                @if($student->period_15 == 1)
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
@extends('bar.header(advi)')