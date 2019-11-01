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

    <title>รายชื่อนักศึกษา</title>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li> </li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <li class="breadcrumb-item"><a href="{{ url('curriculum') }}">หลักสูตร</a></li>
            {{-- <li class="breadcrumb-item"><a href="{{ url('selectyear') }}">ชั้นปี</a></li> --}}
            <li class="breadcrumb-item active" aria-current="page"><a href="">รายชื่อนักศึกษา</a></li>
        </ol>
    </nav>
</head>

<body>

    <div class="container">
        <form action="/student_searchE" method="get">
            <div class="input-group">
                <input type="search" name="search" class="form-control">
                <span class="input-group-prepend">
                    <button type="submit" class="btn btn-primary">Search</button>
                </span>
            </div>
        <form><br>
    </div>

    {{-- <div class="dropdown">
            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              เลือกปี
            </a>

            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            @foreach($gen as $show)
            <a class="dropdown-item" href="/studentlist/{{$course}}/{{$show->year}}">{{$show->gen}}|{{$show->year}}</a>
              @endforeach
            </div>
          </div> --}}

    <center>
        <table class="table" width="60%" style="margin-top: 10px;">
            <thead class="thead-light">
              <tr>
                <th scope="col" width="10%"><h6 align="center"><b>รหัสนักศึกษา</b></h6></th>
                <th scope="col" width="35%"><h6 align="center"><b>ชื่อ</h6></b></th>
                <th scope="col" width="10%"><h6 align="center"><b>สถิติ</h6></b></th>
                <th scope="col" width="10%"><h6 align="center"><b>ประวัติ</h6></b></th>
                <th scope="col" width="10%"><h6 align="center"><b>การลงทะเบียน</h6></b></th>
                <th scope="col" width="10%"><h6 align="center"><b>เพิ่มพฤติกรรม</h6></b></th>
                <th scope="col" width="10%"><h6 align="center"><b>พฤติกรรม</h6></b></th>
                <th scope="col" width="10%"><h6 align="center"><b>การเข้าเรียน</h6></b></th>
                <th scope="col" width="10%"><h6 align="center"><b>ผลการเรียน</h6></b></th>
                <th scope="col" width="10%"><h6 align="center"><b>แจ้งเตือน</h6></b></th>
              </tr>
            </thead>

            <tbody>

                @foreach ($student as $student)
              <tr>
                <td scope="row" width="10">
                <a href="{{route('profileE',$student->student_id)}}">
                    {{$student->student_id}} </td>
                </a>
                <td width="10">

                <a href="{{route('profileE',$student->student_id)}}">
                    {{$student->first_name}} &nbsp;&nbsp; {{$student->last_name}}
                </a>
                </td>

                <td width="10">
                    <a href="/chartStudentE/{{$student->student_id}}">
                        {{-- <center><img src="../img/รูปสถิติ.png" width="30" height="25" title="สถิติ"></center> --}}
                        <center><img src={{ URL::asset("../img/รูปสถิติ.png") }} width="30" height="25" title="สถิติ"></center>
                    </a>
                </td>
                <td width="10">
                {{-- <a href="{{route('profileE',$bio['student_id'])}}"> --}}
                    <a href="{{route('profileE',$student->student_id)}}">
                    {{-- <a href="student_profileE/{{$student->bio['student_id']}}"> --}}
                        {{-- <center><img src="../img/resume.png" width="25" title="ประวัตินักศึกษา"></center> --}}
                        <center><img src={{ URL::asset("../img/resume.png") }} width="25" title="ประวัตินักศึกษา"></center>
                    </a>
                </td>
                <td width="10">
                    <a href="{{route('enrollE',$student->study['student_id'])}}">
                        {{-- <center><img src="../img/sct.png" width="25" title="วิชาที่ลงทะเบียน"></center> --}}
                        <center><img src={{ URL::asset("img/sct.png") }} width="25" title="วิชาที่ลงทะเบียน"></center>
                    </a>
                </td>
                <td width="10">
                    <a href="/problem_createE/{{$student->student_id}}">
                        {{-- <center><img src="../img/add.png" width="25" title="เพิ่มพฤติกรรม/ปัญหา"></center> --}}
                        <center><img src={{ URL::asset("../img/add.png") }} width="25" title="เพิ่มพฤติกรรม/ปัญหา"></center>
                    </a>
                </td>
                <td width="10">
                <a href="/studentproblemE/{{$student->student_id}}/1/2019">

                        {{-- <center><img src="../img/feedback.png" width="25" title="พฤติกรรม/ปัญหา"></center> --}}
                        <center><img src={{ URL::asset("../img/feedback.png") }} width="25" title="พฤติกรรม/ปัญหา"></center>
                    </a>
                </td>
                   <td width="10">
                    <a href="/attendanceE/{{$student->student_id}}">
                        <center><img src={{ URL::asset("../img/attendant-list.png") }}  width="30" height="25" title="การเข้าเรียน"></center>
                    </a>
                </td>
                <td width="10">
                    <a href="/showGradeE/{{$student->student_id}}">
                        <center><img src={{ URL::asset("../img/grades.png") }}  width="30" height="25" title="ผลการเรียน"></center>
                    </a>
                </td>
                <td width="10">
                    <a href="/notiproblemE/{{$student->student_id}}">
                        {{-- <center><img src="../img/noti.png" width="30" height="25" title="แจ้งเตือน"></center> --}}
                        <center><img src={{ URL::asset("../img/noti.png") }}  width="30" height="25" title="แจ้งเตือน"></center>
                    </a>
                </td>
              </tr>
            </tbody>
            @endforeach
          </table>

          {{-- <p> ทั้งหมด {{$student->count()}} รายการ </p> --}}

          {{-- <br>{{$bio->links()}}<br> --}}

    </center>


</body>
</html>

@endsection
@extends('bar.header(edu)')
{{-- @extends('bar.username') --}}
