@extends('lecturer.condition.layout')

@section('content')
<br><br>

<div class="container">
    <div class="row">
{{-- ปัญหา --}}
        <div class="col-sm-4">
            <div class="card mb-3" style="max-width: 400px;box-shadow: 5px 5px 8px 4px rgba(50, 50, 50, .5); ">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="{{ URL::asset('../img/feedback.png') }}" class="card-img" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                        <b>
                        <p class="card-text">
                            การแจ้งเตือน
                        </p>
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
            <div class="card mb-3" style="max-width: 400px;box-shadow: 5px 5px 8px 4px rgba(50, 50, 50, .5); ">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="{{ URL::asset('../img/feedback.png') }}" class="card-img" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                        <b>
                        <p class="card-text">
                            การแจ้งเตือน
                        </p>
                        </b>
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
            <div class="card mb-3" style="max-width: 400px;box-shadow: 5px 5px 8px 4px rgba(50, 50, 50, .5); ">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="{{ URL::asset('../img/feedback.png') }}" class="card-img" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                        <b>
                        <p class="card-text">
                            การแจ้งเตือน
                        </p>
                        </b>
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
<br><br>
<center>


{{-- <div class="card">
    <a class="btn text-right">
        <button type="button" class="close" aria-label="Close" style="float: right;">
            <span aria-hidden="true">&times;</span>
        </button>
    </a>

  <div class="card-header">
    รหัสวิชา: <br>
    ชื่อ-สกุล:  &nbsp;&nbsp;&nbsp; รหัสนักศึกษา:    <br>
  </div>

  <div class="card-body">
    <blockquote class="blockquote mb-0">
      <h6 align='left'>หัวข้อการแจ้งเตือน: ปัญหาและพฤติกรรม</h6>
      <h6 align='left'>ประเภทของปัญหา: </h6>
      <h6 align='left'>หัวข้อปัญหา: </h6>
      <h6 align='left'>ระดับความเสี่ยง: </h6>
      <footer class="blockquote-footer">ผู้เพิ่ม: <cite title="Source Title">person_add</cite></footer>
    </blockquote>
  </div>
</div><br> --}}


@foreach ($all_notification as $noti)
<div class="card">
    <a class="btn text-right">
        <button type="button" class="close" aria-label="Close" style="float: right;">
            {{-- <span aria-hidden="true">&times;</span> --}}
            <span>
            <a href="/dashboardL/?attendance={{ @$noti['attendance_id'] }}&problem={{ @$noti['problem_id'] }}&grade={{ @$noti['grade_id'] }}&link_target=notification">
                    &times;
                </a>
            </span>
        </button>
    </a>

    <div class="card-header">
        รหัสวิชา: {{$noti->course_id}}<br>
        รหัสนักศึกษา:  {{$noti->student_id}} <br>
    </div>

    <div class="card-body">
        <blockquote class="blockquote mb-0">
            @if ('App\Model\spts\Problem' == get_class($noti))

                <h6 align='left'>หัวข้อการแจ้งเตือน: พฤติกรรม/ปัญหา</h6>
                <h6 align='left'>รหัสวิชา: {{$noti->course_id}}</h6>
                <h6 align='left'>ประเภทของปัญหา: {{$noti->problem_type}}</h6>
                <h6 align='left'>หัวข้อปัญหา: {{$noti->problem_topic}}</h6>
                <h6 align='left'>รายละเอียดของปัญหา:{{$noti->problem_detail}}</h6>
                <h6 align='left'>ระดับความรุนแรงของปัญหา:
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

                <h6 align='left'>หัวข้อการแจ้งเตือน: การขาดเรียน</h6>
                <h6 align='left'>รหัสวิชา: {{$noti->course_id}}</h6>
                <h6 align='left'>จำนวนการขาดเรียน: {{$noti->amount_absence}}</h6>
                <footer class="blockquote-footer">ผู้เพิ่ม: <cite title="Source Title">อาจารย์{{$noti->person_add}}</cite></footer>

            @elseif ('App\Model\spts\Grade' == get_class($noti))

                <h6 align='left'>หัวข้อการแจ้งเตือน: ผลการเรียน</h6>
                <h6 align='left'>รหัสวิชา: {{$noti->course_id}}</h6>
                <h6 align='left'>คะแนนสอบมิดเทอม: {{$noti->total_midterm}}</h6>
                <footer class="blockquote-footer">ผู้เพิ่ม: <cite title="Source Title">อาจารย์{{$noti->person_add}}</cite></footer>

            @endif

        </blockquote>
  </div>

</div><br>

@endforeach
  {{-- <div class="card-header">
    รหัสวิชา: <br>
    ชื่อ-สกุล:  &nbsp;&nbsp;&nbsp; รหัสนักศึกษา:    <br>
  </div>

  <div class="card-body">
    <blockquote class="blockquote mb-0">
      <h6 align='left'>หัวข้อการแจ้งเตือน: การขาดเรียน</h6>
      <h6 align='left'>รหัสวิชา: </h6>
      <h6 align='left'>จำนวนการขาดเรียน: </h6>
      <footer class="blockquote-footer">ผู้เพิ่ม: <cite title="Source Title">person_add</cite></footer>
    </blockquote>
  </div>
</div><br>

<div class="card">
    <a class="btn text-right">
        <button type="button" class="close" aria-label="Close" style="float: right;">
            <span aria-hidden="true">&times;</span>
        </button>
    </a>

  <div class="card-header">
    รหัสวิชา: <br>
    ชื่อ-สกุล:  &nbsp;&nbsp;&nbsp; รหัสนักศึกษา:    <br>
  </div>

  <div class="card-body">
    <blockquote class="blockquote mb-0">
      <h6 align='left'>หัวข้อการแจ้งเตือน: ผลการเรียน</h6>
      <h6 align='left'>รหัสวิชา: </h6>
      <h6 align='left'>คะแนนสอบมิดเทอม: </h6>
      <footer class="blockquote-footer">ผู้เพิ่ม: <cite title="Source Title">person_add</cite></footer>
    </blockquote>
  </div>
</div><br> --}}

@endsection

@extends('bar.header(lec)')
