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
            <li class="breadcrumb-item active" aria-current="page"><a href="/advisor/myStudent">รายชื่อนักศึกษา</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="/advisor/showAtt">การเข้าเรียนและผลการเรียน</a></li>
        </ol>
    </nav>
</head>

<body>

    <div class="container">
        <form action="/student_searchA" method="get">
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
                <th scope="col" width="35%"><h6 align="center"><b>ชื่อ - สกุล</h6></b></th>
                <th scope="col" width="10%"><h6 align="center"><b>การเข้าเรียน</h6></b></th>
                <th scope="col" width="10%"><h6 align="center"><b>ผลการเรียน</h6></b></th>

              </tr>
            </thead>

            <tbody>

        @foreach($myStudent as $ad_list)
              <tr>
                <td scope="row" width="10">
                        <center>
                    <a href="{{route('profileA',$ad_list->bio->student_id)}}">
                        {{$ad_list->bio->student_id}}
                    </a></center>
                </td>
                <td width="10">
                    <a href="{{route('profileA',$ad_list->bio->student_id)}}">
                        {{$ad_list->bio->first_name}} &nbsp;&nbsp; {{$ad_list->bio->last_name}}
                    </a>
                </td>

                {{-- <td width="10">
                    <a href="{{route('enrollA',$ad_list->bio->study['student_id'])}}">
                        <center><img src="../img/sct.png" width="25" title="การเข้าเรียน"></center>
                    </a>
                </td> --}}
                <td width="10">
                    <a href="/attendanceA/{{$ad_list->student_id}}">
                        <center><img src="../img/attendant-list.png" width="25" title="การเข้าเรียน"></center>
                    </a>
                </td>

                <td width="10">
                    <a href="/showGradeA/{{$ad_list->student_id}}">
                        <center><img src="../img/grades.png" width="25" title="ผลการเรียน"></center>
                    </a>
                </td>

              </tr>
            </tbody>
            @endforeach
          </table>

          {{-- <p> ทั้งหมด {{$student->count()}} รายการ </p> --}}

          {{-- <br>{{$bio->links()}}<br> --}}
    </center>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>

@endsection
@extends('bar.header(advi)')
