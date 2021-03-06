@extends('bar.body')
@section('content')
<!DOCTYPE html>
<html>

<head>
    <link rel="icon" type="img/png" href="../img/libray.png" />
    <title>ข้อมูลการสัมภาษณ์</title>
    {{-- <link href="{{ asset('css/csste.css') }}" rel="stylesheet" type="text/css"> --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li> </li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                {{-- <li class="breadcrumb-item"><a href="{{ url('curriculum') }}">หลักสูตร(IT)</a></li>
                <li class="breadcrumb-item"><a href="{{ url('selectyear') }}">ชั้นปี</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="{{ action('student\BioController@index') }}">รายชื่อนักศึกษา</a></li> --}}
                <li class="breadcrumb-item" aria-current="page"><a href="/studentprofile">ประวัตินักศึกษา</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="">ข้อมูลการศึกษา</a></li>
            </ol>
    </nav>
</head>

<body>
        <br>
        <div style="float: right;">
            <a href="/profilebeforeS/{{$bios->student_id}}">
                <button type="button" class="btn btn-success">ข้อมูลการศึกษา</button>
            </a>
            <a href="/profileDuringS/{{$bios->student_id}}">
                <button type="button" class="btn btn-outline-secondary">ข้อมูลระหว่างการศึกษา</button>
            </a>
            <a href="/profileafterS/{{$bios->student_id}}">
                <button type="button" class="btn btn-outline-primary">ข้อมูลหลังจบการศึกษา</button>
            </a>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
        </div>
        <br>

        <div class="jumbotron"style="box-shadow: 5px 5px 8px 4px rgba(50, 50, 50, .5);">
        <p>
                <B><u>ข้อมูลการศึกษา</u></B>
            </p>
        <br><br>
        <p>
            <B>ข้อมูลทั่วไป</B>
        </p>
        <hr>
        <div class="container7">
                <br><br><br><br><br><br>
                                <img src="../image/{{$bios->picture}}" width="110" height="140">

                        </div>
        {{-- @foreach($b_profile as $b_profile) --}}
        <p>ชื่อ-นามสกุล (ภาษาไทย) &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </p>
        <p>{{$b_profile->prename_th}}&nbsp;{{$b_profile->firstname_th}}&nbsp;&nbsp;{{$b_profile->lastname_th}}</p>
        <br>
        <br>
        <p>ชื่อ-นามสกุล (ภาษาอังกฤษ) &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </p>
        <p>{{$b_profile->prename_en}}&nbsp;{{$b_profile->firstname_en}}&nbsp;&nbsp;{{$b_profile->lastname_en}}</p>
        <br>
        <br>
        <p>เพศ
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </p>
        <p>{{$b_profile->sex}}</p>
        <br>
        <br>
        <p>วัน/เดือน/ปีเกิด
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </p>
        <p>{{$b_profile->ddbirth}}/{{$b_profile->mmbirth}}/{{$b_profile->yybirth}}</p>
        <br>
        <br>
        <p>หมายเลขบัตรประชาชน &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </p>
        <p>{{$b_profile->idcard}}</p>
        <br>
        <br>
        <p>หมู่เลือด
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </p>
        <p>{{$b_profile->bloodtype}}</p>
        <br>
        <br>
        <p>รอบที่สอบเข้า
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : </p>
        <p>{{$b_profile->remark}}</p>
        <br>
        <br>
        <p>อาจารย์ผู้สัมภาษณ์
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </p>
        <p>{{$b_profile->b_result->b_interviewer->itvname}}</p>



        <hr class="my-4">
        <br>
        <p>
            <B>ประวัติการศึกษา</B>
        </p>
        <br>
        <br>
        <p>ชื่อสถานศึกษา
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : </p>
        <p>{{$b_profile->schoolname}}</p>
        <br>
        <br>
        <p>สายการศึกษา
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : </p>
        <p>{{$b_profile->schoolcourse}}</p>
        <br>
        <br>
        <p>เกรดเฉลี่ยสะสม
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </p>
        <p>{{$b_profile->score_weight_gp}}</p>

    </div>
        {{-- <hr class="my-4">
        <p>
            <B>ผลการสัมภาษณ์</B>
        </p>
        <br>
        <br>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">รายละเอียดผลการสัมภาษณ์</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div> --}}

<div style="margin-top:-50px">
    <hr class="my-4">
    <br>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <p>
        <B>ผลการเรียน</B>
    </p>
    <br><br><br><br><br>
    <center>
            <table class="table table-striped"style="box-shadow: 5px 5px 8px 4px rgba(50, 50, 50, .5);">
            <thead>
                <tr>
                    <th scope="col">กลุ่มสาระวิชา</th>
                    <th scope="col">GPA รวม</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>วิชาคณิตศาสตร์</td>
                    <td>{{$b_profile->gpa_m}}</td>
                </tr>
                <tr>
                    <td>วิชาวิทยาศาสตร์</td>
                    <td>{{$b_profile->gpa_s}}</td>
                </tr>
                <tr>
                    <td>วิทยาภาษาอังกฤษ</td>
                    <td>{{$b_profile->gpa_e}}</td>
                </tr>
            </tbody>

        </table>
    </center>
    <br>
    <hr class="my-4">
    <br>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <p>
                        <B>ทักษะภาษาอังกฤษ</B>
                    </p>
                    <br><br><br><br><br>
                    <center>
                            <table class="table table-striped"style="box-shadow: 5px 5px 8px 4px rgba(50, 50, 50, .5);">
                            <thead>
                                <tr>
                                    <th scope="col">ทักษะภาษาอังกฤษ</th>
                                    <th scope="col">ระดับทักษะภาษาอังกฤษ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>ทักษะด้านการพูด</td>
                                    <td>{{$b_profile->b_englishskill->speaking}}</td>
                                </tr>
                                <tr>
                                    <td>ทักษะด้านการอ่าน</td>
                                    <td>{{$b_profile->b_englishskill->reading}}</td>
                                </tr>
                                <tr>
                                    <td>ทักษะด้านการฟัง</td>
                                    <td>{{$b_profile->b_englishskill->listening}}</td>
                                </tr>
                                <tr>
                                    <td>ทักษะด้านการเขียน</td>
                                    <td>{{$b_profile->b_englishskill->writing}}</td>
                                    </tr>
                            </tbody>

                        </table>
                    </center>
                    <br>
                    <hr class="my-4">
                    <br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <p>


        <B>ผลการสอบวัดระดับชาติ</B>
    </p>
    <br><br><br><br><br>
    <center>
            <table class="table table-striped"style="box-shadow: 5px 5px 8px 4px rgba(50, 50, 50, .5);">
            <thead>
                <tr>
                    <th scope="col">O-NET วิชาคณิตศาสตร์</th>
                    <th scope="col">O-NET วิชาวิทยาศาสตร์</th>
                    <th scope="col">O-NET วิชาภาษาอังกฤษ</th>
                    <th scope="col">GAT 1 </th>
                    <th scope="col">GAT 2</th>
                    <th scope="col">GAT 3</th>
                    <th scope="col">PAT 1 </th>
                    <th scope="col">PAT 2 </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{$b_profile->onet_m}}</td>
                    <td>{{$b_profile->onet_s}}</td>
                    <td>{{$b_profile->onet_e}}</td>
                    <td>{{$b_profile->gat1}}</td>
                    <td>{{$b_profile->gat2}}</td>
                    <td>{{$b_profile->gat3}}</td>
                    <td>{{$b_profile->pat1}}</td>
                    <td>{{$b_profile->pat2}}</td>
                </tr>
            </tbody>
        </table>
    </center>
    <br><br>

    {{-- @endforeach --}}

</div>
    </div>
    </div>
{{--
    <center>
        <a href="/profile/{{$student}}" > ย้อนกลับ</a>
    </center>
    <br> --}}



</body>

</html>

@endsection
@extends('bar.header(student)')
{{-- @extends('bar.username') --}}
