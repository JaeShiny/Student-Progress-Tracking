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

</head>
<body>
        @foreach ($bios as $bio)
        <h6 align='right'>รหัสนักศึกษา: {{$bio->student_id}} &nbsp;&nbsp;&nbsp;&nbsp;</h6>
        <h6 align='right'>ชื่อ-สกุล: {{$bio->first_name}} &nbsp;{{$bio->last_name}}&nbsp;&nbsp;&nbsp;</h6>
        @endforeach

        <h5 align='center'>การเข้าเรียน</h5>

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
            @foreach($attendance as $attendances)
            <tbody>
                <tr>
                  <td>{{$attendances->course_id}}</td>
                  <td>{{$attendances->student_id}}</td>
                  {{-- <td>{{$show_student->id->name}} &nbsp;&nbsp; {{$show_student->id->last_name}}</td> --}}
                  <td>{{$attendances->amount_attendance}}</td>
                  <td>{{$attendances->amount_absence}}</td>
                  <td>{{$attendances->amount_takeleave}}</td>
                </tr>
            </tbody>
            @endforeach
        </table></center>
    </div>

</body>
</html>

@endsection
@extends('bar.header(student)')
