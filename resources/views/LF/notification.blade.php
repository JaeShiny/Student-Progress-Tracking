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

    <title>การแจ้งเตือน</title>

    <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li> </li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                {{-- <li class="breadcrumb-item"><a href="{{ url('course') }}">วิชาที่สอน</a></li> --}}
                <li class="breadcrumb-item" aria-current="page">รายชื่อนักศึกษา</li>
                {{-- <li class="breadcrumb-item active" aria-current="page"><a href="">ประวัตินักศึกษา(ใส่ชื่อด้วย)</a></li> --}}
                <li class="breadcrumb-item active" aria-current="page"><a href="">การแจ้งเตือน</a></li>
            </ol>
    </nav>
</head>
<body>
        @foreach ($bios as $bio)
        <h6 align='right'>รหัสนักศึกษา: {{$bio->student_id}} &nbsp;&nbsp;&nbsp;&nbsp;</h6>
        <h6 align='right'>ชื่อ-สกุล: {{$bio->first_name}} &nbsp;{{$bio->last_name}}&nbsp;&nbsp;&nbsp;</h6>
        @endforeach

        <h5 align='center'>การแจ้งเตือน</h5>

<br>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 float-right">
                <div class="btn-group">
                    <select name="semester" id="semester">

                        <option value="0">เทอม/ปีการศึกษา</option>

                        @foreach($semesters as $show)
                            <option value="{{$show->semester}}-{{$show->year}}">{{$show->semester}}/{{$show->year}}</option>
                        @endforeach

                      </select>
                </div>
            </div>
        </div>
    </div>
