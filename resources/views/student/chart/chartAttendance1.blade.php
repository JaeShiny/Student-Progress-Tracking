@extends('bar.body')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
   <!-- Required meta tags -->
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">

   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>สถิติ</title>

</head>

<body>

@section('content')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li> </li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <li class="breadcrumb-item active" aria-current="page"><a href="{{ url('chartAttendanceS') }}">สถิติ</a></li>
    </ol>
</nav>



<ul class="nav nav-tabs" id="myTab" role="tablist" style="background-color:white;">
    <li class="nav-item">
        <a class="nav-link active" href="/chartAttendanceS" style="color: #000000;">สถิติการเข้าเรียน</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/chartGradeS" style="color: #000000;">สถิติผลการเรียน</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/chartStudentS/{{$bios->student_id}}" style="color: #000000;">สรุปสถิติ</a>
    </li>
</ul><br>


<h6 align='right'>รหัสนักศึกษา: {{$bios->student_id}} &nbsp;&nbsp;&nbsp;&nbsp;</h6>
<h6 align='right'>ชื่อ-สกุล: {{$bios->first_name}} &nbsp;{{$bios->last_name}}&nbsp;&nbsp;&nbsp;</h6>
<br>

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

{{-- การเข้าเรียน --}}
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Chart Attendance
                </div>

                <div class="panel-body">
                    {!! $chart->html() !!}
                </div>
            </div>
        </div>
    </div>
</div>
{!! Charts::scripts() !!}
{!! $chart->script() !!}

<br><br><br><br>
<center>
<table class="table table-hover" id="period">
    <thead>
        <tr>
            <th scope="col">คาบเรียนที่</th>
            <th scope="col">จำนวนครั้งที่ขาดเรียน</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th scope="row">คาบที่ 1</th>
            {{-- <td>{{$period_1}}</td> --}}
        </tr>
        <tr>
            <th scope="row">คาบที่ 2</th>
            {{-- <td>{{$period_2}}</td> --}}
        </tr>
        <tr>
            <th scope="row">คาบที่ 3</th>
            {{-- <td>{{$period_3}}</td> --}}
        </tr>
        <tr>
            <th scope="row">คาบที่ 4</th>
            {{-- <td>{{$period_4}}</td> --}}
        </tr>
        <tr>
            <th scope="row">คาบที่ 5</th>
            {{-- <td>{{$period_5}}</td> --}}
        </tr>
        <tr>
            <th scope="row">คาบที่ 6</th>
            {{-- <td>{{$period_6}}</td> --}}
        </tr>
        <tr>
            <th scope="row">คาบที่ 7</th>
            {{-- <td>{{$period_7}}</td> --}}
        </tr>
        <tr>
            <th scope="row">คาบที่ 8</th>
            {{-- <td>{{$period_8}}</td> --}}
        </tr>
        <tr>
            <th scope="row">คาบที่ 9</th>
            {{-- <td>{{$period_9}}</td> --}}
        </tr>
        <tr>
            <th scope="row">คาบที่ 10</th>
            {{-- <td>{{$period_10}}</td> --}}
        </tr>
        <tr>
            <th scope="row">คาบที่ 11</th>
            {{-- <td>{{$period_11}}</td> --}}
        </tr>
        <tr>
            <th scope="row">คาบที่ 12</th>
            {{-- <td>{{$period_12}}</td> --}}
        </tr><tr>
            <th scope="row">คาบที่ 13</th>
            {{-- <td>{{$period_13}}</td> --}}
        </tr>
        <tr>
            <th scope="row">คาบที่ 14</th>
            {{-- <td>{{$period_14}}</td> --}}
        </tr>
        <tr>
            <th scope="row">คาบที่ 15</th>
            {{-- <td>{{$period_15}}</td> --}}
        </tr>
    </tbody>
