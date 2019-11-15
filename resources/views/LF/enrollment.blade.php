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
            {{-- <li class="breadcrumb-item"><a href="{{ url('courseLF') }}">วิชาที่สอน</a></li> --}}
            <li class="breadcrumb-item">รายชื่อนักศึกษา</li>
            <li class="breadcrumb-item active" aria-current="page"><a href="">การลงทะเบียน</a></li>
        </ol>
    </nav>
</head>
<body>
        <h6 align='right'>รหัสนักศึกษา: {{$student}} &nbsp;&nbsp;&nbsp;&nbsp;</h6><br>
        <div class="container">
            <div class="card bg-light mt" style="box-shadow: 5px 5px 8px 4px rgba(50, 50, 50, .5);">
                <div class="card-header">
                        <h4 class="w3-bar-item">การลงทะเบียน</h4>

                       {{-- <h6 class="w3-bar-item">ปีการศึกษา : {{$s.'/'.$y}}</h6> --}}
                </div>
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
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">{{$s.'/'.$y}}<span class="caret"></span></button>
                        <ul class="dropdown-menu scrollable-menu" role="menu" style="overflow: scroll;height: 200px;overflow-x: unset">
                            @foreach($gen as $show)
                            <li> <a class="dropdown-item" href="/student_enrollmentLF1/{{$bios->student_id}}/{{$show->semester}}/{{$show->year}}">{{$show->semester}}/{{$show->year}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>

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
      </table><br>
      </center>
</body>
</html>


@endsection
@extends('bar.header(LF)')

