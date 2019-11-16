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
                {{-- <li class="breadcrumb-item"><a href="{{ url('curriculum') }}">หลักสูตร(IT)</a></li> --}}
                {{-- <li class="breadcrumb-item"><a href="{{ url('selectyear') }}">ชั้นปี</a></li> --}}
                <li class="breadcrumb-item" aria-current="page"><a href="/advisor/myStudent/1/2019">รายชื่อนักศึกษา</a></li>
                {{-- <li class="breadcrumb-item active" aria-current="page"><a href="">ประวัตินักศึกษา(ใส่ชื่อด้วย)</a></li> --}}
                <li class="breadcrumb-item active" aria-current="page"><a href="">พฤติกรรมหรือปัญหาของนักศึกษา</a></li>
            </ol>
    </nav>
</head>
<body>

        <h6 align='right'>รหัสนักศึกษา: {{$bios->student_id}} &nbsp;&nbsp;&nbsp;&nbsp;</h6>
        <h6 align='right'>ชื่อ-สกุล: {{$bios->first_name}} &nbsp;{{$bios->last_name}}&nbsp;&nbsp;&nbsp;</h6>


        {{-- หัวข้อ --}}
        <div class="container">
        <div class="row">
            <div class="col-sm-4">

            </div>
        <div class="col-sm-5">
            <div class="card bg-light mb-3" style="max-width: 20rem; box-shadow: 5px 5px 8px 4px rgba(50, 50, 50, .5);" "> {{--box-shadow: 5px 5px 8px 4px rgba(50, 50, 50, .5);">--}}
                <center>
                    <div class="card-header">
                        <h5>ปัญหา/พฤติกรรม</h5>
                    </div>
                </center>
            </div>
        </div>
        </div>
        </div>
        {{-- จบหัวข้อ --}}


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
                      <select name="semester" id="semester">

                        <option value="0">เลือกปีการศึกษา</option>
                          @foreach($semester as $show)
                            <option value="{{$show->semester}}-{{$show->year}}">{{$show->semester}}/{{$show->year}}</option>

                          @endforeach

                      </select>
                </div>
            </div>
        </div>
    </div>
<br>
        {{-- <div class="dropdown">
        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            เลือกปี และ เทอม
        </a>

        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            @foreach($generation as $show)
        <a class="dropdown-item" href="/studentproblemA/{{$bios->student_id}}/{{$show->semester}}/{{$show->year}}">{{$show->year}}|{{$show->semester}}</a>
            @endforeach
        </div>
        </div>
        <br><br><br><br> --}}
        <br><br><br>
        <center>
            <table class="table" width="60%" id="riskProblem" style="box-shadow: 5px 5px 8px 4px rgba(50, 50, 50, .5);">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">ประเภทพฤติกรรม/ปัญหา</th>
                        <th scope="col">หัวข้อของปัญหา</th>
                        <th scope="col">พฤติกรรม/ปัญหา</th>
                        <th scope="col">ระดับความเสี่ยง</th>
                        <th scope="col" style="width: 12%">วันที่เพิ่ม</th>
                        <th scope="col">วันที่เกิดปัญหา</th>
                        <th scope="col">ผู้เพิ่ม</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- @foreach ($problem as $show_problem)

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
        </center><br><br>

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
          var url ='{{ route('getStudentproblemA',['student_id' => $s]) }}';
          var value = semester_value;

          if(semester_value != 0){
            url ='{{ route('getStudentproblemA',['student_id' => $s,'semester' =>'semester_value']) }}';/// same ->  /getNotiproblemA/{student_id}?semester_value=xx
            url = url.replace('semester_value', value);
          }

          console.log(url);
          $.ajax({
          type: 'GET', //THIS NEEDS TO BE GET
          url:  url,
          success: function (response) {
            // console.log(response);
             var risk_problem_len = 0;

             $('#riskProblem tbody').empty(); // Empty <tbody>

             if(response['problem'] != null){ /// ตรวจสอบ risk_problem ต้องไม่เป็นค่า null
               risk_problem_len = response['problem'].length; // นับ Array Data risk_problem
             }

             if(risk_problem_len > 0){  // นับ Array Data risk_problem มากกว่า 0 ทำงาน เงื่อนไขนี้
                 for(var i=0; i<risk_problem_len; i++){  // วนลูป
                   var tr_str = "<tr>" +
                        "<td align='center'>" + response['problem'][i].problem_type + "</td>" +
                        "<td align='center'>" + response['problem'][i].problem_topic + "</td>" +
                        "<td align='center'>" + response['problem'][i].problem_detail + "</td>" +
                        "<td align='center'>" + response['problem'][i].risk_level + "</td>" +
                        "<td align='center'>" + response['problem'][i].created_at + "</td>" +
                        "<td align='center'>" + response['problem'][i].date + "</td>" +
                        "<td align='center'> อาจารย์ " + response['problem'][i].person_add + "</td>" +
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
          },
          error: function() {
              console.log('error');
          }
          });
        }
    </script>
@endsection

@extends('bar.header(advi)')
{{-- @extends('bar.username') --}}
