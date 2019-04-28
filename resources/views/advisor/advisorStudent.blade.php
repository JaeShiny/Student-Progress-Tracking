@extends('bar.body')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
   <!-- Required meta tags -->
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

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
    <style>
        .div1{
            /* magin-left : auto;
            magin-right : auto;
            position: absolute;
            top: 50%;
            left: 50%;
            height: 100px;*/
            margin-top: 60px;
            /* width: 250px;  */
            margin-left: 250px;
            align-self: center;
        }
    </style>
</head>

<body>

    <div class="container">
        <form action="/student_search" method="get">
            <div class="input-group">
                <input type="search" name="search" class="form-control">
                <span class="input-group-prepend">
                    <button type="submit" class="btn btn-primary">Search</button>
                </span>
            </div>
        <form><br>
    </div>

    <div class="div1">
        <table class="table">
            <thead class="thead-light">
              <tr>
                <th scope="col" width="15%"><h6 align="center"><b>รหัสนักศึกษา</b></h6></th>
                <th scope="col" width="35%"><h6 align="center"><b>ชื่อ</h6></b></th>
                <th scope="col" width="10%"><h6 align="center"><b>สถิติ</h6></b></th>
                <th scope="col" width="10%"><h6 align="center"><b>ประวัติ</h6></b></th>
                <th scope="col" width="10%"><h6 align="center"><b>การลงทะเบียน</h6></b></th>
                <th scope="col" width="10%"><h6 align="center"><b>พฤติกรรม</h6></b></th>
                <th scope="col" width="10%"><h6 align="center"><b>แจ้งเตือน</h6></b></th>
              </tr>
            </thead>

            <tbody>

        @foreach($myStudent as $ad_list)
              <tr>
                <td scope="row" width="10">
                    <a href="{{route('profileA',$ad_list->bio->student_id)}}">
                        {{$ad_list->bio->student_id}}
                    </a>
                </td>
                <td width="10">
                    <a href="{{route('profileA',$ad_list->bio->student_id)}}">
                        {{$ad_list->bio->first_name}} &nbsp;&nbsp; {{$ad_list->bio->last_name}}
                    </a>
                </td>

                <td width="10">
                    <a href="">
                        <center><img src="../img/รูปสถิติ.png" width="30" height="25" title="สถิติ"></center>
                    </a>
                </td>
                <td width="10">
                {{-- <a href="{{route('profileE',$bio['student_id'])}}"> --}}
                    <a href="{{route('profileA',$ad_list->bio->student_id)}}">
                    {{-- <a href="student_profileE/{{$student->bio['student_id']}}"> --}}
                        <center><img src="../img/resume.png" width="25" title="ประวัตินักศึกษา"></center>
                    </a>
                </td>
                <td width="10">
                    <a href="">
                        <center><img src="../img/sct.png" width="25" title="วิชาที่ลงทะเบียน"></center>
                    </a>
                </td>
                <td width="10">
                    <a href="/studentproblemA/{{$ad_list->student_id}}">
                        <center><img src="../img/feedback.png" width="25" title="พฤติกรรม/ปัญหา"></center>
                    </a>
                </td>
                <td width="10">
                    <a href="">
                        <center><img src="../img/noti.png" width="30" height="25" title="แจ้งเตือน"></center>
                    </a>
                </td>
              </tr>
            </tbody>
            @endforeach
          </table>

          {{-- <p> ทั้งหมด {{$student->count()}} รายการ </p> --}}

          {{-- <br>{{$bio->links()}}<br> --}}

    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>

@endsection
@extends('bar.header(advi)')
@extends('bar.username')