</table>
</center><br><br>



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
          var url ='{{ route('getChartAttL') }}';
          var value = semester_value;

          if(semester_value != 0){
            url ='{{ route('getChartAttL',['s' =>'semester_value']) }}';/// same ->  /getNotiproblemA/{student_id}?semester_value=xx
            url = url.replace('semester_value', value);
          }

          console.log(url);
          $.ajax({
          type: 'GET', //THIS NEEDS TO BE GET
          url:  url,
          success: function (response) {
            // console.log(response);
            var risk_period_len = 0;
            // var risk_period_len1 = 0;
            // var risk_period_len2 = 0;
            // var risk_period_len3 = 0;
            // var risk_period_len4 = 0;
            // var risk_period_len5 = 0;
            // var risk_period_len6 = 0;
            // var risk_period_len7 = 0;
            // var risk_period_len8 = 0;
            // var risk_period_len9 = 0;
            // var risk_period_len10 = 0;
            // var risk_period_len11 = 0;
            // var risk_period_len12 = 0;
            // var risk_period_len13 = 0;
            // var risk_period_len14 = 0;
            // var risk_period_len15 = 0;


             $('#period tbody').empty(); // Empty <tbody>
            //  $('#attendance tbody').empty(); // Empty <tbody>
            //  $('#grade tbody').empty(); // Empty <tbody>

            if(response['period_1'] != null){ /// ตรวจสอบ risk_problem ต้องไม่เป็นค่า null
                    risk_period_len = response['period_1'].length; // นับ Array Data risk_problem
             }
             if(response['period_2'] != null){ /// ตรวจสอบ risk_problem ต้องไม่เป็นค่า null
                risk_period_len = response['period_2'].length; // นับ Array Data risk_problem
             }
             if(response['period_3'] != null){ /// ตรวจสอบ risk_problem ต้องไม่เป็นค่า null
                risk_period_len = response['period_3'].length; // นับ Array Data risk_problem
             }
             if(response['period_4'] != null){ /// ตรวจสอบ risk_problem ต้องไม่เป็นค่า null
                risk_period_len = response['period_4'].length; // นับ Array Data risk_problem
             }
             if(response['period_5'] != null){ /// ตรวจสอบ risk_problem ต้องไม่เป็นค่า null
                risk_period_len = response['period_5'].length; // นับ Array Data risk_problem
             }
             if(response['period_6'] != null){ /// ตรวจสอบ risk_problem ต้องไม่เป็นค่า null
                risk_period_len = response['period_6'].length; // นับ Array Data risk_problem
             }
             if(response['period_7'] != null){ /// ตรวจสอบ risk_problem ต้องไม่เป็นค่า null
               risk_problem_len = response['period_7'].length; // นับ Array Data risk_problem
             }
             if(response['period_8'] != null){ /// ตรวจสอบ risk_problem ต้องไม่เป็นค่า null
                risk_period_len = response['period_8'].length; // นับ Array Data risk_problem
             }
             if(response['period_9'] != null){ /// ตรวจสอบ risk_problem ต้องไม่เป็นค่า null
                risk_period_len = response['period_9'].length; // นับ Array Data risk_problem
             }
             if(response['period_10'] != null){ /// ตรวจสอบ risk_problem ต้องไม่เป็นค่า null
                risk_period_len = response['period_10'].length; // นับ Array Data risk_problem
             }
             if(response['period_11'] != null){ /// ตรวจสอบ risk_problem ต้องไม่เป็นค่า null
                risk_period_len = response['period_11'].length; // นับ Array Data risk_problem
             }
             if(response['period_12'] != null){ /// ตรวจสอบ risk_problem ต้องไม่เป็นค่า null
                risk_period_len = response['period_12'].length; // นับ Array Data risk_problem
             }
             if(response['period_13'] != null){ /// ตรวจสอบ risk_problem ต้องไม่เป็นค่า null
                risk_period_len = response['period_13'].length; // นับ Array Data risk_problem
             }
             if(response['period_14'] != null){ /// ตรวจสอบ risk_problem ต้องไม่เป็นค่า null
                risk_period_len = response['period_14'].length; // นับ Array Data risk_problem
             }
             if(response['period_15'] != null){ /// ตรวจสอบ risk_problem ต้องไม่เป็นค่า null
                risk_period_len = response['period_15'].length; // นับ Array Data risk_problem
             }

            // if(response['period_1'] != null){ /// ตรวจสอบ risk_problem ต้องไม่เป็นค่า null
            //         risk_period_len1 = response['period_1'].length; // นับ Array Data risk_problem
            //  }
            //  if(response['period_2'] != null){ /// ตรวจสอบ risk_problem ต้องไม่เป็นค่า null
            //     risk_period_len2 = response['period_2'].length; // นับ Array Data risk_problem
            //  }
            //  if(response['period_3'] != null){ /// ตรวจสอบ risk_problem ต้องไม่เป็นค่า null
            //     risk_period_len3 = response['period_3'].length; // นับ Array Data risk_problem
            //  }
            //  if(response['period_4'] != null){ /// ตรวจสอบ risk_problem ต้องไม่เป็นค่า null
            //     risk_period_len4 = response['period_4'].length; // นับ Array Data risk_problem
            //  }
            //  if(response['period_5'] != null){ /// ตรวจสอบ risk_problem ต้องไม่เป็นค่า null
            //     risk_period_len5 = response['period_5'].length; // นับ Array Data risk_problem
            //  }
            //  if(response['period_6'] != null){ /// ตรวจสอบ risk_problem ต้องไม่เป็นค่า null
            //     risk_period_len6 = response['period_6'].length; // นับ Array Data risk_problem
            //  }
            //  if(response['period_7'] != null){ /// ตรวจสอบ risk_problem ต้องไม่เป็นค่า null
            //    risk_problem_len7 = response['period_7'].length; // นับ Array Data risk_problem
            //  }
            //  if(response['period_8'] != null){ /// ตรวจสอบ risk_problem ต้องไม่เป็นค่า null
            //     risk_period_len8 = response['period_8'].length; // นับ Array Data risk_problem
            //  }
            //  if(response['period_9'] != null){ /// ตรวจสอบ risk_problem ต้องไม่เป็นค่า null
            //     risk_period_len9 = response['period_9'].length; // นับ Array Data risk_problem
            //  }
            //  if(response['period_10'] != null){ /// ตรวจสอบ risk_problem ต้องไม่เป็นค่า null
            //     risk_period_len10 = response['period_10'].length; // นับ Array Data risk_problem
            //  }
            //  if(response['period_11'] != null){ /// ตรวจสอบ risk_problem ต้องไม่เป็นค่า null
            //     risk_period_len11 = response['period_11'].length; // นับ Array Data risk_problem
            //  }
            //  if(response['period_12'] != null){ /// ตรวจสอบ risk_problem ต้องไม่เป็นค่า null
            //     risk_period_len12 = response['period_12'].length; // นับ Array Data risk_problem
            //  }
            //  if(response['period_13'] != null){ /// ตรวจสอบ risk_problem ต้องไม่เป็นค่า null
            //     risk_period_len13 = response['period_13'].length; // นับ Array Data risk_problem
            //  }
            //  if(response['period_14'] != null){ /// ตรวจสอบ risk_problem ต้องไม่เป็นค่า null
            //     risk_period_len14 = response['period_14'].length; // นับ Array Data risk_problem
            //  }
            //  if(response['period_15'] != null){ /// ตรวจสอบ risk_problem ต้องไม่เป็นค่า null
            //     risk_period_len15 = response['period_15'].length; // นับ Array Data risk_problem
            //  }

             ////////////////////////////////////////////////////////////////////////////////////////

             if(risk_period_len > 0){  // นับ Array Data risk_problem มากกว่า 0 ทำงาน เงื่อนไขนี้
                 for(var i=0; i<risk_period_len; i++){  // วนลูป
                   var tr_str = "<tr>" +
                        "<td align='center'>" + response['period_1'][i].period_1 + "</td>" +
                        "<td align='center'>" + response['period_2'][i].period_2 + "</td>" +
                        "<td align='center'>" + response['period_3'][i].period_3 + "</td>" +
                        "<td align='center'>" + response['period_4'][i].period_4 + "</td>" +
                        "<td align='center'>" + response['period_5'][i].period_5 + "</td>" +
                        "<td align='center'>" + response['period_6'][i].period_6 + "</td>" +
                        "<td align='center'>" + response['period_7'][i].period_7 + "</td>" +
                        "<td align='center'>" + response['period_8'][i].period_8 + "</td>" +
                        "<td align='center'>" + response['period_9'][i].period_9 + "</td>" +
                        "<td align='center'>" + response['period_10'][i].period_10 + "</td>" +
                        "<td align='center'>" + response['period_11'][i].period_11 + "</td>" +
                        "<td align='center'>" + response['period_12'][i].period_12 + "</td>" +
                        "<td align='center'>" + response['period_13'][i].period_13 + "</td>" +
                        "<td align='center'>" + response['period_14'][i].period_14 + "</td>" +
                        "<td align='center'>" + response['period_15'][i].period_15 + "</td>" +
                   "</tr>";
                   $("#period tbody").append(tr_str);
                 }
             }else{
                var tr_str = "<tr>" +
                    "<td class='text-center' colspan='7'>ไม่พบข้อมูล</td>" +
                "</tr>";
                $("#period tbody").append(tr_str);
             }

            ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////

            // if(risk_period_len1 > 0){  // นับ Array Data risk_problem มากกว่า 0 ทำงาน เงื่อนไขนี้
            //      for(var i=0; i<risk_period_len1; i++){  // วนลูป
            //        var tr_str = "<tr>" +
            //             "<td align='center'>" + response['period_1'][i].period_1 + "</td>" +
            //             // "<td align='center'>" + response['period_2'][i].period_2 + "</td>" +
            //             // "<td align='center'>" + response['period_3'][i].period_3 + "</td>" +
            //             // "<td align='center'>" + response['period_4'][i].period_4 + "</td>" +
            //             // "<td align='center'>" + response['period_5'][i].period_5 + "</td>" +
            //             // "<td align='center'>" + response['period_6'][i].period_6 + "</td>" +
            //             // "<td align='center'>" + response['period_7'][i].period_7 + "</td>" +
            //             // "<td align='center'>" + response['period_8'][i].period_8 + "</td>" +
            //             // "<td align='center'>" + response['period_9'][i].period_9 + "</td>" +
            //             // "<td align='center'>" + response['period_10'][i].period_10 + "</td>" +
            //             // "<td align='center'>" + response['period_11'][i].period_11 + "</td>" +
            //             // "<td align='center'>" + response['period_12'][i].period_12 + "</td>" +
            //             // "<td align='center'>" + response['period_13'][i].period_13 + "</td>" +
            //             // "<td align='center'>" + response['period_14'][i].period_14 + "</td>" +
            //             // "<td align='center'>" + response['period_15'][i].period_15 + "</td>" +
            //        "</tr>";
            //        $("#period tbody").append(tr_str);
            //      }
            //  }else{
            //     var tr_str = "<tr>" +
            //         "<td class='text-center' colspan='7'>ไม่พบข้อมูล</td>" +
            //     "</tr>";
            //     $("#period tbody").append(tr_str);
            //  }

            //  if(risk_period_len2 > 0){  // นับ Array Data risk_problem มากกว่า 0 ทำงาน เงื่อนไขนี้
            //      for(var i=0; i<risk_period_len2; i++){  // วนลูป
            //        var tr_str = "<tr>" +
            //             // "<td align='center'>" + response['period_1'][i].period_1 + "</td>" +
            //             "<td align='center'>" + response['period_2'][i].period_2 + "</td>" +
            //             // "<td align='center'>" + response['period_3'][i].period_3 + "</td>" +
            //             // "<td align='center'>" + response['period_4'][i].period_4 + "</td>" +
            //             // "<td align='center'>" + response['period_5'][i].period_5 + "</td>" +
            //             // "<td align='center'>" + response['period_6'][i].period_6 + "</td>" +
            //             // "<td align='center'>" + response['period_7'][i].period_7 + "</td>" +
            //             // "<td align='center'>" + response['period_8'][i].period_8 + "</td>" +
            //             // "<td align='center'>" + response['period_9'][i].period_9 + "</td>" +
            //             // "<td align='center'>" + response['period_10'][i].period_10 + "</td>" +
            //             // "<td align='center'>" + response['period_11'][i].period_11 + "</td>" +
            //             // "<td align='center'>" + response['period_12'][i].period_12 + "</td>" +
            //             // "<td align='center'>" + response['period_13'][i].period_13 + "</td>" +
            //             // "<td align='center'>" + response['period_14'][i].period_14 + "</td>" +
            //             // "<td align='center'>" + response['period_15'][i].period_15 + "</td>" +
            //        "</tr>";
            //        $("#period tbody").append(tr_str);
            //      }
            //  }else{
            //     var tr_str = "<tr>" +
            //         "<td class='text-center' colspan='7'>ไม่พบข้อมูล</td>" +
            //     "</tr>";
            //     $("#period tbody").append(tr_str);
            //  }

            //  if(risk_period_len3 > 0){  // นับ Array Data risk_problem มากกว่า 0 ทำงาน เงื่อนไขนี้
            //      for(var i=0; i<risk_period_len3; i++){  // วนลูป
            //        var tr_str = "<tr>" +
            //             // "<td align='center'>" + response['period_1'][i].period_1 + "</td>" +
            //             // "<td align='center'>" + response['period_2'][i].period_2 + "</td>" +
            //             "<td align='center'>" + response['period_3'][i].period_3 + "</td>" +
            //             // "<td align='center'>" + response['period_4'][i].period_4 + "</td>" +
            //             // "<td align='center'>" + response['period_5'][i].period_5 + "</td>" +
            //             // "<td align='center'>" + response['period_6'][i].period_6 + "</td>" +
            //             // "<td align='center'>" + response['period_7'][i].period_7 + "</td>" +
            //             // "<td align='center'>" + response['period_8'][i].period_8 + "</td>" +
            //             // "<td align='center'>" + response['period_9'][i].period_9 + "</td>" +
            //             // "<td align='center'>" + response['period_10'][i].period_10 + "</td>" +
            //             // "<td align='center'>" + response['period_11'][i].period_11 + "</td>" +
            //             // "<td align='center'>" + response['period_12'][i].period_12 + "</td>" +
            //             // "<td align='center'>" + response['period_13'][i].period_13 + "</td>" +
            //             // "<td align='center'>" + response['period_14'][i].period_14 + "</td>" +
            //             // "<td align='center'>" + response['period_15'][i].period_15 + "</td>" +
            //        "</tr>";
            //        $("#period tbody").append(tr_str);
            //      }
            //  }else{
            //     var tr_str = "<tr>" +
            //         "<td class='text-center' colspan='7'>ไม่พบข้อมูล</td>" +
            //     "</tr>";
            //     $("#period tbody").append(tr_str);
            //  }

            //  if(risk_period_len4 > 0){  // นับ Array Data risk_problem มากกว่า 0 ทำงาน เงื่อนไขนี้
            //      for(var i=0; i<risk_period_len4; i++){  // วนลูป
            //        var tr_str = "<tr>" +
            //             // "<td align='center'>" + response['period_1'][i].period_1 + "</td>" +
            //             // "<td align='center'>" + response['period_2'][i].period_2 + "</td>" +
            //             // "<td align='center'>" + response['period_3'][i].period_3 + "</td>" +
            //             "<td align='center'>" + response['period_4'][i].period_4 + "</td>" +
            //             // "<td align='center'>" + response['period_5'][i].period_5 + "</td>" +
            //             // "<td align='center'>" + response['period_6'][i].period_6 + "</td>" +
            //             // "<td align='center'>" + response['period_7'][i].period_7 + "</td>" +
            //             // "<td align='center'>" + response['period_8'][i].period_8 + "</td>" +
            //             // "<td align='center'>" + response['period_9'][i].period_9 + "</td>" +
            //             // "<td align='center'>" + response['period_10'][i].period_10 + "</td>" +
            //             // "<td align='center'>" + response['period_11'][i].period_11 + "</td>" +
            //             // "<td align='center'>" + response['period_12'][i].period_12 + "</td>" +
            //             // "<td align='center'>" + response['period_13'][i].period_13 + "</td>" +
            //             // "<td align='center'>" + response['period_14'][i].period_14 + "</td>" +
            //             // "<td align='center'>" + response['period_15'][i].period_15 + "</td>" +
            //        "</tr>";
            //        $("#period tbody").append(tr_str);
            //      }
            //  }else{
            //     var tr_str = "<tr>" +
            //         "<td class='text-center' colspan='7'>ไม่พบข้อมูล</td>" +
            //     "</tr>";
            //     $("#period tbody").append(tr_str);
            //  }


            //  if(risk_period_len5 > 0){  // นับ Array Data risk_problem มากกว่า 0 ทำงาน เงื่อนไขนี้
            //      for(var i=0; i<risk_period_len5; i++){  // วนลูป
            //        var tr_str = "<tr>" +
            //             // "<td align='center'>" + response['period_1'][i].period_1 + "</td>" +
            //             // "<td align='center'>" + response['period_2'][i].period_2 + "</td>" +
            //             // "<td align='center'>" + response['period_3'][i].period_3 + "</td>" +
            //             // "<td align='center'>" + response['period_4'][i].period_4 + "</td>" +
            //             "<td align='center'>" + response['period_5'][i].period_5 + "</td>" +
            //             // "<td align='center'>" + response['period_6'][i].period_6 + "</td>" +
            //             // "<td align='center'>" + response['period_7'][i].period_7 + "</td>" +
            //             // "<td align='center'>" + response['period_8'][i].period_8 + "</td>" +
            //             // "<td align='center'>" + response['period_9'][i].period_9 + "</td>" +
            //             // "<td align='center'>" + response['period_10'][i].period_10 + "</td>" +
            //             // "<td align='center'>" + response['period_11'][i].period_11 + "</td>" +
            //             // "<td align='center'>" + response['period_12'][i].period_12 + "</td>" +
            //             // "<td align='center'>" + response['period_13'][i].period_13 + "</td>" +
            //             // "<td align='center'>" + response['period_14'][i].period_14 + "</td>" +
            //             // "<td align='center'>" + response['period_15'][i].period_15 + "</td>" +
            //        "</tr>";
            //        $("#period tbody").append(tr_str);
            //      }
            //  }else{
            //     var tr_str = "<tr>" +
            //         "<td class='text-center' colspan='7'>ไม่พบข้อมูล</td>" +
            //     "</tr>";
            //     $("#period tbody").append(tr_str);
            //  }

            //  if(risk_period_len6 > 0){  // นับ Array Data risk_problem มากกว่า 0 ทำงาน เงื่อนไขนี้
            //      for(var i=0; i<risk_period_len6; i++){  // วนลูป
            //        var tr_str = "<tr>" +
            //             // "<td align='center'>" + response['period_1'][i].period_1 + "</td>" +
            //             // "<td align='center'>" + response['period_2'][i].period_2 + "</td>" +
            //             // "<td align='center'>" + response['period_3'][i].period_3 + "</td>" +
            //             // "<td align='center'>" + response['period_4'][i].period_4 + "</td>" +
            //             // "<td align='center'>" + response['period_5'][i].period_5 + "</td>" +
            //             "<td align='center'>" + response['period_6'][i].period_6 + "</td>" +
            //             // "<td align='center'>" + response['period_7'][i].period_7 + "</td>" +
            //             // "<td align='center'>" + response['period_8'][i].period_8 + "</td>" +
            //             // "<td align='center'>" + response['period_9'][i].period_9 + "</td>" +
            //             // "<td align='center'>" + response['period_10'][i].period_10 + "</td>" +
            //             // "<td align='center'>" + response['period_11'][i].period_11 + "</td>" +
            //             // "<td align='center'>" + response['period_12'][i].period_12 + "</td>" +
            //             // "<td align='center'>" + response['period_13'][i].period_13 + "</td>" +
            //             // "<td align='center'>" + response['period_14'][i].period_14 + "</td>" +
            //             // "<td align='center'>" + response['period_15'][i].period_15 + "</td>" +
            //        "</tr>";
            //        $("#period tbody").append(tr_str);
            //      }
            //  }else{
            //     var tr_str = "<tr>" +
            //         "<td class='text-center' colspan='7'>ไม่พบข้อมูล</td>" +
            //     "</tr>";
            //     $("#period tbody").append(tr_str);
            //  }

            //  if(risk_period_len7 > 0){  // นับ Array Data risk_problem มากกว่า 0 ทำงาน เงื่อนไขนี้
            //      for(var i=0; i<risk_period_len7; i++){  // วนลูป
            //        var tr_str = "<tr>" +
            //             // "<td align='center'>" + response['period_1'][i].period_1 + "</td>" +
            //             // "<td align='center'>" + response['period_2'][i].period_2 + "</td>" +
            //             // "<td align='center'>" + response['period_3'][i].period_3 + "</td>" +
            //             // "<td align='center'>" + response['period_4'][i].period_4 + "</td>" +
            //             // "<td align='center'>" + response['period_5'][i].period_5 + "</td>" +
            //             // "<td align='center'>" + response['period_6'][i].period_6 + "</td>" +
            //             "<td align='center'>" + response['period_7'][i].period_7 + "</td>" +
            //             // "<td align='center'>" + response['period_8'][i].period_8 + "</td>" +
            //             // "<td align='center'>" + response['period_9'][i].period_9 + "</td>" +
            //             // "<td align='center'>" + response['period_10'][i].period_10 + "</td>" +
            //             // "<td align='center'>" + response['period_11'][i].period_11 + "</td>" +
            //             // "<td align='center'>" + response['period_12'][i].period_12 + "</td>" +
            //             // "<td align='center'>" + response['period_13'][i].period_13 + "</td>" +
            //             // "<td align='center'>" + response['period_14'][i].period_14 + "</td>" +
            //             // "<td align='center'>" + response['period_15'][i].period_15 + "</td>" +
            //        "</tr>";
            //        $("#period tbody").append(tr_str);
            //      }
            //  }else{
            //     var tr_str = "<tr>" +
            //         "<td class='text-center' colspan='7'>ไม่พบข้อมูล</td>" +
            //     "</tr>";
            //     $("#period tbody").append(tr_str);
            //  }

            //  if(risk_period_len8 > 0){  // นับ Array Data risk_problem มากกว่า 0 ทำงาน เงื่อนไขนี้
            //      for(var i=0; i<risk_period_len8; i++){  // วนลูป
            //        var tr_str = "<tr>" +
            //             // "<td align='center'>" + response['period_1'][i].period_1 + "</td>" +
            //             // "<td align='center'>" + response['period_2'][i].period_2 + "</td>" +
            //             // "<td align='center'>" + response['period_3'][i].period_3 + "</td>" +
            //             // "<td align='center'>" + response['period_4'][i].period_4 + "</td>" +
            //             // "<td align='center'>" + response['period_5'][i].period_5 + "</td>" +
            //             // "<td align='center'>" + response['period_6'][i].period_6 + "</td>" +
            //             // "<td align='center'>" + response['period_7'][i].period_7 + "</td>" +
            //             "<td align='center'>" + response['period_8'][i].period_8 + "</td>" +
            //     //         "<td align='center'>" + response['period_9'][i].period_9 + "</td>" +
            //     //         "<td align='center'>" + response['period_10'][i].period_10 + "</td>" +
            //     //         "<td align='center'>" + response['period_11'][i].period_11 + "</td>" +
            //     //         "<td align='center'>" + response['period_12'][i].period_12 + "</td>" +
            //     //         "<td align='center'>" + response['period_13'][i].period_13 + "</td>" +
            //     //         "<td align='center'>" + response['period_14'][i].period_14 + "</td>" +
            //     //         "<td align='center'>" + response['period_15'][i].period_15 + "</td>" +
            //     //    "</tr>";
            //        $("#period tbody").append(tr_str);
            //      }
            //  }else{
            //     var tr_str = "<tr>" +
            //         "<td class='text-center' colspan='7'>ไม่พบข้อมูล</td>" +
            //     "</tr>";
            //     $("#period tbody").append(tr_str);
            //  }

            //  if(risk_period_len9 > 0){  // นับ Array Data risk_problem มากกว่า 0 ทำงาน เงื่อนไขนี้
            //      for(var i=0; i<risk_period_len9; i++){  // วนลูป
            //        var tr_str = "<tr>" +
            //             // "<td align='center'>" + response['period_1'][i].period_1 + "</td>" +
            //             // "<td align='center'>" + response['period_2'][i].period_2 + "</td>" +
            //             // "<td align='center'>" + response['period_3'][i].period_3 + "</td>" +
            //             // "<td align='center'>" + response['period_4'][i].period_4 + "</td>" +
            //             // "<td align='center'>" + response['period_5'][i].period_5 + "</td>" +
            //             // "<td align='center'>" + response['period_6'][i].period_6 + "</td>" +
            //             // "<td align='center'>" + response['period_7'][i].period_7 + "</td>" +
            //             // "<td align='center'>" + response['period_8'][i].period_8 + "</td>" +
            //             "<td align='center'>" + response['period_9'][i].period_9 + "</td>" +
            //             // "<td align='center'>" + response['period_10'][i].period_10 + "</td>" +
            //             // "<td align='center'>" + response['period_11'][i].period_11 + "</td>" +
            //             // "<td align='center'>" + response['period_12'][i].period_12 + "</td>" +
            //             // "<td align='center'>" + response['period_13'][i].period_13 + "</td>" +
            //             // "<td align='center'>" + response['period_14'][i].period_14 + "</td>" +
            //             // "<td align='center'>" + response['period_15'][i].period_15 + "</td>" +
            //        "</tr>";
            //        $("#period tbody").append(tr_str);
            //      }
            //  }else{
            //     var tr_str = "<tr>" +
            //         "<td class='text-center' colspan='7'>ไม่พบข้อมูล</td>" +
            //     "</tr>";
            //     $("#period tbody").append(tr_str);
            //  }

            //  if(risk_period_len10 > 0){  // นับ Array Data risk_problem มากกว่า 0 ทำงาน เงื่อนไขนี้
            //      for(var i=0; i<risk_period_len10; i++){  // วนลูป
            //        var tr_str = "<tr>" +
            //             // "<td align='center'>" + response['period_1'][i].period_1 + "</td>" +
            //             // "<td align='center'>" + response['period_2'][i].period_2 + "</td>" +
            //             // "<td align='center'>" + response['period_3'][i].period_3 + "</td>" +
            //             // "<td align='center'>" + response['period_4'][i].period_4 + "</td>" +
            //             // "<td align='center'>" + response['period_5'][i].period_5 + "</td>" +
            //             // "<td align='center'>" + response['period_6'][i].period_6 + "</td>" +
            //             // "<td align='center'>" + response['period_7'][i].period_7 + "</td>" +
            //             // "<td align='center'>" + response['period_8'][i].period_8 + "</td>" +
            //             // "<td align='center'>" + response['period_9'][i].period_9 + "</td>" +
            //             "<td align='center'>" + response['period_10'][i].period_10 + "</td>" +
            //             // "<td align='center'>" + response['period_11'][i].period_11 + "</td>" +
            //             // "<td align='center'>" + response['period_12'][i].period_12 + "</td>" +
            //             // "<td align='center'>" + response['period_13'][i].period_13 + "</td>" +
            //             // "<td align='center'>" + response['period_14'][i].period_14 + "</td>" +
            //             // "<td align='center'>" + response['period_15'][i].period_15 + "</td>" +
            //        "</tr>";
            //        $("#period tbody").append(tr_str);
            //      }
            //  }else{
            //     var tr_str = "<tr>" +
            //         "<td class='text-center' colspan='7'>ไม่พบข้อมูล</td>" +
            //     "</tr>";
            //     $("#period tbody").append(tr_str);
            //  }

            //  if(risk_period_len11 > 0){  // นับ Array Data risk_problem มากกว่า 0 ทำงาน เงื่อนไขนี้
            //      for(var i=0; i<risk_period_len11; i++){  // วนลูป
            //        var tr_str = "<tr>" +
            //             // "<td align='center'>" + response['period_1'][i].period_1 + "</td>" +
            //             // "<td align='center'>" + response['period_2'][i].period_2 + "</td>" +
            //             // "<td align='center'>" + response['period_3'][i].period_3 + "</td>" +
            //             // "<td align='center'>" + response['period_4'][i].period_4 + "</td>" +
            //             // "<td align='center'>" + response['period_5'][i].period_5 + "</td>" +
            //             // "<td align='center'>" + response['period_6'][i].period_6 + "</td>" +
            //             // "<td align='center'>" + response['period_7'][i].period_7 + "</td>" +
            //             // "<td align='center'>" + response['period_8'][i].period_8 + "</td>" +
            //             // "<td align='center'>" + response['period_9'][i].period_9 + "</td>" +
            //             // "<td align='center'>" + response['period_10'][i].period_10 + "</td>" +
            //             "<td align='center'>" + response['period_11'][i].period_11 + "</td>" +
            //             // "<td align='center'>" + response['period_12'][i].period_12 + "</td>" +
            //             // "<td align='center'>" + response['period_13'][i].period_13 + "</td>" +
            //             // "<td align='center'>" + response['period_14'][i].period_14 + "</td>" +
            //             // "<td align='center'>" + response['period_15'][i].period_15 + "</td>" +
            //        "</tr>";
            //        $("#period tbody").append(tr_str);
            //      }
            //  }else{
            //     var tr_str = "<tr>" +
            //         "<td class='text-center' colspan='7'>ไม่พบข้อมูล</td>" +
            //     "</tr>";
            //     $("#period tbody").append(tr_str);
            //  }

            //  if(risk_period_len12 > 0){  // นับ Array Data risk_problem มากกว่า 0 ทำงาน เงื่อนไขนี้
            //      for(var i=0; i<risk_period_len12; i++){  // วนลูป
            //        var tr_str = "<tr>" +
            //             // "<td align='center'>" + response['period_1'][i].period_1 + "</td>" +
            //             // "<td align='center'>" + response['period_2'][i].period_2 + "</td>" +
            //             // "<td align='center'>" + response['period_3'][i].period_3 + "</td>" +
            //             // "<td align='center'>" + response['period_4'][i].period_4 + "</td>" +
            //             // "<td align='center'>" + response['period_5'][i].period_5 + "</td>" +
            //             // "<td align='center'>" + response['period_6'][i].period_6 + "</td>" +
            //             // "<td align='center'>" + response['period_7'][i].period_7 + "</td>" +
            //             // "<td align='center'>" + response['period_8'][i].period_8 + "</td>" +
            //             // "<td align='center'>" + response['period_9'][i].period_9 + "</td>" +
            //             // "<td align='center'>" + response['period_10'][i].period_10 + "</td>" +
            //             // "<td align='center'>" + response['period_11'][i].period_11 + "</td>" +
            //             "<td align='center'>" + response['period_12'][i].period_12 + "</td>" +
            //             // "<td align='center'>" + response['period_13'][i].period_13 + "</td>" +
            //             // "<td align='center'>" + response['period_14'][i].period_14 + "</td>" +
            //             // "<td align='center'>" + response['period_15'][i].period_15 + "</td>" +
            //        "</tr>";
            //        $("#period tbody").append(tr_str);
            //      }
            //  }else{
            //     var tr_str = "<tr>" +
            //         "<td class='text-center' colspan='7'>ไม่พบข้อมูล</td>" +
            //     "</tr>";
            //     $("#period tbody").append(tr_str);
            //  }

            //  if(risk_period_len13 > 0){  // นับ Array Data risk_problem มากกว่า 0 ทำงาน เงื่อนไขนี้
            //      for(var i=0; i<risk_period_len13; i++){  // วนลูป
            //        var tr_str = "<tr>" +
            //             // "<td align='center'>" + response['period_1'][i].period_1 + "</td>" +
            //             // "<td align='center'>" + response['period_2'][i].period_2 + "</td>" +
            //             // "<td align='center'>" + response['period_3'][i].period_3 + "</td>" +
            //             // "<td align='center'>" + response['period_4'][i].period_4 + "</td>" +
            //             // "<td align='center'>" + response['period_5'][i].period_5 + "</td>" +
            //             // "<td align='center'>" + response['period_6'][i].period_6 + "</td>" +
            //             // "<td align='center'>" + response['period_7'][i].period_7 + "</td>" +
            //             // "<td align='center'>" + response['period_8'][i].period_8 + "</td>" +
            //             // "<td align='center'>" + response['period_9'][i].period_9 + "</td>" +
            //             // "<td align='center'>" + response['period_10'][i].period_10 + "</td>" +
            //             // "<td align='center'>" + response['period_11'][i].period_11 + "</td>" +
            //             // "<td align='center'>" + response['period_12'][i].period_12 + "</td>" +
            //             "<td align='center'>" + response['period_13'][i].period_13 + "</td>" +
            //             // "<td align='center'>" + response['period_14'][i].period_14 + "</td>" +
            //             // "<td align='center'>" + response['period_15'][i].period_15 + "</td>" +
            //        "</tr>";
            //        $("#period tbody").append(tr_str);
            //      }
            //  }else{
            //     var tr_str = "<tr>" +
            //         "<td class='text-center' colspan='7'>ไม่พบข้อมูล</td>" +
            //     "</tr>";
            //     $("#period tbody").append(tr_str);
            //  }

            //  if(risk_period_len > 14){  // นับ Array Data risk_problem มากกว่า 0 ทำงาน เงื่อนไขนี้
            //      for(var i=0; i<risk_period_len14; i++){  // วนลูป
            //        var tr_str = "<tr>" +
            //             // "<td align='center'>" + response['period_1'][i].period_1 + "</td>" +
            //             // "<td align='center'>" + response['period_2'][i].period_2 + "</td>" +
            //             // "<td align='center'>" + response['period_3'][i].period_3 + "</td>" +
            //             // "<td align='center'>" + response['period_4'][i].period_4 + "</td>" +
            //             // "<td align='center'>" + response['period_5'][i].period_5 + "</td>" +
            //             // "<td align='center'>" + response['period_6'][i].period_6 + "</td>" +
            //             // "<td align='center'>" + response['period_7'][i].period_7 + "</td>" +
            //             // "<td align='center'>" + response['period_8'][i].period_8 + "</td>" +
            //             // "<td align='center'>" + response['period_9'][i].period_9 + "</td>" +
            //             // "<td align='center'>" + response['period_10'][i].period_10 + "</td>" +
            //             // "<td align='center'>" + response['period_11'][i].period_11 + "</td>" +
            //             // "<td align='center'>" + response['period_12'][i].period_12 + "</td>" +
            //             // "<td align='center'>" + response['period_13'][i].period_13 + "</td>" +
            //             "<td align='center'>" + response['period_14'][i].period_14 + "</td>" +
            //             // "<td align='center'>" + response['period_15'][i].period_15 + "</td>" +
            //        "</tr>";
            //        $("#period tbody").append(tr_str);
            //      }
            //  }else{
            //     var tr_str = "<tr>" +
            //         "<td class='text-center' colspan='7'>ไม่พบข้อมูล</td>" +
            //     "</tr>";
            //     $("#period tbody").append(tr_str);
            //  }

            //  if(risk_period_len15 > 0){  // นับ Array Data risk_problem มากกว่า 0 ทำงาน เงื่อนไขนี้
            //      for(var i=0; i<risk_period_len15; i++){  // วนลูป
            //        var tr_str = "<tr>" +
            //             // "<td align='center'>" + response['period_1'][i].period_1 + "</td>" +
            //             // "<td align='center'>" + response['period_2'][i].period_2 + "</td>" +
            //             // "<td align='center'>" + response['period_3'][i].period_3 + "</td>" +
            //             // "<td align='center'>" + response['period_4'][i].period_4 + "</td>" +
            //             // "<td align='center'>" + response['period_5'][i].period_5 + "</td>" +
            //             // "<td align='center'>" + response['period_6'][i].period_6 + "</td>" +
            //             // "<td align='center'>" + response['period_7'][i].period_7 + "</td>" +
            //             // "<td align='center'>" + response['period_8'][i].period_8 + "</td>" +
            //             // "<td align='center'>" + response['period_9'][i].period_9 + "</td>" +
            //             // "<td align='center'>" + response['period_10'][i].period_10 + "</td>" +
            //             // "<td align='center'>" + response['period_11'][i].period_11 + "</td>" +
            //             // "<td align='center'>" + response['period_12'][i].period_12 + "</td>" +
            //             // "<td align='center'>" + response['period_13'][i].period_13 + "</td>" +
            //             // "<td align='center'>" + response['period_14'][i].period_14 + "</td>" +
            //             "<td align='center'>" + response['period_15'][i].period_15 + "</td>" +
            //        "</tr>";
            //        $("#period tbody").append(tr_str);
            //      }
            //  }else{
            //     var tr_str = "<tr>" +
            //         "<td class='text-center' colspan='7'>ไม่พบข้อมูล</td>" +
            //     "</tr>";
            //     $("#period tbody").append(tr_str);
            //  }

          },
          error: function() {
              console.log('error');
          }
          });
        }
    </script>
@endsection
@extends('bar.header(student)')
