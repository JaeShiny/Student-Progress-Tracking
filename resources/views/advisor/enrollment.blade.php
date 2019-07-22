@extends('bar.body')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>ปัญหา/พฤติกรรม</title>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li> </li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <li class="breadcrumb-item" aria-current="page"><a href="/advisor/myStudent">รายชื่อนักศึกษา</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="">การลงทะเบียน</a></li>
            </ol>
    </nav>
</head>
<body>
        <h6 align='right'>รหัสนักศึกษา: {{$student}} &nbsp;&nbsp;&nbsp;&nbsp;</h6>

        <h5 align='center'>การลงทะเบียน</h5>
        <br>
    {{-- <div class="dropdown">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          ปีการศึกษา&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
          <a class="dropdown-item" href="#">2/2561</a>
          <a class="dropdown-item" href="#">1/2561</a>
          <a class="dropdown-item" href="#">2/2560</a>
           <a class="dropdown-item" href="#">1/2560</a>
        </div>
    </div> --}}

      <br><br><br>
      <center>
          <table class="table table-bordered">

        <thead>

          <tr>
             <td class="table-secondary"><center><b>รหัสวิชา</b></center></td>
             <td class="table-secondary"><center><b>ชื่อวิชา</b></center></td>
             <td class="table-secondary"><center><b>เทอม</b></center></td>
             <td class="table-secondary"><center><b>ปี</b></center></td>
             <td class="table-secondary"><center><b>หน่วยกิต</b></center></td>
             <td class="table-secondary"><center><b>กลุ่ม</b></center></td>

          </tr>
        </thead>
        <tbody>
                @foreach($study as $study)
                <tr>
                  <th scope="row"><center>{{$study->course_id}}</center></th>
                  <td>{{$study->courses->course_name}}</td>
                  <td><center>{{$study->semester}}</center></td>
                  <td><center>{{$study->year}}</center></td>
                  <td><center>{{$study->credit}}</center></td>
                  <td><center>{{$study->section}}</center></td>
                </tr>
                @endforeach
        </tbody>
        {{-- <tfoot>
            <tr>
                <td colspan="5" class="text-center"><p style="float: left;"><center>จำนวนวิชา : 5</center></p></td>
            </tr>
            <tr>
                <td colspan="5" class="text-center"><p style="float: left;"><center>จำนวนหน่วยกิต : 15</center></p></td>
            </tr>
        </tfoot> --}}
      </table>
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

