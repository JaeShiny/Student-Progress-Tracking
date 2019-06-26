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
                  {{-- <th>ชื่อ-สกุล</th> --}}
                  <th>จำนวนคาบเรียน</th>
                  <th>จำนวนการขาดเรียน</th>
                  <th>คาบที่ 1</th>
                  <th>คาบที่ 2</th>
                  <th>คาบที่ 3</th>
                  <th>คาบที่ 4</th>
                  <th>คาบที่ 5</th>
                  <th>คาบที่ 6</th>
                  <th>คาบที่ 7</th>
                  <th>คาบที่ 8</th>
                  <th>คาบที่ 9</th>
                  <th>คาบที่ 10</th>
                  <th>คาบที่ 11</th>
                  <th>คาบที่ 12</th>
                  <th>คาบที่ 13</th>
                  <th>คาบที่ 14</th>
                  <th>คาบที่ 15</th>
                </tr>
            </thead>
            @foreach($student as $show_student)
            <tbody>
                <tr>
                  <td>{{$show_student->course_id}}</td>
                  <td>{{$show_student->student_id}}</td>
                  {{-- <td>{{$show_student->id->name}} &nbsp;&nbsp; {{$show_student->id->last_name}}</td> --}}
                  <td>{{$show_student->period_total}}</td>
                  <td>{{$show_student->amount_absence}}</td>
                  <td>
                    @if($show_student->period_1 == 0) X @endif
                    @if($show_student->period_1 == 1) / @endif
                  </td>
                  <td>
                    @if($show_student->period_2 == 0) X @endif
                    @if($show_student->period_2 == 1) / @endif
                  </td>
                  <td>
                    @if($show_student->period_3 == 0) X @endif
                    @if($show_student->period_3 == 1) / @endif
                  </td>
                  <td>
                    @if($show_student->period_4 == 0) X @endif
                    @if($show_student->period_4 == 1) / @endif
                  </td>
                  <td>
                    @if($show_student->period_5 == 0) X @endif
                    @if($show_student->period_5 == 1) / @endif
                  </td>
                  <td>
                    @if($show_student->period_6 == 0) X @endif
                    @if($show_student->period_6 == 1) / @endif
                  </td>
                  <td>
                    @if($show_student->period_7 == 0) X @endif
                    @if($show_student->period_7 == 1) / @endif
                  </td>
                  <td>
                    @if($show_student->period_8 == 0) X @endif
                    @if($show_student->period_8 == 1) / @endif
                  </td>
                  <td>
                    @if($show_student->period_9 == 0) X @endif
                    @if($show_student->period_9 == 1) / @endif
                  </td>
                  <td>
                    @if($show_student->period_10 == 0) X @endif
                    @if($show_student->period_10 == 1) / @endif
                  </td>
                  <td>
                    @if($show_student->period_11 == 0) X @endif
                    @if($show_student->period_11 == 1) / @endif
                  </td>
                  <td>
                    @if($show_student->period_12 == 0) X @endif
                    @if($show_student->period_12 == 1) / @endif
                  </td>
                  <td>
                    @if($show_student->period_13 == 0) X @endif
                    @if($show_student->period_13 == 1) / @endif
                  </td>
                  <td>
                    @if($show_student->period_14 == 0) X @endif
                    @if($show_student->period_14 == 1) / @endif
                  </td>
                  <td>
                    @if($show_student->period_15 == 0) X @endif
                    @if($show_student->period_15 == 1) / @endif
                  </td>
            </tbody>
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
