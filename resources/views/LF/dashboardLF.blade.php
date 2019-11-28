@extends('lecturer.condition.layout')

@section('content')

<br>
    {{-- <div class="card" style="box-shadow: 5px 5px 8px 4px rgba(50, 50, 50, .5); "> --}}
        <div class="media-body"><br>

            <div class="container">
                <div class="row">

                    {{-- ปัญหา --}}

                    <div class="col-sm-4">
                        <div class="card mb-3" style="max-width: 400px;box-shadow: 5px 5px 8px 4px rgba(50, 50, 50, .5);background-color: #F0FFF0">
                            <div class="row no-gutters">
                                <div class="col-md-4">
                                    <img src="{{ URL::asset('../img/noti_dash.png') }}" class="card-img" alt="...">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <b>
                                            <p class="card-text">การแจ้งเตือน</p>
                                        </b>
                                        <p class="card-text">
                                        <button type="button" class="btn btn-danger" data-toggle="modal">
                                            <a href="#exampleModal1" style="text-decoration-line: none;color: white"> พฤติกรรมและปัญหา&nbsp;&nbsp;</a>
                                            <span class="badge badge-light">
                                                <p>{{$riskproblem}}</p>
                                            </span>
                                        </button>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- การเข้าเรียน --}}

                    <div class="col-sm">
                        <div class="card mb-3" style="max-width: 400px;box-shadow: 5px 5px 8px 4px rgba(50, 50, 50, .5);background-color: #FAEBD7">
                            <div class="row no-gutters">
                                <div class="col-md-4">
                                    <img src="{{ URL::asset('../img/noti_dash.png') }}" class="card-img" alt="...">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <b><p class="card-text">การแจ้งเตือน</p></b>
                                        <p class="card-text">
                                            <button type="button" class="btn btn-danger" data-toggle="modal">
                                                <a href="#exampleModal1" style="text-decoration-line: none;color: white"> การเข้าเรียน&nbsp;&nbsp;</a>
                                                <span class="badge badge-light">
                                                    <p>{{$riskattendance}}</p>
                                                </span>
                                            </button>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- ผลการเรียน --}}

                    <div class="col-sm">
                        <div class="card mb-3" style="max-width: 400px;box-shadow: 5px 5px 8px 4px rgba(50, 50, 50, .5); background-color: #E0FFFF">
                            <div class="row no-gutters">
                                <div class="col-md-4">
                                    <img src="{{ URL::asset('../img/noti_dash.png') }}" class="card-img" alt="..." width="5px">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <b><p class="card-text">การแจ้งเตือน</p></b>
                                        <p class="card-text">
                                            <button type="button" class="btn btn-danger" data-toggle="modal">
                                                <a href="#exampleModal1" style="text-decoration-line: none;color: white"> ผลการเรียน&nbsp;&nbsp;</a>
                                                <span class="badge badge-light">
                                                    <p>{{$riskgrade}}</p>
                                                </span>
                                            </button>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    {{-- </div> --}}
    <br>

    <div class="card" style="box-shadow: 5px 5px 8px 4px rgba(50, 50, 50, .5);background-color: #f1f1f1; ">

        <div class="media-body">

            @foreach ($all_notification as $noti)
            <center>
                <div class="col-9">
                    <br>
                    <div class="card" style="box-shadow: 5px 5px 8px 4px rgba(50, 50, 50, .5); ">

                        <div class="card-header" style="background-color: teal">
                            <img src="{{ URL::asset('../img/noti.png') }}" class="card-img" alt="..." style="width: 5%;height: 5%;float: right">
                            <b style="float: left; color: white">รหัสวิชา: {{$noti->course_id}}</b>
                            <br>
                            <b style="float: left;color: white"> รหัสนักศึกษา:  {{$noti->student_id}}</b>
                            <br>
                        </div>

                        <div class="card-body">
                <blockquote class="blockquote mb-0">

                            @if ('App\Model\spts\Problem' == get_class($noti))

                                <h6 align='left'><b>หัวข้อการแจ้งเตือน:</b> พฤติกรรม/ปัญหา</h6>
                                <h6 align='left'><b>รหัสวิชา:</b> {{$noti->course_id}}</h6>
                                <h6 align='left'><b>ประเภทของปัญหา:</b> {{$noti->problem_type}}</h6>
                                <h6 align='left'><b>หัวข้อปัญหา:</b> {{$noti->problem_topic}}</h6>
                                <h6 align='left'><b>รายละเอียดของปัญหา:</b> {{$noti->problem_detail}}</h6>
                                <h6 align='left'><b>ระดับความรุนแรงของปัญหา:</b>
                                    @if($noti->risk_level == 1)
                                    1 = น้อย
                                    @elseif($noti->risk_level == 2)
                                    2 = ต่ำ
                                    @elseif($noti->risk_level == 3)
                                    3 = ปานกลาง
                                    @elseif($noti->risk_level == 4)
                                    4 = สูง
                                    @else
                                    <p style="color: red">5 = สูงมาก</p>
                                    @endif
                                </h6>
                                <footer class="blockquote-footer">ผู้เพิ่ม: <cite title="Source Title">อาจารย์{{$noti->person_add}}</cite></footer>

                            @elseif ('App\Model\spts\Attendance' == get_class($noti))

                                <h6 align='left'><b>หัวข้อการแจ้งเตือน:</b> การขาดเรียน</h6>
                                <h6 align='left'><b>รหัสวิชา:</b> {{$noti->course_id}}</h6>
                                <h6 align='left'><b>จำนวนการขาดเรียน:</b> {{$noti->amount_absence}} ครั้ง</h6>
                                <footer class="blockquote-footer">ผู้เพิ่ม: <cite title="Source Title">อาจารย์{{$noti->person_add}}</cite></footer>

                            @elseif ('App\Model\spts\Grade' == get_class($noti))

                                <h6 align='left'><b>หัวข้อการแจ้งเตือน:</b> ผลการเรียน</h6>
                                <h6 align='left'><b>รหัสวิชา:</b> {{$noti->course_id}}</h6>
                                <h6 align='left'><b>คะแนนสอบมิดเทอม:</b> {{$noti->total_midterm}} คะแนน</h6>
                                <footer class="blockquote-footer">ผู้เพิ่ม: <cite title="Source Title">อาจารย์{{$noti->person_add}}</cite></footer>

                            @endif
                <a class="btn text-right">
                    <button type="button" class="close" aria-label="Close" style="float: right;">

                    <span>
                        <a href="/dashboardLF/?attendance={{ @$noti['attendance_id'] }}&problem={{ @$noti['problem_id'] }}&grade={{ @$noti['grade_id'] }}&link_target=notification" style="text-decoration-line: none;float: right;color: red">
                            <h6>&times; &nbsp; ทราบปัญหา</h6>
                        </a>
                    </span>

                    </button>
                </a>

                </blockquote>

                        </div>

                    </div>
                    <br>
                </div>

                @endforeach
            </center>
        </div>
    </div><br><br>

@endsection

@extends('bar.header(LF)')
