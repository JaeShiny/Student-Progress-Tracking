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
    {{-- <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> --}}

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            {{-- <li class="breadcrumb-item" aria-current="page"><a href="{{ url('course') }}">วิชาที่สอน</a></li> --}}
            {{-- <li class="breadcrumb-item" aria-current="page"><a href="/importExportView/{{$course->course_id}}">เพิ่มการเข้าเรียน(ทฤษฎี)</a></li> --}}
            <li class="breadcrumb-item" aria-current="page"><a href="/importExportView2/{{$course->course_id}}">เพิ่มการเข้าเรียน (Lab)</a></li>
        </ol>
    </nav>

    <style>
        .row{
            margin-right: 0px;
        }
    </style>

</head>

<body>

<ul class="nav nav-tabs" id="myTab" role="tablist" style="background-color:white;">
    <li class="nav-item">
        <a class="nav-link" href="/importExportView/{{$course->course_id}}" style="color: #000000;">การเข้าเรียน (ทฤษฎี)</a>
    </li>
    <li class="nav-item">
        <a class="nav-link active" href="/importExportView2/{{$course->course_id}}" style="color: #000000;">การเข้าเรียน (Lab)</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/importExportGrade/{{$course->course_id}}" style="color: #000000;">ผลการเรียน</a>
    </li>
</ul><br>

<div class="row">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <div class="col">
        <div class="list-group" id="list-tab" role="tablist">

            <a class="list-group-item list-group-item-action" href="/importExportView/{{$course->course_id}}"><b>เพิ่มการเข้าเรียน (ทฤษฎี)</b></a>
            <a class="list-group-item list-group-item-action active" href="/importExportView2/{{$course->course_id}}"><b>เพิ่มการเข้าเรียน (Lab)</b></a>
            {{-- <a class="list-group-item list-group-item-action" href="/attendance/{{$course->course_id}}"><b>แสดงการเข้าเรียน</b></a> --}}
            {{-- <a class="list-group-item list-group-item-action" href="/subject/{{$course->course_id}}"><b>รายชื่อนักศึกษา</b></a> --}}

        </div>
    </div>

<div class="container px-lg-5">
    <div class="row mx-lg-n5">
        <div class="col-11">
            <div class="col py-3 px-lg-5 border bg-light">
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                        <h4 class="w3-bar-item">{{$course->course_id}}&nbsp;{{$course->course_name_eng}}</h4>
     <div class="container">
        <div class="card bg-light mt-3">
            <div class="card-header">
                เพิ่มการเข้าเรียน (Lab)
            </div>
            <div class="card-body">
                <form action="/import2/{{$course->course_id}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="course_id" value="{{$course->course_id}}">
                    <input type="file" name="file" class="form-control">
                    <br> {{--
                    <button class="btn btn-success">เพิ่มการเข้าเรียน</button>
                    <a class="btn btn-warning" href="{{ route('export') }}">Export การเข้าเรียน</a> --}}

                    <div class="container">
                        <div class="form-group">
                                {{-- <div class="form-group">
                                        <label for="exampleFormControlSelect1">เทอม:
                                            <select class="form-control" id="exampleFormControlSelect1" name="semester">
                                              <option>1</option>
                                              <option>2</option>
                                            </select>
                                        </label>&nbsp;&nbsp;
                                        <label for="exampleFormControlSelect1">ปีการศึกษา:
                                            <select class="form-control" id="exampleFormControlSelect1" name="year">
                                                <option>2018</option>
                                                <option>2019</option>
                                                <option>2020</option>
                                                <option>2021</option>
                                                <option>2022</option>
                                                <option>2023</option>
                                                <option>2024</option>
                                                <option>2025</option>
                                            </select>
                                        </label>
                                </div> --}}
                            <input type="submit" value="เพิ่มการเข้าเรียน" class="btn btn-success" data-toggle="modal" data-target="#myModal">
                            <a class="btn btn-warning" href="/export2/{{$course->course_id}}">Export การเข้าเรียน</a>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="myModal" role="dialog">
                            <div class="modal-dialog">
                                  <br><br><br><br><br>
                              <!-- Modal content-->
                              <div class="modal-content" style="background-color: white;" >

                                <div>
                                      <br><br>
                                      <center><img src="{{ URL::asset("../img/success.jpg") }}" width="100" height="100"></center>
                                      <br>
                                  <center><h5>เพิ่มการเข้าเรียน(LAB)สำเร็จ</center></h5>
                                  <br><br>
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
<br><br><br><br>

</div>

</body>

</html>

@endsection
@extends('bar.header(lec)')
