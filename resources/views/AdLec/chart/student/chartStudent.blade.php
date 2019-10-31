@extends('bar.body')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
   <!-- Required meta tags -->
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>สถิติ</title>



</head>

<body>
@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li> </li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <li class="breadcrumb-item active" aria-current="page"><a href="#">สถิติ</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="">รหัสนักศึกษา: {{$bios->student_id}}</a></li>
        </ol>
    </nav>

<h6 align='right'>รหัสนักศึกษา: {{$bios->student_id}} &nbsp;&nbsp;&nbsp;&nbsp;</h6>
<h6 align='right'>ชื่อ-สกุล: {{$bios->first_name}} &nbsp;{{$bios->last_name}}&nbsp;&nbsp;&nbsp;</h6>

<br>
<div class="container">
    <div class="row">
        <div class="col-sm-4">

        </div>
        <div class="col-sm-5">
            <div class="card bg-light mb-3" style="max-width: 20rem; box-shadow: 5px 5px 8px 4px rgba(50, 50, 50, .5);" "> {{--box-shadow: 5px 5px 8px 4px rgba(50, 50, 50, .5);">--}}
                <center>
                    <div class="card-header">
                        <h4>สถิติ</h4>
                    </div>
                </center>
            </div>
        </div>
        {{-- <div class="col-sm-12"> --}}

            <div class="container">

                <h5><img src="{{ URL::asset("../img/รูปสถิติ.png") }}" width="30" height="25" title="สถิติ">สถิติด้านพฤติกรรมและปัญหา</h5>
                <p>เป็นสถิติที่รวบรวมจำนวนครั้งที่เกิดปัญหาในหัวข้อต่างๆของนักศึกษา</p><br><br><br><br>
            <center>
                <table class="table table-striped">
                  <thead>
                    <tr>
                      {{-- <th>รหัสวิชา</th> --}}
                      <th>ปัญหาในห้องเรียน</th>
                      <th>ปัญหานอกห้องเรียน</th>
                      <th>ปัญหาด้านสุขภาพ</th>
                      <th>ปัญหาด้านครอบครัว</th>
                      <th>ปัญหาด้านการเงิน</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                        {{-- @foreach ($problem as $problems)
                            <td>{{$problems->course_id}}</td>
                        @endforeach --}}
                        <td>{{$problem1}} ครั้ง</td>
                        <td>{{$problem2}} ครั้ง</td>
                        <td>{{$problem3}} ครั้ง</td>
                        <td>{{$problem4}} ครั้ง</td>
                        <td>{{$problem5}} ครั้ง</td>
                    </tr>
                  </tbody>
                </table>
            </center>
            <br><br>

            <h5><img src="{{ URL::asset("../img/รูปสถิติ.png") }}" width="30" height="25" title="สถิติ">สถิติการเข้าเรียน</h5>
            <p>เป็นสถิติที่รวบรวมจำนวนครั้งการขาดเรียนของนักศึกษา</p><br><br><br><br>
        <center>
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>รหัสวิชา</th>
                  <th>จำนวนการขาดเรียน</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($attendance as $attendances)
                <tr>
                    <td>{{$attendances->course_id}}</td>
                    <td>{{$attendances->amount_absence}} ครั้ง</td>
                </tr>
                @endforeach
              </tbody>
            </table>
        </center>
        <br><br>

        <h5><img src="{{ URL::asset("../img/รูปสถิติ.png") }}" width="30" height="25" title="สถิติ">สถิติผลการเรียน</h5>
        <p>เป็นสถิติที่รวบรวมคะแนนที่ได้ในแต่ละวิชาของนักศึกษา</p><br><br><br><br>
    <center>
        <table class="table table-striped">
          <thead>
            <tr>
              <th>รหัสวิชา</th>
              <th>คะแนนรวมที่ได้</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($grade as $grades)
            <tr>
                <td>{{$grades->course_id}}</td>
                <td>{{$grades->total_all}} คะแนน</td>
            </tr>
            @endforeach
          </tbody>
        </table>
    </center>
    <br><br>


        </div>
    </div>
</div>

<br>




@endsection
</body>

</html>

@endsection
@extends('bar.header(AdLec)')

