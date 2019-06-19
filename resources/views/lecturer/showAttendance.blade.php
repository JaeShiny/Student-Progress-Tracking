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
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

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
</head>

<body>

    <div class="w3-sidebar w3-light-grey w3-bar-block" style="width:25% ;margin-top: -1%">

        <h3 class="w3-bar-item"><center>{{$course->course_id}}</h3></center>

        <ul class="list-group">
        <li class="list-group-item d-flex justify-content-between align-items-center">
         <a href="/importExportView/{{$course->course_id}}" style="text-decoration: none; color: #000000;"><h5> &nbsp;&nbsp; เพิ่มการเข้าเรียน</h5></a>

        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
          <a href="/attendance/{{$course->course_id}}" style="text-decoration: none; color: #000000;" ><h5> &nbsp;&nbsp; ดูการเข้าเรียน</h5></a>

        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
         <a href="testshow3.html" style="text-decoration: none; color: #000000;" ><h5>&nbsp;&nbsp;  เพิ่มผลการเรียน</h5></a>

        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
         <a href="testshow4.html" style="text-decoration: none; color: #000000;" ><h5> &nbsp;&nbsp; ดูผลการเรียน</h5></a>

        </li>
      </ul>
      <br>
        <center><button type="button" class="btn btn-primary"><a href="/subject/{{$course->course_id}}" style="color: #FFFFFF; text-decoration: none; ">รายชื่อนักศึกษา</a></button></center>

      </div>

      <!-- Page Content -->
      <div style="margin-left:25%;margin-top: -1%">

      <div class="w3-container w3-teal">
        <h3>&nbsp;&nbsp;&nbsp;{{$course->course_id}}:&nbsp;{{$course->course_name_eng}}</h3><br>
      </div>

      <br><br><br>
    <div class="container">
    <center>
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
        </table>
    </center>
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
