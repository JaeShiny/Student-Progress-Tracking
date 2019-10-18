@extends('bar.body')
@section('content')

<!DOCTYPE html>
<html>
<head>
    <title>ฟอร์มการเข้าเรียน</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li> </li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            {{-- <li class="breadcrumb-item"><a href="{{ url('curriculum') }}">หลักสูตร(IT)</a></li> --}}
            <li class="breadcrumb-item"><a href="{{ url('FormAttendance') }}">ดาวน์โหลดแบบฟอร์ม</a></li>
            <li class="breadcrumb-item"><a href="{{ url('FormAttendance') }}">แบบฟอร์มการเข้าเรียน</a></li>
        </ol>
    </nav>

</head>
<body>

<ul class="nav nav-tabs" id="myTab" role="tablist" style="background-color:white;">
    <li class="nav-item">
        <a class="nav-link active" href="{{ url('FormAttendance') }}" style="color: #000000;">แบบฟอร์มการเข้าเรียน</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ url('FormGrade') }}" style="color: #000000;">แบบฟอร์มเพิ่มผลการเรียน</a>
    </li>
</ul><br>

<div class="container">
    <div class="card bg-light mt-3">
        <div class="card-header">
            แบบฟอร์มการเข้าเรียน
        </div>
        <div class="card-body">
            <form action="" method="POST" enctype="multipart/form-data">
                @csrf
                &nbsp;&nbsp;&nbsp;
                <a class="btn btn-warning" href="{{ route('exportAttendance') }}">ดาวน์โหลดแบบฟอร์มการกรอกการเข้าเรียน</a>
            </form><br>
            <center><img src="../img/attendance.png" width="1000" height="350" title="คู่มือการ import การเข้าเรียน"></center>
        </div>
        <div class="card-body">
            <form action="" method="POST" enctype="multipart/form-data">
                @csrf
                &nbsp;&nbsp;&nbsp;
                <a class="btn btn-success" href="{{ route('exportAttendance') }}">ดาวน์โหลดแบบฟอร์มการกรอกการเข้าเรียน (สำหรับวิชาที่มีคาบแลป)</a>
            </form><br>
            <center><img src="../img/attendance2.png" width="1000" height="350" title="คู่มือการ import การเข้าเรียน"></center>
        </div>
    </div>
</div><br>

</body>
</html>


@endsection
@extends('bar.header(lec)')
