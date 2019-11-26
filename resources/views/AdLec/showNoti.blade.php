@extends('bar.body') @section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>การแจ้งเตือน</title>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li> </li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <li class="breadcrumb-item active" aria-current="page"><a href="{{ url('indexNoti') }}">การแจ้งเตือน</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="" name="mode">การแจ้งเตือน(Advisor)</a></li>
        </ol>
    </nav>

</head>

<body>
{{-- popup ของโบว์เองแหละ--}}
  	{{-- <div class="container"> --}}
  <!-- Trigger the modal with a button -->
  <h6 align='right'>
    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" id="open">
        <h6>
            <img src="{{ URL::asset("../img/noti.png") }}" width="30" height="25" title="ดูเงื่อนไขแจ้งเตือน">
            เงื่อนไขการแจ้งเตือน
        </h6>
    </button> &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
  </h6>

    <form method="post" action="{{url('modal')}}" id="form">
        @csrf
  <!-- Modal -->
  <div class="modal" tabindex="-1" role="dialog" id="myModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
            <div class="alert alert-danger" style="display:none"></div>

        <div class="modal-header">
        <h5 class="modal-title">เงื่อนไขในการแจ้งเตือน</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

    <div class="modal-body">
<br><br>
        <center>
            <table class="table table-striped">
              <thead>
                  <tr>
                    <td>เรื่องที่จะทำการกำหนดการแจ้งเตือน</td>
                    <td>เงื่อนไขในการแจ้งเตือน</td>
                    <td>จำนวนที่จะทำให้เกิดการแจ้งเตือน</td>
                  </tr>
              </thead>
              <tbody>
                  @foreach($conditions as $con)
                  <tr>
                        <td>
                            @if($con->behavior_attribute == 'Problem')
                            level ความรุนแรงของปัญหา
                            @elseif($con->behavior_attribute == 'Attendance')
                            จำนวนการขาดเรียน
                            @else
                            ผลสอบกลางภาค
                            @endif
                        </td>
                        <td>{{$con->condition}}</td>
                        <td>{{$con->value}}</td>
                  </tr>
                  @endforeach
              </tbody>
            </table>
        </center>
        <div class="modal-footer">
      	    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>

    </div>
  </div>
