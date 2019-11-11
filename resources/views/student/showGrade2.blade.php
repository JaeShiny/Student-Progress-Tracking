@extends('bar.body')
@section('content')

<!DOCTYPE html>
<html>

<head>
    <title>แสดงผลการเรียน</title>
    <link rel="stylesheet" href="csste.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-grid.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-reboot.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            {{-- <li class="breadcrumb-item" aria-current="page"><a href="/advisor/showAtt">การเข้าเรียนและผลการเรียน</a></li> --}}
            <li class="breadcrumb-item" aria-current="page"><a href="">ผลการเรียน</a></li>
        </ol>
    </nav>

    <style>
        .row{
            margin-right: 0px;
        }
    </style>

</head>

<body>
        @foreach ($bios as $bio)
        <h6 align='right'>รหัสนักศึกษา: {{$bio->student_id}} &nbsp;&nbsp;&nbsp;&nbsp;</h6>
        <h6 align='right'>ชื่อ-สกุล: {{$bio->first_name}} &nbsp;{{$bio->last_name}}&nbsp;&nbsp;&nbsp;</h6>
    @endforeach




<br>
<div class="container">
        <div class="card bg-light mt" style="box-shadow: 5px 5px 8px 4px rgba(50, 50, 50, .5);">
            <div class="card-header">
                    <h4 class="w3-bar-item">ผลการเรียน</h4>

                    {{--<h6 class="w3-bar-item">ภาคเรียนที่:&nbsp;{{$semesters}}/{{$year}}</h6>--}}
            </div>
            <div class="container">
                    <div class="row">
                        <div class="col-lg-12 float-right">
                            <div class="btn-group">
                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">เทอม/ปีการศึกษา<span class="caret"></span></button>
                                <ul class="dropdown-menu scrollable-menu" role="menu">
                                    @foreach($semesters as $show)
                                    <li> <a class="dropdown-item" href="/student/grade/{{$show->semester}}/{{$show->year}}">{{$show->semester}}/{{$show->year}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
<br><br><br>
    <center>

        <table class="table table-hover">
            <thead>
                    <tr>
                            <th style="width: 13%"><center>รหัสวิชา</center></th>
                            <th>รหัสนักศึกษา</th>
                            <th style="width: 33%"><center>ชื่อ-สกุล</center></th>
                            {{-- <th>คะแนนเก็บมิดเทอม(เต็ม)</th>
                            <th>คะแนนเก็บมิดเทอม(ที่ได้)</th>
                            <th>คะแนนสอบมิดเทอม(เต็ม)</th>
                            <th>คะแนนสอบมิดเทอม(ที่ได้)</th>
                            <th>mean midterm</th> --}}
                            <th style="width: 17%">คะแนนมิดเทอมที่ได้</th>
                            {{-- <th>คะแนนเก็บไฟนอล(เต็ม)</th>
                            <th>คะแนนเก็บไฟนอล(ที่ได้)</th>
                            <th>คะแนนสอบไฟนอล(เต็ม)</th>
                            <th>คะแนนสอบไฟนอล(ที่ได้)</th>
                            <th>mean final</th> --}}
                            <th style="width: 15%">คะแนนไฟนอลที่ได้</th>
                            <th style="width: 15%">คะแนนรวมทั้งหมด</th>
                            <th>รายละเอียดเพิ่มเติม</th>
                          </tr>
            </thead>

            @foreach($grade as $show_student)
            <tbody>
                <tr>
                  {{-- <td>{{$show_student->course_id}}</td>
                  <td>{{$show_student->student_id}}</td>
                  ไม่ใช้ <td>{{$show_student->id->name}} &nbsp;&nbsp; {{$show_student->id->last_name}}</td>
                  <td>{{$show_student->full_score_midterm}}</td>
                  <td>{{$show_student->score_midterm}}</td>
                  <td>{{$show_student->full_test_midterm}}</td>
                  <td>{{$show_student->test_midterm}}</td>
                  <td>{{$show_student->mean_test_midterm}}</td>
                  <td>{{$show_student->total_midterm}}</td>
                  <td>{{$show_student->full_score_final}}</td>
                  <td>{{$show_student->score_final}}</td>
                  <td>{{$show_student->full_test_final}}</td>
                  <td>{{$show_student->test_final}}</td>
                  <td>{{$show_student->mean_test_final}}</td>
                  <td>{{$show_student->total_final}}</td>
                  <td>{{$show_student->total_all}}</td> --}}

                  <td><center>{{$show_student->course_id}}</center></td>
                  <td><center>{{$show_student->student_id}}</center></td>
                  <td>{{$show_student->users['name']}}&nbsp;&nbsp;{{$show_student->users['lastname']}}</td>
                  <td><center>{{$show_student->total_midterm}}</center></td>
                  <td><center>{{$show_student->total_final}}</center></td>
                  <td><center>{{$show_student->total_all}}</center></td>
                  <td>
                    <!-- Button trigger modal -->
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{$show_student->student_id}}">
                      รายละเอียด
                  </button>
                </td>
              </tr>
            </tbody>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal{{$show_student->student_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">รายละเอียดผลการเรียนของ:&nbsp;{{$show_student->student_id}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                            <div>
                                <b>คะแนนเก็บมิดเทอม(เต็ม): </b> &nbsp;{{$show_student->full_score_midterm}}
                            </div>
                            <div>
                                <b>คะแนนเก็บมิดเทอม(ที่ได้): </b> &nbsp;{{$show_student->score_midterm}}
                            </div>
                            <div>
                                <b>คะแนนสอบมิดเทอม(เต็ม): </b> &nbsp;{{$show_student->full_test_midterm}}
                            </div>
                            <div>
                                <b>คะแนนสอบมิดเทอม(ที่ได้): </b> &nbsp;{{$show_student->test_midterm}}
                            </div>
                            {{-- <div>
                                <b>mean midterm: </b> &nbsp;{{$show_student->mean_test_midterm}}
                            </div> --}}
                            <div>
                                <b>total miderm score: </b> &nbsp;{{$show_student->total_midterm}}
                            </div>
                            <div>
                                <b>คะแนนเก็บไฟนอล(เต็ม): </b> &nbsp;{{$show_student->full_score_final}}
                            </div>
                            <div>
                                <b>คะแนนเก็บไฟนอล(ที่ได้): </b> &nbsp;{{$show_student->score_final}}
                            </div>
                            <div>
                                <b>คะแนนสอบไฟนอล(เต็ม): </b> &nbsp;{{$show_student->full_test_final}}
                            </div>
                            <div>
                                <b>คะแนนสอบไฟนอล(ที่ได้)): </b> &nbsp;{{$show_student->test_final}}
                            </div>
                            {{-- <div>
                                <b>mean final: </b> &nbsp;{{$show_student->mean_test_final}}
                            </div> --}}
                            <div>
                                <b>total final score: </b> &nbsp;{{$show_student->total_final}}
                            </div>
                            <div>
                                <b>คะแนนรวมทั้งหมด: </b> &nbsp;{{$show_student->total_all}}
                            </div>
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                        </div>
                    </div>
                    </div>
                </div>

            @endforeach
        </table><br>
    </center>

</div>
</div>
<br>
<h6 align='center'><a class="nav-link" href="/student/grade">กลับ</a></h6><br>

</body>

</html>

@endsection
@extends('bar.header(student)')
