@extends('bar.body')
@section('content')

<!DOCTYPE html>
<html>

<head>
    <title>ข้อมูลระหว่างเรียน</title>
    <link rel="stylesheet" href="csste.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li> </li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <li class="breadcrumb-item"><a href="{{ url('curriculum') }}">หลักสูตร(IT)</a></li>
            <li class="breadcrumb-item"><a href="{{ url('selectyear') }}">ชั้นปี</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="{{ action('student\BioController@index') }}">รายชื่อนักศึกษา</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="">ประวัตินักศึกษา</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="">ข้อมูลระหว่างเรียน</a></li>
        </ol>
    </nav>

</head>

<body>
    <br>
    <br>
    <div class="container">
        <!-- Stack the columns on mobile by making one full-width and the other half-width -->
        <div class="row">
            <div class="col-12 col-md-8">
                <a href="">
                    <button type="button" class="btn btn-info" style="background-color: #9933CC">ความคิดเห็นของอาจารย์</button>
                </a>
            </div>

        </div>
        <br>
        <br>
        <!-- Columns start at 50% wide on mobile and bump up to 33.3% wide on desktop -->
        <div class="row">
            <div class="col-6 col-md-4">
                <a href="">
                    <button type="button" class="btn btn-info" style="background-color: #003366">การเข้าเรียน</button>
                </a>
            </div>

        </div>
        <br>
        <br>
        <!-- Columns are always 50% wide, on mobile and desktop -->
        <div class="row">
            <div class="col-6">
                <a href="">
                    <button type="button" class="btn btn-info" style="background-color: #990000">ผลการเรียน</button>
                </a>
            </div>

        </div>
    </div>

    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <div class="foot4">
        <center>
            <p class="p2"><a href="ประวัตินักศึกษา.html"> ย้อนกลับ</a></p>
        </center>
    </div>

</body>

</body>

</html>

@endsection
@extends('bar.header(edu)')
@extends('bar.username')
