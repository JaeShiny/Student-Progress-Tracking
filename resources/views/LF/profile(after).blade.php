@extends('bar.body')
@section('content')
<!DOCTYPE html>
<html>

<head>
    <title>ข้อมูลหลังจบการศึกษา</title>
    <link href="{{ asset('css/csste.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li> </li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            {{-- <li class="breadcrumb-item" aria-current="page"><a href="{{ url('courseLF') }}">วิชาที่สอน</a></li> --}}
            <li class="breadcrumb-item" aria-current="page">รายชื่อนักศึกษา</li>
            <li class="breadcrumb-item active" aria-current="page"><a href="/student_profileLF/{{$student}}">ประวัตินักศึกษา</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="">ข้อมูลหลังจบการศึกษา</a></li>
        </ol>
    </nav>
</head>

<body>

    <div class="jumbotron">
        <h4 class="display-4"></h4>
    {{-- @foreach($alumni_profile as $alumni) --}}
        <p>ชื่อ-นามสกุล &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </p>
        <p>{{$alumni_profile->first_name}}&nbsp;&nbsp;{{$alumni_profile->last_name}}</p>
        <br>
        <br>
        <p>รหัสนักศึกษา &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : </p>
        <p>{{$alumni_profile->student_id}}</p>
        <br>
        <br>
        <p>หลักสูตรที่จบการศึกษา &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  : </p>
        <p>{{$bios->students->curriculum->curriculum_name}}</p>
        <br>
        <br>
        <p>เกรดเฉลี่ยที่จบ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : </p>
        <p>{{$bios->students->gpa}}</p>
        <br>
        <br>
        <p>ปีการศึกษาที่จบ&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </p>
        <p>{{$bios->students->grad_year}}</p>

        <div class="container7">
                <img src="../image/{{$bios->picture}}" width="110" height="140">
        </div>

        <hr class="my-4">
        <p>
            <B>ประวัติการทำงาน</B>
        </p>
        <br>
        <br>
        <p>สถานที่ทำงาน &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </p>
        <p>{{$alumni_profile->company}}</p>
        <br>
        <br>
        <p>ตำแหน่งที่ทำงานอยู่ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : </p>
        <p>{{$alumni_profile->position}}</p>
        <br>
        <br>
        <p>ลักษณะงาน &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </p>
        <p>{{$alumni_profile->job_title}}</p>
        <br>
        <br>
        <p>ช่วงเงินเดือนที่ไดรับ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </p>
        <p>{{$alumni_profile->salary_range}}</p>
        <br>
        <br>
    {{-- @endforeach --}}
        {{-- <hr class="my-4">
        <p>
            <B>ความคิดเห็น</B>
        </p>
        <br>
        <br>
        <TEXTAREA rows="3" cols="60">
        </TEXTAREA>
        <br>
        <br> --}}
        {{-- <a href="ประวัตินักศึกษา.html" style="float: right; "> ย้อนกลับ</a> --}}
    </div>

    </div>
    </div>

</body>

</html>

@endsection
@extends('bar.header(LF)')
{{-- @extends('bar.username') --}}
