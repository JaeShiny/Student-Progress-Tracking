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
                {{-- <li class="breadcrumb-item"><a href="{{ url('curriculum') }}">หลักสูตร(IT)</a></li> --}}
                {{-- <li class="breadcrumb-item"><a href="{{ url('selectyear') }}">ชั้นปี</a></li> --}}
                <li class="breadcrumb-item active" aria-current="page"><a href="">รายชื่อนักศึกษา</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="">ประวัตินักศึกษา</a></li>
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
        <p>สาขาที่จบการศึกษา &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : </p>
        <p>____________</p>
        <br>
        <br>
        <p>เกรดเฉลี่ยที่จบ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : </p>
        <p>____________</p>
        <br>
        <br>
        <p>ปีการศึกษาที่จบ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </p>
        <p>______________</p>

        {{-- <div class="container7">
            <img src="/Codeproject/รูปสัม.jpg" alt="Avatar" class="image" width="100">
        </div> --}}

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
        <a href="ประวัตินักศึกษา.html" style="float: right; "> ย้อนกลับ</a>
    </div>

    </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>

</html>

@endsection
@extends('bar.header(advi)')
@extends('bar.username')