
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
            <li class="breadcrumb-item active" aria-current="page"><a href="">การลงทะเบียน</a></li>
        </ol>
    </nav>
</head>
<body>
        <h6 align='right'>รหัสนักศึกษา: {{$user->student_id}} &nbsp;&nbsp;&nbsp;&nbsp;</h6>

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
    <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="btn-group">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">เทอม/ปีการศึกษา<span class="caret"></span></button>
                        <ul class="dropdown-menu scrollable-menu" role="menu">
                            @foreach($gen as $show)
                            <li> <a class="dropdown-item" href="/studentenrollment/{{$show->semester}}/{{$show->year}}">{{$show->semester}}/{{$show->year}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>

      <br><br><br><br>
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
                {{-- @foreach($study as $study) --}}
                @foreach($study2 as $study)
                <tr>
                  <th scope="row"><center>{{$study->course_id}}</center></th>
                  <td>{{$study->courses->course_name}}</td>
                  <td><center>{{$study->semester}}</center></td>
                  <td><center>{{$study->year}}</center></td>
                  <td><center>{{$study->credit}}</center></td>
                  <td><center>{{$study->section}}</center></td>
                </tr>
                @endforeach
                {{-- @endforeach --}}
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
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>


@endsection
@extends('bar.header(student)')

