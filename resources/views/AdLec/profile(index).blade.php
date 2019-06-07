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
            <li class="breadcrumb-item active" aria-current="page"><a href="">ประวัตินักศึกษา</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="">ข้อมูลระหว่างเรียน</a></li>
        </ol>
    </nav>

</head>

<body>
        <br>
        <br>
        <br>

        <div class="container">
            <div class="row">
                <div class="col-sm">
                    <div class="card" style="width: 20rem;">

                        <div class="card-body" style="background-image: url(../img/paper.jpg);">
                            <h5 class="card-title">พฤติกรรม/ปัญหาของนักศึกษา
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            </h5>

                            <a href="#" class="btn btn-primary">รายละเอียด</a>
                            <br>
                        </div>
                    </div>
                </div>

                <div class="col-sm">
                    <div class="card" style="width: 20rem;">

                        <div class="card-body" style="background-image: url(../img/paper.jpg);">
                            <h5 class="card-title">การเข้าเรียน
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            </h5>

                            <a href="#" class="btn btn-primary">รายละเอียด</a>
                            <br>
                        </div>
                    </div>
                </div>

                <div class="col-sm-0">
                    <div class="card" style="width: 20rem;">

                        <div class="card-body" style="background-image: url(../img/paper.jpg);">
                            <h5 class="card-title">ผลการเรียน
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            </h5>

                            <a href="#" class="btn btn-primary">รายละเอียด</a>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>

        {{-- <center>
            <a href="ประวัตินักศึกษา.html"> ย้อนกลับ</a>
        </center> --}}

</body>

</html>

@endsection
@extends('bar.header(AdLec)')
{{-- @extends('bar.username') --}}
