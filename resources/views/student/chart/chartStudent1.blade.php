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

    {{-- <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li> </li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <li class="breadcrumb-item active" aria-current="page"><a href="#">สถิติ</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="">รหัสนักศึกษา: {{$bios->student_id}}</a></li>
        </ol>
    </nav>

<h6 align='right'>รหัสนักศึกษา: {{$bios->student_id}} &nbsp;&nbsp;&nbsp;&nbsp;</h6>
<h6 align='right'>ชื่อ-สกุล: {{$bios->first_name}} &nbsp;{{$bios->last_name}}&nbsp;&nbsp;&nbsp;</h6> --}}

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li> </li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <li class="breadcrumb-item active" aria-current="page"><a href="#">สถิติ</a></li>
        <li class="breadcrumb-item active" aria-current="page"><a href="">รหัสนักศึกษา: {{$bios->student_id}}</a></li>
    </ol>
</nav>


<ul class="nav nav-tabs" id="myTab" role="tablist" style="background-color:white;">
<li class="nav-item">
    <a class="nav-link" href="/chartAttendanceS" style="color: #000000;">สถิติการเข้าเรียน</a>
</li>
<li class="nav-item">
    <a class="nav-link" href="/chartGradeS" style="color: #000000;">สถิติผลการเรียน</a>
</li>
<li class="nav-item">
    <a class="nav-link active" href="/chartStudentS/{{$bios->student_id}}" style="color: #000000;">สรุปสถิติ</a>
</li>
</ul><br>

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
                        {{-- <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">เทอม/ปีการศึกษา<span class="caret"></span></button>
                        <ul class="dropdown-menu scrollable-menu" role="menu">
                            @foreach($semester as $show)
                        <li> <a class="dropdown-item" href="">{{$show->semester}}/{{$show->year}}</a></li><br>
                            @endforeach
                        </ul> --}}
                          <select name="s" id="s">

                            @foreach($s as $show)

                            {{-- <option value="0">เทอม/ปีการศึกษา</option> --}}
                          <option value="0">{{$show->semester}}/{{$show->year}}</option>

                                <option value="{{$show->semester}}-{{$show->year}}">{{$show->semester}}/{{$show->year}}</option>

                              @endforeach

                          </select>
                    </div>
                </div>
            </div>
        </div>
    <br><br>


        {{-- <div class="col-sm-12"> --}}

            <div class="container">



            <h5><img src="{{ URL::asset("../img/รูปสถิติ.png") }}" width="30" height="25" title="สถิติ">สถิติการเข้าเรียน</h5>
            <p>เป็นสถิติที่รวบรวมจำนวนครั้งการขาดเรียนของนักศึกษา</p><br><br><br><br>
        <center>
            <table class="table table-striped" id="attendance">
              <thead>
                <tr>
                  <th>รหัสวิชา</th>
                  <th>จำนวนการขาดเรียน</th>
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
        </center>
        <br><br>

        <h5><img src="{{ URL::asset("../img/รูปสถิติ.png") }}" width="30" height="25" title="สถิติ">สถิติผลการเรียน</h5>
        <p>เป็นสถิติที่รวบรวมคะแนนที่ได้ในแต่ละวิชาของนักศึกษา</p><br><br><br><br>
    <center>
        <table class="table table-striped" id="grade">
          <thead>
            <tr>
              <th>รหัสวิชา</th>
              <th>คะแนนรวมที่ได้</th>
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
    </center>
    <table id="test">

    </table>
    <br><br>


        </div>
    </div>
</div>

<br>




