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
            <li>ภาคเรียนที่ 1 </li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <li class="breadcrumb-item"><a href="หลักสูตร.html">หลักสูตร(IT)</a></li>
          <li class="breadcrumb-item"><a href="selectyearit.html">ชั้นปี 1</a></li>
          <li class="breadcrumb-item active" aria-current="page">รายชื่อนักศึกษา</li>
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
            margin-left: 200px;
            align-self: center;
        }
    </style>
</head>

<body>

    <div class="container">
        <form action="/course/studentlist/search" method="get">
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
                <th scope="col" width="50">รหัสนักศึกษา</th>
                <th scope="col" width="70">ชื่อ</th>
                <th scope="col" width="10">สถิติ</th>
                <th scope="col" width="10">ประวัติ</th>
                <th scope="col" width="10">พฤติกรรม</th>
                <th scope="col" width="10">การแจ้งเตือน</th>
              </tr>
            </thead>

            <tbody>
                @foreach ($bio as $bio)
              <tr>
                <th scope="row" width="10"> {{$bio->student_id}}  </th>
                <td width="10"> {{$bio->first_name}}  &nbsp;&nbsp; {{$bio->last_name}}   </td>

                <td width="10">
                    <a href="">
                        <img src="../img/รูปสถิติ.png" width="30" height="25" title="สถิติ">
                    </a>
                </td>
                <td width="10">
                    <a href="">
                        <img src="../img/sct.png" width="25" title="ประวัตินักศึกษา">
                    </a>
                </td>
                <td width="10">
                    <a href="">
                        <img src="../img/ic.png" width="25" title="พฤติกรรม/ปัญหา">
                    </a>
                </td>
                <td width="10">
                    <a href="">
                        <img src="../img/รูปแจ้งเตือน.png" width="30" height="25" title="แจ้งเตือน">
                    </a>
                </td>
              </tr>
            </tbody>
            @endforeach
          </table>

          <p align="center"> ทั้งหมด {{$bio->count()}} รายการ </p>

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
@extends('bar.header(edu)')
@extends('bar.username')