<br>

        <center>

            {{-- แจ้งเตือนปัญหาและพฤติกรรม --}}
            <h6  style="position: relative; left: -31%">การแจ้งเตือนปัญหาและพฤติกรรม</h6>
            <br><br><br>
            <table class="table" width="60%" id="riskProblem">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">ประเภทพฤติกรรม/ปัญหา</th>
                        <th scope="col">หัวข้อของปัญหา</th>
                        <th scope="col">พฤติกรรม/ปัญหา</th>
                        <th scope="col">ระดับความเสี่ยง</th>
                        <th scope="col">วันที่เพิ่ม</th>
                        <th scope="col">วันที่เกิดปัญหา</th>
                        <th scope="col">ผู้เพิ่ม</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- @foreach ($risk_problem as $show_problem)

                    <tr>
                        <td scope="row">{{$show_problem->problem_type}}</td>
                        <td>{{$show_problem->problem_topic}}</td>
                        <td>{{$show_problem->problem_detail}}</td>
                        <td>{{$show_problem->risk_level}}</td>
                        <td>{{$show_problem->created_at}}</td>
                        <td>{{$show_problem->date}}</td>
                        <td>อาจารย์ {{$show_problem->users->name}}</td>
                    </tr>

                    @endforeach --}}

                </tbody>
            </table>
            <br><br>

            {{-- แจ้งเตือนการเข้าเรียน --}}
            <h6  style="position: relative; left: -33%">การแจ้งเตือนการเข้าเรียน</h6>
            <br><br><br>
            <table class="table" width="60%" id="riskAttendance">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">รหัสวิชา</th>
                        <th scope="col">จำนวนที่ขาด</th>
                        <th scope="col">ผู้เพิ่ม</th>

                    </tr>
                </thead>
                <tbody>
                    {{-- @foreach ($risk_attendance as $show_problem)

                    <tr>
                        <td scope="row">{{$show_problem->course_id}}</td>
                        <td>{{$show_problem->amount_absence}}</td>

                        <td>อาจารย์ {{$show_problem->person_add}}</td>
                    </tr>

                    @endforeach --}}

                </tbody>
            </table>
            <br><br>


            {{-- แจ้งเตือนผลการเรียน --}}
            <h6  style="position: relative; left: -33%">การแจ้งเตือนผลการเรียน</h6>
            <br><br><br>
            <table class="table" width="60%" id="riskGrade">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">รหัสวิชา</th>
                        <th scope="col">คะแนนรวมทั้งหมด</th>
                        <th scope="col">ผู้เพิ่ม</th>

                    </tr>
                </thead>
                <tbody>
                    {{-- @foreach ($risk_grade as $show_problem)

                    <tr>
                        <td scope="row">{{$show_problem->course_id}}</td>
                        <td>{{$show_problem->total_all}}</td>

                        <td>อาจารย์ {{$show_problem->person_add}}</td>
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
        $("#semester").change(function(){ /// chacke when dropdown change and get value
            var semester_value = this.value;
            getData(semester_value);
        });
    });


        function getData(semester_value){
          var url ='{{ route('getNotiproblemLF',['student_id' => $s]) }}';
          var value = semester_value;

          if(semester_value != 0){
            url ='{{ route('getNotiproblemLF',['student_id' => $s,'semester' =>'semester_value']) }}';/// same ->  /getNotiproblemA/{student_id}?semester_value=xx
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

             $('#riskProblem tbody').empty(); // Empty <tbody>
             $('#riskAttendance tbody').empty(); // Empty <tbody>
             $('#riskGrade tbody').empty(); // Empty <tbody>

             if(response['risk_problem'] != null){ /// ตรวจสอบ risk_problem ต้องไม่เป็นค่า null
               risk_problem_len = response['risk_problem'].length; // นับ Array Data risk_problem
             }
             if(response['risk_attendance'] != null){ /// ตรวจสอบ risk_attendance ต้องไม่เป็นค่า null
               risk_attendance_len = response['risk_attendance'].length; // นับ Array Data risk_attendance
             }

             if(response['risk_grade'] != null){ /// ตรวจสอบ risk_attendance ต้องไม่เป็นค่า null
               risk_grade_len = response['risk_grade'].length; // นับ Array Data risk_attendance
             }

             if(risk_problem_len > 0){  // นับ Array Data risk_problem มากกว่า 0 ทำงาน เงื่อนไขนี้
                 for(var i=0; i<risk_problem_len; i++){  // วนลูป
                   var tr_str = "<tr>" +
                        "<td align='center'>" + response['risk_problem'][i].problem_type + "</td>" +
                        "<td align='center'>" + response['risk_problem'][i].problem_topic + "</td>" +
                        "<td align='center'>" + response['risk_problem'][i].problem_detail + "</td>" +
                        "<td align='center'>" + response['risk_problem'][i].risk_level + "</td>" +
                        "<td align='center'>" + response['risk_problem'][i].created_at + "</td>" +
                        "<td align='center'>" + response['risk_problem'][i].date + "</td>" +
                        "<td align='center'> อาจารย์ " + response['risk_problem'][i].person_add + "</td>" +
                   "</tr>";
                   $("#riskProblem tbody").append(tr_str);
                 }
             }else{
                var tr_str = "<tr>" +
                    "<td class='text-center' colspan='7'>ไม่พบข้อมูล</td>" +
                "</tr>";
                $("#riskProblem tbody").append(tr_str);
             }
             /////////////////////////////////////////////////////////////////////////////

             if(risk_attendance_len > 0){  // นับ Array Data risk_attendance มากกว่า 0 ทำงาน เงื่อนไขนี้
                 for(var i=0; i<risk_attendance_len; i++){  // วนลูป
                   var tr_str = "<tr>" +
                        "<td align='center'>" + response['risk_attendance'][i].course_id + "</td>" +
                        "<td align='center'>" + response['risk_attendance'][i].amount_absence + "</td>" +
                        "<td align='center'>" + response['risk_attendance'][i].person_add + "</td>" +
                   "</tr>";
                   $("#riskAttendance tbody").append(tr_str);
                 }
             }else{
                var tr_str = "<tr>" +
                    "<td class='text-center' colspan='3'>ไม่พบข้อมูล</td>" +
                "</tr>";
                $("#riskAttendance tbody").append(tr_str);
             }

             /////////////////////////////////////////////////////////////////////////////

             if(risk_grade_len > 0){  // นับ Array Data risk_grade_len มากกว่า 0 ทำงาน เงื่อนไขนี้
                 for(var i=0; i<risk_grade_len; i++){  // วนลูป
                   var tr_str = "<tr>" +
                        "<td align='center'>" + response['risk_grade'][i].course_id + "</td>" +
                        "<td align='center'>" + response['risk_grade'][i].total_all + "</td>" +
                        "<td align='center'>" + response['risk_grade'][i].person_add + "</td>" +
                   "</tr>";
                   $("#riskGrade tbody").append(tr_str);
                 }
             }else{
                var tr_str = "<tr>" +
                    "<td class='text-center' colspan='3'>ไม่พบข้อมูล</td>" +
                "</tr>";
                $("#riskGrade tbody").append(tr_str);
             }

          },
          error: function() {
              console.log('error');
          }
          });
        }
    </script>
@endsection

@extends('bar.header(LF)')
{{-- @extends('bar.username') --}}