</div>
</form>
</div>
{{-- จบ popup ของโบว์ละ --}}

    <h3 align='center'>การแจ้งเตือน</h3>
    <br>

    <div class="container">
        <div class="row">

            <div class="col-sm-4">

                <div class="card mb-3" style="max-width: 400px;box-shadow: 5px 5px 8px 4px rgba(50, 50, 50, .5); ">
                    <div class="row no-gutters">
                        <div class="col-md-4">

                            <img src="../img/feedback.png" class="card-img" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">

                                <b> <p class="card-text">
                                                การแจ้งเตือน
                                            </p></b> {{--
                                <h5 class="card-title">การแจ้งเตือนพฤติกรรมและปัญหา</h5>--}}
                                <p class="card-text">
                                    <button type="button" class="btn btn-danger" data-toggle="modal">
                                        <a href="#exampleModal1" style="text-decoration-line: none;color: white"> พฤติกรรมและปัญหา&nbsp;&nbsp;</a>
                                        <span class="badge badge-light">
                                                <p>{{$riskproblem}}</p>
                                            </span>
                                    </button>
                                </p>

                                {{--
                                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>--}}
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-sm">

                <div class="card mb-3" style="max-width: 400px;box-shadow: 5px 5px 8px 4px rgba(50, 50, 50, .5); ">
                    <div class="row no-gutters">
                        <div class="col-md-4">

                            <img src="../img/feedback.png" class="card-img" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">

                                <b> <p class="card-text">
                                                การแจ้งเตือน
                                            </p></b> {{--
                                <h5 class="card-title">การแจ้งเตือนพฤติกรรมและปัญหา</h5>--}}
                                <p class="card-text">
                                    <button type="button" class="btn btn-danger" data-target="#exampleModal">
                                        <a href="#exampleModal2" style="text-decoration-line: none;color: white">การเข้าเรียน&nbsp;&nbsp;</a>
                                        <span class="badge badge-light">
                                        <p>{{$riskattendance}}</p>
                                    </span>
                                    </button>
                                </p>

                                {{--
                                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>--}}
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-sm">

                <div class="card mb-3" style="max-width: 400px;box-shadow: 5px 5px 8px 4px rgba(50, 50, 50, .5); ">
                    <div class="row no-gutters">
                        <div class="col-md-4">

                            <img src="../img/feedback.png" class="card-img" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">

                                <b> <p class="card-text">
                                                การแจ้งเตือน
                                            </p></b> {{--
                                <h5 class="card-title">การแจ้งเตือนพฤติกรรมและปัญหา</h5>--}}
                                <p class="card-text">
                                    <button type="button" class="btn btn-danger" data-target="#exampleModal3">
                                        <a href="#exampleModal3" style="text-decoration-line: none;color: white">ผลการเรียน&nbsp;&nbsp;</a>
                                        <span class="badge badge-light">
                                    <p>{{$riskgrade}}</p>
                                </span>
                                    </button>
                                </p>

                                {{--
                                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>--}}
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <br>
    <center>
        <br> {{-- แจ้งเตือนปัญหาและพฤติกรรม --}}

        <button type="button" class="btn btn-outline-white" style="border-color: white; position: relative; left: -30%"><img src="../img/noti.png" style="width: 12%;float: left">
            <h5><a name="exampleModal1">การแจ้งเตือนปัญหาและพฤติกรรม</a></h5></button>
        <br>
        <br>
        <br>
        <br>
        <table class="table" width="60%">
            <thead class="thead-light">
                <tr>
                    <th scope="col">รหัสนักศึกษา</th>
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
                @foreach ($risk_problem as $show_problem)

                <tr>
                    <td scope="row">
                        <a href="/notiproblemAL/{{$show_problem->student_id}}" style="color: black;text-decoration-line: none">
                            {{$show_problem->student_id}}
                        </a>
                    </td>
                    <td>{{$show_problem->problem_type}}</td>
                    <td>{{$show_problem->problem_topic}}</td>
                    <td>{{$show_problem->problem_detail}}</td>
                    <td>{{$show_problem->risk_level}}</td>
                    <td>{{$show_problem->created_at}}</td>
                    <td>{{$show_problem->date}}</td>
                    <td>อาจารย์ {{$show_problem->users->name}}</td>
                </tr>

                @endforeach

            </tbody>
        </table>
        <a href="#mode"><img src="../img/arrow.jpg" style="width: 15px;position: relative;float: right;right: 11%" ></a>
        <br>
        <br> {{-- แจ้งเตือนการเข้าเรียน --}}
        <button type="button" class="btn btn-outline-white" style="border-color: white; position: relative; left: -32%"><img src="../img/noti.png" style="width: 15%;float: left">
            <h5><a name="exampleModal2">การแจ้งเตือนการเข้าเรียน</a></h5></button>
        <br>
        <br>
        <br>
        <br>

        <table class="table" width="60%">
            <thead class="thead-light">
                <tr>
                    <th scope="col">รหัสนักศึกษา</th>
                    <th scope="col">รหัสวิชา</th>
                    <th scope="col">จำนวนที่ขาด</th>
                    <th scope="col">ผู้เพิ่ม</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($risk_attendance as $show_problem)

                <tr>
                    <td scope="row">
                        <a href="/notiproblemAL/{{$show_problem->student_id}}" style="color: black;text-decoration-line: none">
                            {{$show_problem->student_id}}
                        </a>
                    </td>
                    <td>{{$show_problem->course_id}}</td>
                    <td>{{$show_problem->amount_absence}}</td>

                    <td>อาจารย์ {{$show_problem->person_add}}</td>
                </tr>

                @endforeach

            </tbody>
        </table>
        <a href="#mode"><img src="../img/arrow.jpg" style="width: 15px;position: relative;float: right;right: 11%" ></a>
        <br>
        <br> {{-- แจ้งเตือนผลการเรียน --}}
        <button type="button" class="btn btn-outline-white" style="border-color: white; position: relative; left: -32%"><img src="../img/noti.png" style="width: 15%;float: left">
            <h5><a name="exampleModal3">การแจ้งเตือนผลการเรียน</a></h5></button>
        <br>
        <br>
        <br>
        <br>

        <table class="table" width="60%">
            <thead class="thead-light">
                <tr>
                    <th scope="col">รหัสนักศึกษา</th>
                    <th scope="col">รหัสวิชา</th>
                    <th scope="col">คะแนนสอบ Midterm</th>
                    <th scope="col">คะแนนสอบ Final</th>
                    <th scope="col">คะแนนรวมทั้งหมด</th>
                    <th scope="col">ผู้เพิ่ม</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($risk_grade as $show_problem)

                <tr>
                    <td scope="row">
                        <a href="/notiproblemAL/{{$show_problem->student_id}}" style="color: black;text-decoration-line: none">
                            {{$show_problem->student_id}}
                        </a>
                    </td>
                    <td>{{$show_problem->course_id}}</td>
                    <td>{{$show_problem->test_midterm}}</td>
                    <td>{{$show_problem->test_final}}</td>
                    <td>{{$show_problem->total_all}}/100</td>

                    <td>อาจารย์ {{$show_problem->person_add}}</td>
                </tr>

                @endforeach

            </tbody>
        </table>
        <a href="#mode"><img src="../img/arrow.jpg" style="width: 15px;position: relative;float: right;right: 11%" ></a>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
    </center>

</body>

</html>

@endsection @extends('bar.header(AdLec)')
