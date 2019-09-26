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

@foreach ($grade as $students)
    <h6 align='right'>รหัสนักศึกษา: {{$students->student_id}} &nbsp;&nbsp;&nbsp;&nbsp;</h6>
    <h6 align='right'>ชื่อ-สกุล: {{$students->users['name']}} &nbsp;{{$students->users['lastname']}}&nbsp;&nbsp;&nbsp;</h6>
@endforeach

<h5 align='center'>ผลการเรียน</h5>


<div class="row">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<div class="container">

    <br><br><br>

    <center>
        <table class="table table-hover">
            <thead>
                <tr>
                  <th style="width: 13%"><center>รหัสวิชา</center></th>
                  <th>รหัสนักศึกษา</th>
                  <th style="width: 35%"><center>ชื่อ-สกุล</center></th>
                  {{-- <th>คะแนนเก็บมิดเทอม(เต็ม)</th>
                  <th>คะแนนเก็บมิดเทอม(ที่ได้)</th>
                  <th>คะแนนสอบมิดเทอม(เต็ม)</th>
                  <th>คะแนนสอบมิดเทอม(ที่ได้)</th>
                  <th>mean midterm</th> --}}
                  <th>คะแนนมิดเทอมที่ได้</th>
                  {{-- <th>คะแนนเก็บไฟนอล(เต็ม)</th>
                  <th>คะแนนเก็บไฟนอล(ที่ได้)</th>
                  <th>คะแนนสอบไฟนอล(เต็ม)</th>
                  <th>คะแนนสอบไฟนอล(ที่ได้)</th>
                  <th>mean final</th> --}}
                  <th>คะแนนไฟนอลที่ได้</th>
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
                            <div>
                                <b>mean midterm: </b> &nbsp;{{$show_student->mean_test_midterm}}
                            </div>
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
                            <div>
                                <b>mean final: </b> &nbsp;{{$show_student->mean_test_final}}
                            </div>
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
        </table>
    </center>
    </div>
</div>
</div>
</div><br>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>

@endsection
@extends('bar.header(student)')