@endsection
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
          var url ='{{ route('getChartS',['student_id' => $stu]) }}';
          var value = semester_value;

          if(semester_value != 0){
            url ='{{ route('getChartS',['student_id' => $stu,'s' =>'semester_value']) }}';/// same ->  /getNotiproblemA/{student_id}?semester_value=xx
            url = url.replace('semester_value', value);
          }

          console.log(url);
          $.ajax({
          type: 'GET', //THIS NEEDS TO BE GET
          url:  url,
          success: function (response) {
            // console.log(response);
            var risk_problem_len = 0;
            //  var risk_problem1_len = 0;
            //  var risk_problem2_len = 0;
            //  var risk_problem3_len = 0;
            //  var risk_problem4_len = 0;
            //  var risk_problem5_len = 0;
             var risk_attendance_len = 0;
             var risk_grade_len = 0;

            //  $('#problem tbody').empty(); // Empty <tbody>
             $('#attendance tbody').empty(); // Empty <tbody>
             $('#grade tbody').empty(); // Empty <tbody>

            //     if(response['problem1'] != null){ /// ตรวจสอบ risk_problem ต้องไม่เป็นค่า null
            //    risk_problem_len = response['problem1'].length; // นับ Array Data risk_problem
            //  }
            //  if(response['problem2'] != null){ /// ตรวจสอบ risk_problem ต้องไม่เป็นค่า null
            //    risk_problem_len = response['problem2'].length; // นับ Array Data risk_problem
            //  }
            //  if(response['problem3'] != null){ /// ตรวจสอบ risk_problem ต้องไม่เป็นค่า null
            //    risk_problem_len = response['problem3'].length; // นับ Array Data risk_problem
            //  }
            //  if(response['problem4'] != null){ /// ตรวจสอบ risk_problem ต้องไม่เป็นค่า null
            //    risk_problem_len = response['problem4'].length; // นับ Array Data risk_problem
            //  }
            //  if(response['problem5'] != null){ /// ตรวจสอบ risk_problem ต้องไม่เป็นค่า null
            //    risk_problem_len = response['problem5'].length; // นับ Array Data risk_problem
            //  }
            //  if(response['problem1'] != null){ /// ตรวจสอบ risk_problem ต้องไม่เป็นค่า null
            //    risk_problem1_len = response['problem1'].length; // นับ Array Data risk_problem
            //  }
            //  if(response['problem2'] != null){ /// ตรวจสอบ risk_problem ต้องไม่เป็นค่า null
            //    risk_problem2_len = response['problem2'].length; // นับ Array Data risk_problem
            //  }
            //  if(response['problem3'] != null){ /// ตรวจสอบ risk_problem ต้องไม่เป็นค่า null
            //    risk_problem3_len = response['problem3'].length; // นับ Array Data risk_problem
            //  }
            //  if(response['problem4'] != null){ /// ตรวจสอบ risk_problem ต้องไม่เป็นค่า null
            //    risk_problem4_len = response['problem4'].length; // นับ Array Data risk_problem
            //  }
            //  if(response['problem5'] != null){ /// ตรวจสอบ risk_problem ต้องไม่เป็นค่า null
            //    risk_problem1_len5 = response['problem5'].length; // นับ Array Data risk_problem
            //  }
             if(response['attendance'] != null){ /// ตรวจสอบ risk_attendance ต้องไม่เป็นค่า null
               risk_attendance_len = response['attendance'].length; // นับ Array Data risk_attendance
             }

             if(response['grade'] != null){ /// ตรวจสอบ risk_attendance ต้องไม่เป็นค่า null
               risk_grade_len = response['grade'].length; // นับ Array Data risk_attendance
             }

             ////////////////////////////////////////////////////////////////////////////////////////

            //  if(risk_problem_len > 0){  // นับ Array Data risk_problem มากกว่า 0 ทำงาน เงื่อนไขนี้
            //      for(var i=0; i<risk_problem1_len; i++){  // วนลูป
            //        var tr_str = "<tr>" +
            //             "<td align='center'>" + response['problem1'][i].problem_type + "</td>" +
            //             "<td align='center'>" + response['problem2'][i].problem_type + "</td>" +
            //             "<td align='center'>" + response['problem3'][i].problem_type + "</td>" +
            //             "<td align='center'>" + response['problem4'][i].problem_type + "</td>" +
            //             "<td align='center'>" + response['problem5'][i].problem_type + "</td>" +
            //        "</tr>";
            //        $("#problem tbody").append(tr_str);
            //      }
            //  }else{
            //     var tr_str = "<tr>" +
            //         "<td class='text-center' colspan='7'>ไม่พบข้อมูล</td>" +
            //     "</tr>";
            //     $("#problem tbody").append(tr_str);
            //  }

            //  if(risk_problem1_len > 0){  // นับ Array Data risk_problem มากกว่า 0 ทำงาน เงื่อนไขนี้
            //      for(var i=0; i<risk_problem1_len; i++){  // วนลูป
            //        var tr_str = "<tr>" +
            //             "<td align='center'>" + response['problem1'][i].problem_type + "</td>" +
            //        "</tr>";
            //        $("#problem tbody").append(tr_str);
            //      }
            //  }else{
            //     var tr_str = "<tr>" +
            //         "<td class='text-center' colspan='7'>ไม่พบข้อมูล</td>" +
            //     "</tr>";
            //     $("#problem tbody").append(tr_str);
            //  }

            //  if(risk_problem2_len > 0){  // นับ Array Data risk_problem มากกว่า 0 ทำงาน เงื่อนไขนี้
            //      for(var i=0; i<risk_problem2_len; i++){  // วนลูป
            //        var tr_str = "<tr>" +
            //             "<td align='center'>" + response['problem2'][i].problem_type + "</td>" +
            //        "</tr>";
            //        $("#problem tbody").append(tr_str);
            //      }
            //  }else{
            //     var tr_str = "<tr>" +
            //         "<td class='text-center' colspan='7'>ไม่พบข้อมูล</td>" +
            //     "</tr>";
            //     $("#problem tbody").append(tr_str);
            //  }

            //  if(risk_problem3_len > 0){  // นับ Array Data risk_problem มากกว่า 0 ทำงาน เงื่อนไขนี้
            //      for(var i=0; i<risk_problem3_len; i++){  // วนลูป
            //        var tr_str = "<tr>" +
            //             "<td align='center'>" + response['problem3'][i].problem_type + "</td>" +
            //        "</tr>";
            //        $("#problem tbody").append(tr_str);
            //      }
            //  }else{
            //     var tr_str = "<tr>" +
            //         "<td class='text-center' colspan='7'>ไม่พบข้อมูล</td>" +
            //     "</tr>";
            //     $("#problem tbody").append(tr_str);
            //  }

            //  if(risk_problem4_len > 0){  // นับ Array Data risk_problem มากกว่า 0 ทำงาน เงื่อนไขนี้
            //      for(var i=0; i<risk_problem4_len; i++){  // วนลูป
            //        var tr_str = "<tr>" +
            //             "<td align='center'>" + response['problem4'][i].problem_type + "</td>" +
            //        "</tr>";
            //        $("#problem tbody").append(tr_str);
            //      }
            //  }else{
            //     var tr_str = "<tr>" +
            //         "<td class='text-center' colspan='7'>ไม่พบข้อมูล</td>" +
            //     "</tr>";
            //     $("#problem tbody").append(tr_str);
            //  }

            //  if(risk_problem5_len > 0){  // นับ Array Data risk_problem มากกว่า 0 ทำงาน เงื่อนไขนี้
            //      for(var i=0; i<risk_problem5_len; i++){  // วนลูป
            //        var tr_str = "<tr>" +
            //             "<td align='center'>" + response['problem5'][i].problem_type + "</td>" +
            //        "</tr>";
            //        $("#problem tbody").append(tr_str);
            //      }
            //  }else{
            //     var tr_str = "<tr>" +
            //         "<td class='text-center' colspan='7'>ไม่พบข้อมูล</td>" +
            //     "</tr>";
            //     $("#problem tbody").append(tr_str);
            //  }

             /////////////////////////////////////////////////////////////////////////////

             if(risk_attendance_len > 0){  // นับ Array Data risk_attendance มากกว่า 0 ทำงาน เงื่อนไขนี้
                 for(var i=0; i<risk_attendance_len; i++){  // วนลูป
                   var tr_str = "<tr>" +
                        "<td align='center'>" + response['attendance'][i].course_id + "</td>" +
                        "<td align='center'>" + response['attendance'][i].amount_absence + "</td>" +
                        // "<td align='center'>" + response['attendance'][i].person_add + "</td>" +
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
                        // "<td align='center'>" + response['risk_grade'][i].person_add + "</td>" +
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
@extends('bar.header(student)')


