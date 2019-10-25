@extends('bar.body')
@section('content')

<!DOCTYPE html>
<html>

<head>
    <title>วิชาที่สอน</title>
    <link rel="stylesheet" href="csste.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-grid.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-reboot.css">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

            <li class="breadcrumb-item" aria-current="page"><a href="">วิชาที่สอน</a></li>

        </ol>

    </nav>
</head>

<body>
<br><br>
    <center>
        <div class="container">
            <div class="row">

                    @foreach ($course as $courses)

                <div class="col-4">
                    <div class="card" style="width: 18rem;">
                        <img src="../img/subject.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <a href="/allNotiLF/{{$courses->course_id}}" style="float:right">
                                <img src="../img/noti.png" width="25" title="การแจ้งเตือน">
                            </a> <br>
                            <center>
                            <a href="/subjectLF/{{$courses->course_id}}">
                                <h5 class="card-title">{{$courses->course_id}}</h5>
                            </a>
                            <p class="card-text">
                                {{$courses->course_name_eng}}
                            </p>
                            <br><br>
                            <a href="/subjectLF/{{$courses->course_id}}" class="btn btn-primary">รายละเอียด</a>
                            <a href="/importExportViewLF/{{$courses->course_id}}" class="btn btn-primary">เพิ่มไฟล์</a> <br><br>
                            <a href="/attendanceLF/{{$courses->course_id}}" class="btn btn-primary">การเข้าเรียน</a>&nbsp;
                            <a href="/showGradeLF/{{$courses->course_id}}" class="btn btn-primary">ผลการเรียน</a>
                            </center>
                        </div>
                    </div>

                    <div class="container">
                            <div class="row">
                              <div class="col">
    <br><br>
                              </div>
                              <div class="col order-12">
    <br><br>
                              </div>
                              <div class="col order-1">
    <br><br>
                              </div>
                            </div>
                          </div>
                </div>

                @endforeach

            </div>
        </div>
        <center>
        <br>
        <br>

        <center>{{$course->links()}}</center>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>

@endsection
@extends('bar.header(LF)')

