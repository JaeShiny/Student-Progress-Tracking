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

<div class="container">
    <div class="card bg-light mt-3">
        <div class="card-header">
            แบบฟอร์มการเข้าเรียน
        </div>
        <div class="card-body">
            <form action="" method="POST" enctype="multipart/form-data">
                @csrf
                <a class="btn btn-warning" href="{{ route('exportAttendance') }}">Export ฟอร์มการเข้าเรียน</a>
            </form>
        </div>
    </div>
</div>

</body>
</html>


@endsection
@extends('bar.header(lec)')