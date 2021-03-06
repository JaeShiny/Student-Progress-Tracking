@extends('bar.body')
@section('content')

<!DOCTYPE html>
<html>
<head>
    <title>เพิ่มการเข้าเรียน</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li> </li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            {{-- <li class="breadcrumb-item"><a href="{{ url('curriculum') }}">หลักสูตร(IT)</a></li> --}}
            {{-- <li class="breadcrumb-item"><a href="{{ url('course') }}">วิชาที่สอน</a></li> --}}
            <li class="breadcrumb-item active" aria-current="page"><a href="">รายชื่อนักศึกษา</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="/importExportView/{{$course->course_id}}">เพิ่มการเข้าเรียน</a></li>
        </ol>
    </nav>

</head>
<body>

<div class="container">
    <div class="card bg-light mt-3">
        <div class="card-header">
            เพิ่มการเข้าเรียน
        </div>
        <div class="card-body">
        <form action="/import/{{$course->course_id}}" method="POST" enctype="multipart/form-data">
                @csrf
            <input type="hidden" name="course_id" value="{{$course->course_id}}">
                <input type="file" name="file" class="form-control">
                <br>
                <button class="btn btn-success">เพิ่มการเข้าเรียน</button>
                <a class="btn btn-warning" href="{{ route('export') }}">Export การเข้าเรียน</a>
            </form>
        </div>
    </div>
</div>

</body>
</html>


@endsection
@extends('bar.header(lec)')
