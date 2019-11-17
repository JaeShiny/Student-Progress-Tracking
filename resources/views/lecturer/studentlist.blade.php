@extends('bar.body')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
   <!-- Required meta tags -->
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">

   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>

    <title>รายชื่อนักศึกษา</title>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li> </li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            {{-- <li class="breadcrumb-item"><a href="{{ url('curriculum') }}">หลักสูตร(IT)</a></li> --}}
            {{-- <li class="breadcrumb-item"><a href="{{ url('course') }}">วิชาที่สอน</a></li> --}}
            <li class="breadcrumb-item active" aria-current="page"><a href="">รายชื่อนักศึกษา</a></li>
        </ol>
    </nav>

</head>

<body>

<h5 align='right'>
        <button type="button" class="btn btn-outline-warning">
        <a href="/importExportView/{{$course->course_id}}" style="text-decoration-line: none">เพิ่มไฟล์</a>
    </button>
    <button type="button" class="btn btn-outline-warning">
        {{-- <a href="/attendance/{{$course->course_id}}">แสดงผลการเข้าเรียน</a> --}}
        <a href="/attendance/{{$course->course_id}}/{{$gen->semester}}/{{$gen->year}}"  style="text-decoration-line: none">แสดงผลการเข้าเรียน</a>
    </button>
    <button type="button" class="btn btn-outline-warning">
        <a href="/showGrade/{{$course->course_id}}/{{$gen->semester}}/{{$gen->year}}"  style="text-decoration-line: none">แสดงผลการเรียน</a>
    </button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</h5>

    <h5 align='center'>{{$course->course_id}}</h5>
    <h6 align='center'>{{$course->course_name_eng}}</h6><br>

    <div class="container">
        <form action="/student_searchL/{{$course->course_id}}/{{$gen->semester}}/{{$gen->year}}" method="get">
            <div class="input-group">
                <input type="search" name="search" class="form-control">
                <span class="input-group-prepend">
                    <button type="submit" class="btn btn-primary">Search</button>
                </span>
            </div>
        <form><br>
    </div>

    <center>
            <table class="table" width="60%" style="margin-top: 10px; box-shadow: 5px 5px 8px 4px rgba(50, 50, 50, .5);">
            <thead class="thead-light">
              <tr>
                <th scope="col" width="10%"><h6 align="center"><b>รหัสนักศึกษา</b></h6></th>
                <th scope="col" width="35%"><h6 align="center"><b>ชื่อ</h6></b></th>
                <th scope="col" width="10%"><h6 align="center"><b>สถิติ</h6></b></th>
                <th scope="col" width="10%"><h6 align="center"><b>ประวัติ</h6></b></th>
                <th scope="col" width="10%"><h6 align="center"><b>การลงทะเบียน</h6></b></th>
                <th scope="col" width="10%"><h6 align="center"><b>พฤติกรรม</h6></b></th>
                <th scope="col" width="10%"><h6 align="center"><b>เพิ่มพฤติกรรม</h6></b></th>
                <th scope="col" width="10%"><h6 align="center"><b>ความเสี่ยง</h6></b></th>
                <th scope="col" width="10%"><h6 align="center"><b>แจ้งเตือน</h6></b></th>
                {{-- <th scope="col" width="10%"><h6 align="center"><b>ผลแบบสอบถาม</h6></b></th> --}}
              </tr>
            </thead>

            <tbody>

                @foreach ($student as $student)
              <tr>
                <td scope="row" width="10">
                    <a href="{{route('profileL',$student['student_id'])}}">
                        {{$student['student_id']}}
                    </a>
                </td>

                <td width="10">
                    <a href="{{route('profileL',$student['student_id'])}}">
                        {{$student['first_name']}} &nbsp;&nbsp; {{$student['last_name']}}
                    </a>
                </td>

                <td width="10">
                    <a href="/chartStudentL/{{$student['student_id']}}">
                        <center><img src="{{ URL::asset("../img/รูปสถิติ.png") }}" width="30" height="25" title="สถิติ"></center>
                    </a>
                </td>
                <td width="10">
                {{-- <a href="{{route('profileE',$bio['student_id'])}}"> --}}
                    <a href="{{route('profileL',$student['student_id'])}}">
                        <center><img src="{{ URL::asset("../img/resume.png") }}" width="25" title="ประวัตินักศึกษา"></center>
                    </a>
                </td>
                <td width="10">
                    {{-- <a href="{{route('enrollL',$student->study['student_id'])}}"> --}}
                        <a href="/student_enrollmentL/{{$student['student_id']}}/{{$gen->semester}}/{{$gen->year}}">
                        <center><img src="{{ URL::asset("../img/sct.png") }}" width="25" title="วิชาที่ลงทะเบียน"></center>
                    </a>
                </td>
                <td width="10">
                <a href="/studentproblem/{{$student['student_id']}}/1/{{$gen->year}}">
                        <center><img src="{{ URL::asset("../img/feedback.png") }}" width="25" title="พฤติกรรม/ปัญหา"></center>
                    </a>
                </td>
                <td width="10">
                    <a href="/problem_create/{{$student['student_id']}}">
                    {{-- <a href="{{route('create',$student->bio['student_id'])}}"> --}}
                        <center><img src="{{ URL::asset("../img/add.png") }}" width="25" title="เพิ่มพฤติกรรม/ปัญหา"></center>
                    </a>
                </td>
                <td width="10">
                    <a href="/notiproblemL/{{$student['student_id']}}">
                        <center><img src="{{ URL::asset("../img/caution.png") }}" width="30" height="25" title="ความเสี่ยง"></center>
                    </a>
                </td>
                <td width="10">
                    <a href="/studentNotiL/{{$student['student_id']}}?link_target=notification&course_id={{ $course->course_id }}&year={{ $year }}&semester={{ $semester[0]->semester }}">
                        {{-- <button type="button" class="btn btn-danger"> --}}
                             <span class="badge badge-light">
                                <img src="{{ URL::asset("../img/noti.png") }}" width="30" height="25" title="ความเสี่ยง">
                                <p style="color: red">{{ $student['number_of_notification'] }}</p>
                             </span>

                          {{-- </button> --}}
                        {{-- {{ $student['number_of_notification'] }} --}}

                    </a>
                </td>

              </tr>
            </tbody>
            @endforeach
          </table><br>
    </center>
          {{-- <p> ทั้งหมด {{$student->count()}} รายการ </p> --}}

          {{-- <br>{{$bio->links()}}<br> --}}

</body>
</html>

@endsection
@extends('bar.header(lec)')
