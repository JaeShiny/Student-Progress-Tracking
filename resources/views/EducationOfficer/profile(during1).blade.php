@extends('bar.body')
@section('content')
<!DOCTYPE html>
<html>
<head>
    <title>ข้อมูลระหว่างการศึกษา</title>
    {{-- <link href="{{ asset('css/csste.css') }}" rel="stylesheet" type="text/css"> --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"  >

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li> </li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <li class="breadcrumb-item"><a href="{{ url('curriculum') }}">หลักสูตร</a></li>
            <li class="breadcrumb-item" aria-current="page">รายชื่อนักศึกษา</li>
            <li class="breadcrumb-item active" aria-current="page"><a href="/student_profileE/{{$bios->student_id}}">ประวัตินักศึกษา</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="">ข้อมูลระหว่างศึกษา</a></li>
        </ol>
    </nav>

</head>

<body>
    <br>


        <div class="jumbotron"style="box-shadow: 5px 5px 8px 4px rgba(50, 50, 50, .5);">
            <h4 class="display-4"></h4>
            <B><u>ข้อมูลระหว่างการศึกษา</u></B><br><br>
            <p>
                <B>ข้อมูลนักศึกษา</B>
            </p>

            <hr class="my-4">

            <p>รหัสนักศึกษา &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </p>

            <p>{{$bios->student_id}}</p>

            <br>
            <br>
            <p>ชื่อ (ภาษาไทย) &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : </p>
            <p>{{$bios->first_name}}&nbsp;&nbsp;{{$bios->last_name}}</p>
            <br>
            <br>
{{--
            <div class="container7">
                <img src="../image/{{$bios->picture}}" width="110" height="140">
            </div> --}}

            <p>ชื่อ (ภาษาอังกฤษ) &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : </p>
            <p>{{$bios->firstname_eng}}&nbsp;&nbsp;{{$bios->lastname_eng}}</p>
            <br>
            <br>

            <p>
                สถานะ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :
            </p>
            <p>
                {{$bios->statuss->status}}
            </p>
            <br>
            <br>

            <p>
                หลักสูตร &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :
            </p>
            <p>
                {{$bios->students->majors->major_name}}
            </p>
            <br>
            <br>

            <p>
                ภาคการศึกษาที่เข้า &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :
            </p>
            <p>
                {{$bios->students->generations->semester}}
            </p>
            <br>
            <br>

            <p>
                ปีการศึกษาที่เข้า &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :
            </p>
            <p>
                {{$bios->students->generations->year}}
            </p>

            <br><br>
            <br><br>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="btn-group">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">{{$s}}/{{$y}}<span class="caret"></span></button>
                            <ul class="dropdown-menu scrollable-menu" role="menu"style="overflow: scroll;height: 200px;overflow-x: unset">
                                @foreach($gen as $show)
                                <li> <a class="dropdown-item" href="/profileDuringE/{{$bios->student_id}}/{{$show->semester}}/{{$show->year}}">{{$show->semester}}|{{$show->year}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <br><br>


            <p>
                <B>การเข้าเรียน</B>
                <h5 align='center'>ปีการศึกษา {{$s.'/'.$y}}</h5>
            </p>

            <hr class="my-4"><br><br>

        <center>

            <div class="container">
                <table class="table table-bordered" style="box-shadow: 5px 5px 8px 4px rgba(50, 50, 50, .5);">
                    <thead>
                            <tr class="table-success">
                            <th style="width: 13%"><center>รหัสวิชา</center></th>
                            <th>รหัสนักศึกษา</th>
                            <th style="width: 30%"><center>ชื่อ-สกุล</center></th>
                            <th>จำนวนคาบเรียน</th>
                            <th>จำนวนการเข้าเรียน</th>
                            <th>จำนวนการขาดเรียน</th>
                            <th style="width: 13%"><center>รายละเอียด</center></th>
                        </tr>
                    </thead>
                    @foreach($attendances as $student)
                    <tbody>
                        <tr>
                            <td style="background-color: white"><center>{{$student->course_id}}</center></td>
                            <td style="background-color: white">{{$student->student_id}}</td>
                            <td style="background-color: white">{{$student->users['name']}}&nbsp;&nbsp;{{$student->users['lastname']}}</td>
                            <td style="background-color: white"><center>{{$student->period_total}}</center></td>
                            <td style="background-color: white"><center>{{$student->amount_attendance}}</center></td>
                            <td style="background-color: white"><center>{{$student->amount_absence}}</center></td>
                            <td style="background-color: white">
                              <!-- Button trigger modal -->
                              <center><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{$student->student_id}}">
                                รายละเอียด
                            </button></center>
                          </td>
                        </tr>
                    </tbody>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal{{$student->student_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">รายละเอียดการเข้าเรียนของ:&nbsp;{{$student->student_id}}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                    <div>
                                        <b>คาบ 1:</b>
                                        @if($student->period_1 == 1)
                                            attend
                                        @else
                                            absence
                                        @endif
                                    </div>
                                    <div>
                                        <b>คาบ 2:</b>
                                        @if($student->period_2 == 1)
                                            attend
                                        @else
                                            absence
                                        @endif
                                    </div>
                                    <div>
                                        <b>คาบ 3:</b>
                                        @if($student->period_3 == 1)
                                            attend
                                        @else
                                            absence
                                        @endif
                                    </div>
                                    <div>
                                        <b>คาบ 4:</b>
                                        @if($student->period_4 == 1)
                                            attend
                                        @else
                                            absence
                                        @endif
                                    </div>
                                    <div>
                                        <b>คาบ 5:</b>
                                        @if($student->period_5 == 1)
                                            attend
                                        @else
                                            absence
                                        @endif
                                    </div>
                                    <div>
                                        <b>คาบ 6:</b>
                                        @if($student->period_6 == 1)
                                            attend
                                        @else
                                            absence
                                        @endif
                                    </div>
                                    <div>
                                        <b>คาบ 7:</b>
                                        @if($student->period_7 == 1)
                                            attend
                                        @else
                                            absence
                                        @endif
                                    </div>
                                    <div>
                                        <b>คาบ 8:</b>
                                        @if($student->period_8 == 1)
                                            attend
                                        @else
                                            absence
                                        @endif
                                    </div>
                                    <div>
                                        <b>คาบ 9:</b>
                                        @if($student->period_9 == 1)
                                            attend
                                        @else
                                            absence
                                        @endif
                                    </div>
                                    <div>
                                        <b>คาบ 10:</b>
                                        @if($student->period_10 == 1)
                                            attend
                                        @else
                                            absence
                                        @endif
                                    </div>
                                    <div>
                                        <b>คาบ 11:</b>
                                        @if($student->period_11 == 1)
                                            attend
                                        @else
                                            absence
                                        @endif
                                    </div>
                                    <div>
                                        <b>คาบ 12:</b>
                                        @if($student->period_12 == 1)
                                            attend
                                        @else
                                            absence
                                        @endif
                                    </div>
                                    <div>
                                        <b>คาบ 13:</b>
                                        @if($student->period_13 == 1)
                                            attend
                                        @else
                                            absence
                                        @endif
                                    </div>
                                    <div>
                                        <b>คาบ 14:</b>
                                        @if($student->period_14 == 1)
                                            attend
                                        @else
                                            absence
                                        @endif
                                    </div>
                                    <div>
                                        <b>คาบ 15:</b>
                                        @if($student->period_15 == 1)
                                            attend
                                        @else
                                            absence
                                        @endif
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
            </div>

        </center>

        <br><br>

        <p>
            <B>ผลการเรียน</B>
            <h5 align='center'>ปีการศึกษา {{$s.'/'.$y}}</h5>
        </p>

        <hr class="my-4"><br><br>

        <center>
           <table class="table table-hover" style="box-shadow: 5px 5px 8px 4px rgba(50, 50, 50, .5);">
                        <thead>
                                <tr class="table-warning">
                      <th style="width: 13%"><center>รหัสวิชา</center></th>
                      <th>รหัสนักศึกษา</th>
                      <th style="width: 35%"><center>ชื่อ-สกุล</center></th>
                      <th>คะแนนมิดเทอมที่ได้</th>
                      <th>คะแนนไฟนอลที่ได้</th>
                      <th style="width: 10%">คะแนนรวมทั้งหมด</th>
                      <th>รายละเอียดเพิ่มเติม</th>
                    </tr>
                </thead>

                @foreach($grades as $show_student)
                <tbody>
                    <tr>
                        <td style="background-color: white"><center>{{$show_student->course_id}}</center></td>
                        <td style="background-color: white"><center>{{$show_student->student_id}}</center></td>
                        <td style="background-color: white">{{$show_student->users['name']}}&nbsp;&nbsp;{{$show_student->users['lastname']}}</td>
                        <td style="background-color: white"><center>{{$show_student->total_midterm}}</center></td>
                        <td style="background-color: white"><center>{{$show_student->total_final}}</center></td>
                        <td style="background-color: white"><center>{{$show_student->total_all}}</center></td>
                        <td style="background-color: white">
                        <!-- Button trigger modal -->
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal2{{$show_student->student_id}}">
                          รายละเอียด
                      </button>
                    </td>
                  </tr>
                </tbody>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal2{{$show_student->student_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
</div></div></div>
        <br>
        <br>

        <script src="http://www.sitepoint.com/responsive-data-tables-comprehensive-list-solutions"></script>


<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </body>
    </body>
</html>

@endsection
@extends('bar.header(edu)')


