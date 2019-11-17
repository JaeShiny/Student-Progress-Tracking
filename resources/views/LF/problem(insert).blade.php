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
                {{-- <li class="breadcrumb-item"><a href="{{ url('courseLF') }}">วิชาที่สอน</a></li> --}}
                <li class="breadcrumb-item" aria-current="page">รายชื่อนักศึกษา</li>
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

        <div class="container">
                <div class="row">
                        <div class="col-sm-1"></div>
                        <div class="col-xl-10">
                                <div class="form-group" style="background-color:#E6E6E6;margin-top: 2%;box-shadow: 5px 5px 8px 4px rgba(50, 50, 50, .5);">
                                        <div class="card mb-3" style="max-width: 60rem; background-color: #FFFFFF;border-bottom-color: teal">
                                                <div class="card-header">
                                                <h4><img src="{{ URL::asset("../img/add.png") }}" width="30" height="30">&nbsp;เพิ่มพฤติกรรม/ปัญหา ของนักศึกษา</h4>


                                              </div>
                                        </div>

                            <div class="card"style="background-color:#E6E6E6;margin-top: -1.8%; box-shadow: 5px 5px 8px 4px rgba(50, 50, 50, .5);">
                                <div class="card-header" style="background-color:#E6E6FA">

    <form action="/problem_insert" method="POST">
    <input type="hidden" name="student_id" value="{{$student_id}}">


    <div class="form-group">
        <label for="usr">รหัสวิชา:</label><img src="{{ URL::asset("../img/asterisk.png") }}" width="5" height="5" style="margin-top: -2%">
        <input type="text" class="form-control" id="usr" name="course_id">
    </div>

     <div class="form-group">
            <label for="exampleFormControlSelect1">เทอม:<img src="{{ URL::asset("../img/asterisk.png") }}" width="5" height="5" style="margin-top: -2%">
                <select class="form-control" id="exampleFormControlSelect1" name="semester">
                  <option>1</option>
                  <option>2</option>
                </select>
            </label>&nbsp;&nbsp;
            <label for="exampleFormControlSelect1">ปีการศึกษา:<img src="{{ URL::asset("../img/asterisk.png") }}" width="5" height="5" style="margin-top: -2%">
                <select class="form-control" id="exampleFormControlSelect1" name="year">
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
            <label for="exampleFormControlSelect1">ประเภทของ พฤติกรรม/ปัญหา ของนักศึกษา:<img src="{{ URL::asset("../img/asterisk.png") }}" width="5" height="5" style="margin-top: -2%">
                <select class="form-control" id="exampleFormControlSelect1" name="problem_type">
                    @foreach($problemType as $type)
                        <option>{{$type->problem_type}}</option>
                    @endforeach
                </select></label>
        </div>

        <div class="form-group">
            <label for="usr">หัวข้อปัญหา:</label><img src="{{ URL::asset("../img/asterisk.png") }}" width="5" height="5" style="margin-top: -2%">
            <input type="text" class="form-control" id="usr" name="problem_topic">
        </div>

        <div class="form-group">
            <label for="exampleFormControlTextarea1">รายละเอียด พฤติกรรม/ปัญหา ของนักศึกษา:</label><img src="{{ URL::asset("../img/asterisk.png") }}" width="5" height="5" style="margin-top: -2%">
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="problem_detail"></textarea>
        </div>

        <div class="form-group">
            <label for="exampleFormControlSelect1">ระดับความรุนแรง:<img src="{{ URL::asset("../img/asterisk.png") }}" width="5" height="5" style="margin-top: -2%">
                <select class="form-control" id="exampleFormControlSelect1" name="risk_level">
                  <option value="1">1 = น้อยมาก</option>
                  <option value="2">2 = ต่ำ</option>
                  <option value="3">3 = ปานกลาง</option>
                  <option value="4">4 = สูง</option>
                  <option value="5">5 = สูงมาก</option>

                </select></label>
        </div>
        <div class="form-group">
            <label for="usr">วันที่เกิดปัญหา:</label><img src="{{ URL::asset("../img/asterisk.png") }}" width="5" height="5" style="margin-top: -2%">
            <input type="text" class="form-control" id="usr" name="date" placeholder="วว/ดด/ปป">
        </div>

        {{-- <div class="form-group">
            <label for="exampleFormControlTextarea1">ผู้เพิ่ม:</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="person_add"></textarea>
        </div> --}}
        {{-- <div class="form-group">
            <label for="usr">ผู้เพิ่ม:</label>
            <input type="text" class="form-control" id="usr" name="person_add">
        </div> --}}
        {{-- <center><button type="submit" class="btn btn-primary">Submit</button></center> --}}


    {{--
        <div class="form-group">
            <input type="submit" value="submit" class="btn btn-primary">
            <a href="{{ action('lecturer\ProblemController@insert') }}"></a>
        </div>
    @csrf --}}

    <div class="container">
            <div class="form-group" style="position: relative;float: right;right: -2%">
                    <input type="submit" value="บันทึก" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
        </div>
            <!-- Modal -->
            <div class="modal fade" id="myModal" role="dialog">
              <div class="modal-dialog">
                    <br><br><br><br><br>
                <!-- Modal content-->
                <div class="modal-content" style="background-color: white;" >

                        <div>
                              <br><br>
                              <center><img src="{{ URL::asset("../img/success.jpg") }}" width="100" height="100"></center>
                              <br>
                          <center><h5>บันทึกข้อมูลพฤติกรรม/ปัญหาสำเร็จ</center></h5>
                          <br><br>
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


</body>
</html>


@endsection
@extends('bar.header(LF)')

