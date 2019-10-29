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
            {{-- <li class="breadcrumb-item"><a href="{{ url('curriculum') }}">หลักสูตร(IT)</a></li> --}}
            <li class="breadcrumb-item"><a href="{{ url('courseAL') }}">วิชาที่สอน</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="">รายชื่อนักศึกษา</a></li>
        </ol>
    </nav>

</head>

<body>

    <div class="container">
        <form action="/student_searchL" method="get">
            <div class="input-group">
                <input type="search" name="search" class="form-control">
                <span class="input-group-prepend">
                    <button type="submit" class="btn btn-primary">Search</button>
                </span>
            </div>
        <form><br>
    </div>


    <center>
        <table class="table" width="60%" style="margin-top: 10px;">
            <thead class="thead-light">
              <tr>
                <th scope="col" width="10%"><h6 align="center"><b>รหัสนักศึกษา</b></h6></th>
                <th scope="col" width="35%"><h6 align="center"><b>ชื่อ</h6></b></th>
                <th scope="col" width="10%"><h6 align="center"><b>สถิติ</h6></b></th>
                <th scope="col" width="10%"><h6 align="center"><b>ประวัติ</h6></b></th>
                <th scope="col" width="10%"><h6 align="center"><b>การลงทะเบียน</h6></b></th>
                <th scope="col" width="10%"><h6 align="center"><b>พฤติกรรม</h6></b></th>
                <th scope="col" width="10%"><h6 align="center"><b>เพิ่มพฤติกรรม</h6></b></th>
                <th scope="col" width="10%"><h6 align="center"><b>แจ้งเตือน</h6></b></th>
                <th scope="col" width="10%"><h6 align="center"><b>ผลแบบสอบถาม</h6></b></th>
              </tr>
            </thead>

            <tbody>

                @foreach ($student as $student)
              <tr>
                <td scope="row" width="10">
                    <a href="{{route('profileAL',$student->bio['student_id'])}}">
                        {{$student->student_id}}
                    </a>
                </td>

                <td width="10">
                    <a href="{{route('profileAL',$student->bio['student_id'])}}">
                        {{$student->bio->first_name}} &nbsp;&nbsp; {{$student->bio->last_name}}
                    </a>
                </td>

                <td width="10">
                    <a href="">
                        <center><img src="../img/รูปสถิติ.png" width="30" height="25" title="สถิติ"></center>
                    </a>
                </td>
                <td width="10">
                {{-- <a href="{{route('profileE',$bio['student_id'])}}"> --}}
                    <a href="{{route('profileAL',$student->bio['student_id'])}}">
                        <center><img src="../img/resume.png" width="25" title="ประวัตินักศึกษา"></center>
                    </a>
                </td>
                <td width="10">
                    <a href="{{route('enrollAL',$student->study['student_id'])}}">
                        <center><img src="../img/sct.png" width="25" title="วิชาที่ลงทะเบียน"></center>
                    </a>
                </td>
                <td width="10">
                    <a href="/studentproblemAL/{{$student->student_id}}">
                        <center><img src="../img/feedback.png" width="25" title="พฤติกรรม/ปัญหา"></center>
                    </a>
                </td>
                <td width="10">
                    <a href="/problem_createAL/{{$student->student_id}}">
                    {{-- <a href="{{route('create',$student->bio['student_id'])}}"> --}}
                        <center><img src="../img/add.png" width="25" title="เพิ่มพฤติกรรม/ปัญหา"></center>
                    </a>
                </td>
                <td width="10">
                    <a href="/notiproblemAL/{{$student->student_id}}">
                        <center><img src="../img/noti.png" width="30" height="25" title="แจ้งเตือน"></center>
                    </a>
                </td>
                <td width="10">
                    <a href="#">
                                <center><img src="{{ URL::asset("../img/qtn.png") }}" width="30" height="25" title="ผลแบบสอบถาม"></center>
                            </a>
                        </td>
              </tr>
            </tbody>
            @endforeach
          </table>
    </center>
          {{-- <p> ทั้งหมด {{$student->count()}} รายการ </p> --}}

          {{-- <br>{{$bio->links()}}<br> --}}



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>

@endsection
@extends('bar.header(AdLec)')
{{-- @extends('bar.username') --}}
