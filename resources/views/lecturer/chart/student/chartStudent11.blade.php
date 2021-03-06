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

    <title>สถิติ</title>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li> </li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <li class="breadcrumb-item active" aria-current="page"><a href="#">สถิติ</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="">รหัสนักศึกษา: {{$bios->student_id}}</a></li>
        </ol>
    </nav>

</head>
<body>


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
<br>

    <div class="container">
        <div class="row">
            <div class="col-lg-12 float-right">
                <div class="btn-group">
                    <select name="s" id="s">

                        <option value="0">เทอม/ปีการศึกษา</option>

                        @foreach($s as $show)
                            <option value="{{$show->semester}}-{{$show->year}}">{{$show->semester}}/{{$show->year}}</option>
                        @endforeach

                      </select>
                </div>
            </div>
        </div>
    </div>
<br>

        <center>

            <h5><img src="{{ URL::asset("../img/รูปสถิติ.png") }}" width="30" height="25" title="สถิติ">สถิติด้านพฤติกรรมและปัญหา</h5>
                <p>เป็นสถิติที่รวบรวมจำนวนครั้งที่เกิดปัญหาในหัวข้อต่างๆของนักศึกษา</p><br><br><br><br>
            <center>
                <table class="table table-striped" id="problem">
                <thead">
                    <tr>
                        <th>ปัญหาในห้องเรียน</th>
                        <th>ปัญหานอกห้องเรียน</th>
                        <th>ปัญหาด้านสุขภาพ</th>
                        <th>ปัญหาด้านครอบครัว</th>
                        <th>ปัญหาด้านการเงิน</th>
                    </tr>
                </thead>
                <tbody>
                  {{-- <tr>
                        {{-- @foreach ($problem as $problems)
                            <td>{{$problems->course_id}}</td>
                        @endforeach --}}
                       {{-- <td>{{$problem1}} ครั้ง</td>
                        <td>{{$problem2}} ครั้ง</td>
                        <td>{{$problem3}} ครั้ง</td>
                        <td>{{$problem4}} ครั้ง</td>
                        <td>{{$problem5}} ครั้ง</td>
                    </tr> --}}

                </tbody>
            </table>
            <br><br>

            {{-- แจ้งเตือนการเข้าเรียน --}}
            <h5><img src="{{ URL::asset("../img/รูปสถิติ.png") }}" width="30" height="25" title="สถิติ">สถิติการเข้าเรียน</h5>
            <p>เป็นสถิติที่รวบรวมจำนวนครั้งการขาดเรียนของนักศึกษา</p><br><br><br><br>
        <center>
            <table class="table table-striped" id="attendance">
                <thead>
                    <tr>
                        <th scope="col">รหัสวิชา</th>
                        <th scope="col">จำนวนที่ขาด</th>

                    </tr>
                </thead>
                <tbody>
                   {{-- @foreach ($attendance as $attendances)
                <tr>
                    <td>{{$attendances->course_id}}</td>
                    <td>{{$attendances->amount_absence}} ครั้ง</td>
                </tr>
                @endforeach --}}

                </tbody>
            </table>
            <br><br>


            {{-- แจ้งเตือนผลการเรียน --}}
            <h5><img src="{{ URL::asset("../img/รูปสถิติ.png") }}" width="30" height="25" title="สถิติ">สถิติผลการเรียน</h5>
        <p>เป็นสถิติที่รวบรวมคะแนนที่ได้ในแต่ละวิชาของนักศึกษา</p><br><br><br><br>
    <center>
        <table class="table table-striped" id="grade">
                <thead>
                    <tr>
                        <th scope="col">รหัสวิชา</th>
                        <th scope="col">คะแนนรวมทั้งหมด</th>

                    </tr>
                </thead>
                <tbody>
                     {{-- @foreach ($grade as $grades)
            <tr>
                <td>{{$grades->course_id}}</td>
                <td>{{$grades->total_all}} คะแนน</td>
            </tr>
            @endforeach --}}

                </tbody>
            </table>
            <br><br>


        </center>


</body>
</html>


@endsection

@section('javascript')
    <script>

    $(function(){
        getData(0); // start when reload page
        $("#s").change(function(){ /// chacke when dropdown change and get value
            var semester_value = this.value;
            getData(semester_value);
        });
    });


        function getData(semester_value){
          var url ='{{ route('getChartL',['student_id' => $stu]) }}';
          var value = semester_value;

          if(semester_value != 0){
            url ='{{ route('getChartL',['student_id' => $stu,'s' =>'semester_value']) }}';/// same ->  /getNotiproblemA/{student_id}?semester_value=xx
            url = url.replace('semester_value', value);
          }

          console.log(url);
          $.ajax({
          type: 'GET', //THIS NEEDS TO BE GET
          url:  url,
          success: function (response) {
            // console.log(response);
             var risk_problem_len = 0;
             var risk_attendance_len = 0;
             var risk_grade_len = 0;

             $('#problemtbody').empty(); // Empty <tbody>
             $('#attendance tbody').empty(); // Empty <tbody>
             $('#grade tbody').empty(); // Empty <tbody>

            if(response['problem1'] != null){ /// ตรวจสอบ risk_problem ต้องไม่เป็นค่า null
               risk_problem_len = response['problem1'].length; // นับ Array Data risk_problem
             }
             if(response['problem2'] != null){ /// ตรวจสอบ risk_problem ต้องไม่เป็นค่า null
               risk_problem_len = response['problem2'].length; // นับ Array Data risk_problem
             }
             if(response['problem3'] != null){ /// ตรวจสอบ risk_problem ต้องไม่เป็นค่า null
               risk_problem_len = response['problem3'].length; // นับ Array Data risk_problem
             }
             if(response['problem4'] != null){ /// ตรวจสอบ risk_problem ต้องไม่เป็นค่า null
               risk_problem_len = response['problem4'].length; // นับ Array Data risk_problem
             }
             if(response['problem5'] != null){ /// ตรวจสอบ risk_problem ต้องไม่เป็นค่า null
               risk_problem_len = response['problem5'].length; // นับ Array Data risk_problem
             }

             if(response['attendance'] != null){ /// ตรวจสอบ risk_attendance ต้องไม่เป็นค่า null
               risk_attendance_len = response['attendance'].length; // นับ Array Data risk_attendance
             }

             if(response['grade'] != null){ /// ตรวจสอบ risk_attendance ต้องไม่เป็นค่า null
               risk_grade_len = response['grade'].length; // นับ Array Data risk_attendance
             }

             if(risk_problem_len > 0){  // นับ Array Data risk_problem มากกว่า 0 ทำงาน เงื่อนไขนี้
                 for(var i=0; i<risk_problem_len; i++){  // วนลูป
                   var tr_str = "<tr>" +
                        "<td align='center'>" + response['problem1'][i].problem_type + "</td>" +
                        "<td align='center'>" + response['problem2'][i].problem_type + "</td>" +
                        "<td align='center'>" + response['problem3'][i].problem_type + "</td>" +
                        "<td align='center'>" + response['problem4'][i].problem_type + "</td>" +
                        "<td align='center'>" + response['problem5'][i].problem_type + "</td>" +
                   "</tr>";
                   $("#problem tbody").append(tr_str);
                 }
             }else{
                var tr_str = "<tr>" +
                    "<td class='text-center' colspan='7'>ไม่พบข้อมูล</td>" +
                "</tr>";
                $("#problem tbody").append(tr_str);
             }
             /////////////////////////////////////////////////////////////////////////////

             if(risk_attendance_len > 0){  // นับ Array Data risk_attendance มากกว่า 0 ทำงาน เงื่อนไขนี้
                 for(var i=0; i<risk_attendance_len; i++){  // วนลูป
                   var tr_str = "<tr>" +
                        "<td align='center'>" + response['attendance'][i].course_id + "</td>" +
                        "<td align='center'>" + response['attendance'][i].amount_absence + "</td>" +
                   "</tr>";
                   $("#attendance tbody").append(tr_str);
                 }
             }else{
                var tr_str = "<tr>" +
                    "<td class='text-center' colspan='3'>ไม่พบข้อมูล</td>" +
                "</tr>";
                $("#attendance tbody").append(tr_str);
             }

             /////////////////////////////////////////////////////////////////////////////

             if(risk_grade_len > 0){  // นับ Array Data risk_grade_len มากกว่า 0 ทำงาน เงื่อนไขนี้
                 for(var i=0; i<risk_grade_len; i++){  // วนลูป
                   var tr_str = "<tr>" +
                        "<td align='center'>" + response['grade'][i].course_id + "</td>" +
                        "<td align='center'>" + response['grade'][i].total_all + "</td>" +
                   "</tr>";
                   $("#grade tbody").append(tr_str);
                 }
             }else{
                var tr_str = "<tr>" +
                    "<td class='text-center' colspan='3'>ไม่พบข้อมูล</td>" +
                "</tr>";
                $("#grade tbody").append(tr_str);
             }

          },
          error: function() {
              console.log('error');
          }
          });
        }
    </script>
@endsection

@extends('bar.header(lec)')
