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
            <li class="breadcrumb-item"><a href="{{ url('course') }}">วิชาที่สอน</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="">รายชื่อนักศึกษา</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="">แสดงผลการเข้าเรียน</a></li>
        </ol>
    </nav>

</head>
<body>
    <br><br><br>
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


</body>
</html>

@endsection
@extends('bar.header(lec)')
