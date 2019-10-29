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

    <title>เพิ่มปัญหา/พฤติกรรม</title>

    <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li> </li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <li class="breadcrumb-item" aria-current="page"><a href="/advisor/myStudent">รายชื่อนักศึกษา</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="">เพิ่มพฤติกรรม/ปัญหาของนักศึกษา</a></li>
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
    <h6 align='right'>รหัสนักศึกษา: {{$student_id}} &nbsp;&nbsp;&nbsp;&nbsp;</h6>
    <h5 align='center'>เพิ่มพฤติกรรม/ปัญหา ของนักศึกษา</h5>
<br>
<div class="container">
    <div class="row">
        <div class="col-sm-3"></div>
            <div class="col-sm-6">

    <form action="/problem_insert" method="POST">
    <input type="hidden" name="student_id" value="{{$student_id}}">


    <div class="form-group">
        <label for="usr">รหัสวิชา:</label>
        <input type="text" class="form-control" id="usr" name="course_id">
    </div>

     <div class="form-group">
            <label for="exampleFormControlSelect1">เทอม:
                <select class="form-control" id="exampleFormControlSelect1" name="semester">
                  <option>1</option>
                  <option>2</option>
                </select>
            </label>&nbsp;&nbsp;
            <label for="exampleFormControlSelect1">ปีการศึกษา:
                <select class="form-control" id="exampleFormControlSelect1" name="year">
                    <option>2018</option>
                    <option>2019</option>
                    <option>2020</option>
                    <option>2021</option>
                    <option>2022</option>
                    <option>2023</option>
                    <option>2024</option>
                    <option>2025</option>
                </select>
            </label>
        </div>

        <div class="form-group">
            <label for="exampleFormControlSelect1">ประเภทของ พฤติกรรม/ปัญหา ของนักศึกษา:
                <select class="form-control" id="exampleFormControlSelect1" name="problem_type">
                  <option>พฤติกรรม/ปัญหา ในห้องเรียน</option>
                  <option>พฤติกรรม/ปัญหา นอกห้องเรียน</option>
                  <option>พฤติกรรม/ปัญหา ด้านสุขภาพ</option>
                  <option>พฤติกรรม/ปัญหา ด้านครอบครัว</option>
                  <option>พฤติกรรม/ปัญหา ด้านการเงิน</option>
                </select></label>
        </div>

        <div class="form-group">
            <label for="usr">หัวข้อปัญหา:</label>
            <input type="text" class="form-control" id="usr" name="problem_topic">
        </div>

        <div class="form-group">
            <label for="exampleFormControlTextarea1">รายละเอียด พฤติกรรม/ปัญหา ของนักศึกษา:</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="problem_detail"></textarea>
        </div>

        <div class="form-group">
            <label for="exampleFormControlSelect1">ระดับความรุนแรง:
                <select class="form-control" id="exampleFormControlSelect1" name="risk_level">
                  <option>ปกติ</option>
                  <option>รุนแรงมาก</option>

                </select></label>
        </div>
        <div class="form-group">
            <label for="usr">วันที่เกิดปัญหา:</label>
            <input type="text" class="form-control" id="usr" name="date">
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
                    <center><h5>บันทึกข้อมูลพฤติกรรม/ปัญหาสำเร็จ</center></h5>
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

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>


@endsection
@extends('bar.header(advi)')

