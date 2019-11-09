@extends('bar.body')
@section('content')
<!DOCTYPE html>
<html>

<head>
    <title>ข้อมูลหลังจบการศึกษา</title>
    {{-- <link href="{{ asset('css/csste.css') }}" rel="stylesheet" type="text/css"> --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li> </li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            {{-- <li class="breadcrumb-item" aria-current="page"><a href="{{ url('course') }}">วิชาที่สอน</a></li> --}}
            <li class="breadcrumb-item" aria-current="page">รายชื่อนักศึกษา</li>
            <li class="breadcrumb-item active" aria-current="page"><a href="/student_profileL/{{$student}}">ประวัตินักศึกษา</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="">ข้อมูลหลังจบการศึกษา</a></li>
        </ol>
    </nav>
</head>

<body>
        <div style="float: right;">
                {{-- <a href="{{ url('profilebefore')"> --}}
                {{-- <a href="{{route('profile',$bio['student_id'])}}"> --}}
                {{-- <a href="{{ action('student\InterviewControllerr@profile') }}"> --}}
                {{-- <a href="{{route('profile(before)',$bio['first_name']==$b_profile['firstname'])}}"> --}}
                {{-- <a href="{{url('profilebefore')}}"> --}}
                <a href="/profilebeforeL/{{$bios->student_id}}">
                    <button type="button" class="btn btn-outline-success">ข้อมูลการศึกษา</button>
                </a>
            <a href="/profileDuringL/{{$bios->student_id}}">
                    <button type="button" class="btn btn-outline-secondary">ข้อมูลระหว่างการศึกษา</button>
                </a>
                <a href="/profileafterL/{{$bios->student_id}}">
                    <button type="button" class="btn btn-primary">ข้อมูลหลังจบการศึกษา</button>
                </a>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
            </div>
            <br>

    <div class="jumbotron" style="box-shadow: 5px 5px 8px 4px rgba(50, 50, 50, .5);">
        <h4 class="display-4"></h4>
        <B><u>ข้อมูลหลังจบการศึกษา</u></B><br><br>
        <hr>
        <div class="container7">
<br><br><br><br><br><br>
                <img src="../image/{{$bios->picture}}" width="110" height="140">
        </div>
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
    </div>

</body>


</html>

@endsection
@extends('bar.header(lec)')
{{-- @extends('bar.username') --}}
