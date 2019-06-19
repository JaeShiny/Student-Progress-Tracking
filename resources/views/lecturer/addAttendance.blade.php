@extends('bar.body')
@section('content')

<!DOCTYPE html>
<html>

<head>
    <title>เพิ่มการเข้าเรียน</title>
    <link rel="stylesheet" href="csste.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-grid.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-reboot.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <li class="breadcrumb-item" aria-current="page"><a href="{{ url('course') }}">วิชาที่สอน</a></li>
            <li class="breadcrumb-item" aria-current="page"><a href="/importExportView/{{$course->course_id}}">เพิ่มการเข้าเรียน</a></li>
        </ol>

    </nav>
</head>

<body>

 <div class="w3-sidebar w3-light-grey w3-bar-block" style="width:25% ;margin-top: -1%">

    <h3 class="w3-bar-item"><center>{{$course->course_id}}</h3></center>

    <ul class="list-group">
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <a href="/importExportView/{{$course->course_id}}" style="text-decoration: none; color: #000000;"><h5> &nbsp;&nbsp; เพิ่มการเข้าเรียน</h5></a>

        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <a href="/attendance/{{$course->course_id}}" style="text-decoration: none; color: #000000;"><h5> &nbsp;&nbsp; ดูการเข้าเรียน</h5></a>

        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <a href="testshow3.html" style="text-decoration: none; color: #000000;"><h5>&nbsp;&nbsp;  เพิ่มผลการเรียน</h5></a>

        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <a href="testshow4.html" style="text-decoration: none; color: #000000;"><h5> &nbsp;&nbsp; ดูผลการเรียน</h5></a>

        </li>
    </ul>
    <br>
    <center>
        <button type="button" class="btn btn-primary"><a href="/subject/{{$course->course_id}}" style="color: #FFFFFF; text-decoration: none; ">รายชื่อนักศึกษา</a></button>
    </center>

</div>

<!-- Page Content -->
<div style="margin-left:25%;margin-top: -1%">

    <div class="w3-container w3-teal">
        {{--
        <h3 class="w3-bar-item"> SOFTWARE PROCESS</h3> --}}
        <h3>&nbsp;&nbsp;&nbsp;{{$course->course_id}}:&nbsp;{{$course->course_name_eng}}</h3>
        <br>
    </div>

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
                    <br> {{--
                    <button class="btn btn-success">เพิ่มการเข้าเรียน</button>
                    <a class="btn btn-warning" href="{{ route('export') }}">Export การเข้าเรียน</a> --}}

                    <div class="container">
                        <div class="form-group">
                            <input type="submit" value="เพิ่มการเข้าเรียน" class="btn btn-success" data-toggle="modal" data-target="#myModal">
                            <a class="btn btn-warning" href="{{ route('export') }}">Export การเข้าเรียน</a>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="myModal" role="dialog">
                            <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content" style="background-color: #F0F8FF;">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>

                                    </div>
                                    <div class="modal-body">
                                        <center>
                                            <h5>เพิ่มไฟล์การเข้าเรียนเรียบร้อยแล้ว</center></h5>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">ตกลง</button>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                    @csrf

                </form>

            </div>
        </div>
    </div>

</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>

@endsection
@extends('bar.header(lec)')
