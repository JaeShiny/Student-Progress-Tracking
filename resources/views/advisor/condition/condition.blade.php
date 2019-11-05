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

    <title>เพิ่ม condition</title>

    <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li> </li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                {{-- <li class="breadcrumb-item" aria-current="page"><a href="/advisor/myStudent">รายชื่อนักศึกษา</a></li> --}}
                <li class="breadcrumb-item active" aria-current="page"><a href="">เพิ่มเงื่อนไขในการแจ้งเตือน</a></li>
            </ol>
    </nav>

<style>
.box {
  width: 600px;
  height: 100px;

  /* สไตล์สำหรับจัดให้อยู่กึ่งกลาง */
  position: absolute;
  top: 50%;
  left: 50%;
  /* margin-top: -100px; -(height/2) */
margin-top: -150px;
  margin-left: -280px; /* -(width/2) */
}
</style>

</head>
<body>

<br>
<div class="container">
    <div class="row">
        <div class="col-sm-3"></div>
            <div class="col-sm-6">

    <form action="/condition_insert" method="POST">
    {{-- <input type="hidden" name="student_id" value="{{$student_id}}"> --}}


    <div class="form-group">
        <label for="exampleFormControlSelect1">Behavior Attribute:
                <select class="form-control" id="exampleFormControlSelect1" name="behavior_attribute">
                  <option>Problem</option>
                  <option>Attendance</option>
                  <option>Grade</option>
                </select>
        </label>
    </div>

     <div class="form-group">
        <label for="exampleFormControlSelect1">Condition:
            <select class="form-control" id="exampleFormControlSelect1" name="condition">
                <option>></option>
                <option><</option>
                <option>>=</option>
                <option><=</option>
                <option>=</option>
            </select>
        </label>
     </div>
     <div class="form-group">
        <label for="usr">Value: </label>
        <input type="text" class="form-control" id="usr" name="value">
     </div>


        <div class="form-group">
            <label for="usr">รหัสวิชา:</label>
            <input type="text" class="form-control" id="usr" name="course_id">
        </div>



    <div class="container">
        <div class="form-group">
            <input type="submit" value="submit" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
        </div>
            <!-- Modal -->
            <div class="modal fade" id="myModal" role="dialog">
              <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content" style="background-color: #F0F8FF;" >
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                  </div>
                  <div class="modal-body">
                    <center><h5>บันทึกเงื่อนไขการแจ้งเตือนสำเร็จ</center></h5>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">ตกลง</button>
                  </div>
                </div>

              </div>
            </div>

    </div>
    @csrf

    </form>

            </div>
        </div>
    </div>
</div>

<a href="advisor/showNotiA" name="mode">กลับ</a></h6>

</body>
</html>


@endsection
@extends('bar.header(advi)')

