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
            {{-- <li class="breadcrumb-item"><a href="{{ url('selectyear') }}">ชั้นปี</a></li> --}}
            <li class="breadcrumb-item active" aria-current="page"><a href="">รายชื่อนักศึกษา</a></li>
        </ol>
    </nav>

</head>

<body>

    <br>


    <center>


                <div class="card bg-light mb-3" style="max-width: 20rem; box-shadow: 5px 5px 8px 4px rgba(50, 50, 50, .5);">

                        <div class="card-header">
                            <h4>รายชื่อนักศึกษา</h4>
                        </div>

                </div>
            </center>

<h6 align='center'>ปีการศึกษา {{$gen->semester}}/{{$gen->year}}</h6><br>

    {{-- <div class="container">
        <form action="/AdLec/student_searchAL" method="get">
            <div class="input-group">
                <input type="search" name="search" class="form-control">
                <span class="input-group-prepend">
                    <button type="submit" class="btn btn-primary">Search</button>
                </span>
            </div>
        <form><br>
    </div> --}}

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
                <th scope="col" width="10%"><h6 align="center"><b>การเข้าเรียน</h6></b></th>
                <th scope="col" width="10%"><h6 align="center"><b>ผลการเรียน</h6></b></th>
                <th scope="col" width="10%"><h6 align="center"><b>แจ้งเตือน</h6></b></th>
              </tr>
            </thead>

            <tbody>

        @foreach($myStudent as $ad_list)
              <tr>
                <td scope="row" width="10">
                    <a href="{{route('profileAL',$ad_list->bio->student_id)}}">
                        {{$ad_list->bio->student_id}}
                    </a>
                </td>
                <td width="10">
                    <a href="{{route('profileAL',$ad_list->bio->student_id)}}">
                        {{$ad_list->bio->first_name}} &nbsp;&nbsp; {{$ad_list->bio->last_name}}
                    </a>
                </td>

                <td width="10">
                    <a href="/chartStudentAL/{{$ad_list->student_id}}">
                        <center><img src="{{ URL::asset("../img/รูปสถิติ.png") }}" width="30" height="25" title="สถิติ"></center>
                    </a>
                </td>
                <td width="10">
                {{-- <a href="{{route('profileE',$bio['student_id'])}}"> --}}
                    <a href="{{route('profileAL',$ad_list->bio->student_id)}}">
                    {{-- <a href="student_profileE/{{$student->bio['student_id']}}"> --}}
                        <center><img src="{{ URL::asset("../img/resume.png") }}" width="25" title="ประวัตินักศึกษา"></center>
                    </a>
                </td>
                <td width="10">
                    {{-- <a href="{{route('enrollAL',$ad_list->bio->study['student_id'])}}"> --}}
                            <a href="/student_enrollmentAL1/{{$ad_list->student_id}}/{{$gen->semester}}/{{$gen->year}}">
                        <center><img src="{{ URL::asset("../img/sct.png") }}" width="25" title="วิชาที่ลงทะเบียน"></center>
                    </a>
                </td>
                <td width="10">
                    {{-- <a href="/studentproblemAL/{{$ad_list->student_id}}/1/{{$gens->year}}"> --}}
                        <a href="/studentproblemAL/{{$ad_list->student_id}}">
                        <center><img src="{{ URL::asset("../img/feedback.png") }}" width="25" title="พฤติกรรม/ปัญหา"></center>
                    </a>
                </td>
                <td width="10">
                    <a href="/attendanceAL2/{{$ad_list->student_id}}/{{$se}}/{{$ye}}">
                        <center><img src="{{ URL::asset("../img/attendant.png") }}" width="30" height="25" title="การเข้าเรียน"></center>
                    </a>
                </td>
                <td width="10">
                    <a href="/showGradeAL2/{{$ad_list->student_id}}/{{$se}}/{{$ye}}">
                        <center><img src="{{ URL::asset("../img/grades.png") }}" width="30" height="25" title="ผลการเรียน"></center>
                    </a>
                </td>
                <td width="10">
                    <a href="/notiproblemAL/{{$ad_list->student_id}}">
                        <center><img src="{{ URL::asset("../img/noti.png") }}" width="30" height="25" title="แจ้งเตือน"></center>
                    </a>
                </td>
              </tr>
            </tbody>
            @endforeach
          </table>
<br><br><br><br>
          {{-- <p> ทั้งหมด {{$student->count()}} รายการ </p> --}}

          {{-- <br>{{$bio->links()}}<br> --}}
    </center>

</body>
</html>

@endsection
@extends('bar.header(AdLec)')
{{-- @extends('bar.username') --}}
