@extends('bar.body')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
   <!-- Required meta tags -->
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">

   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>การแจ้งเตือน</title>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li> </li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            {{-- <li class="breadcrumb-item"><a href="{{ url('course') }}">วิชาที่สอน</a></li> --}}
            <li class="breadcrumb-item active" aria-current="page"><a href="">การแจ้งเตือน</a></li>
        </ol>
    </nav>

</head>

<body>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-sm-4">

            </div>
            <div class="col-sm-5">

                <div class="card bg-light mb-3" style="max-width: 20rem; box-shadow: 5px 5px 8px 4px rgba(50, 50, 50, .5);" "> {{--box-shadow: 5px 5px 8px 4px rgba(50, 50, 50, .5);">--}}
                    <center>
                        <div class="card-header">
                            <h4>การแจ้งเตือน</h4></div>
                    </center>

                </div>

            </div>
            <div class="col-sm">

            </div>
        </div>
    </div>

    <br>

    <div class="container">
        <div class="row">
            @foreach ($course as $courses)

            <div class="col-sm">

                <div class="card" style="width: 18rem; box-shadow: 5px 5px 8px 4px rgba(50, 50, 50, .5); ">
                    <div class="card-header" style="background-color:#F75D59;color: white">
                        <b>การแจ้งเตือน</b>
                        <a href="/showNotiL/{{$courses->course_id}}" style="text-decoration-line: none">
                            <img src="../img/noti.png" style="width: 7%;float: right">
                        </a>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><b>รหัสวิชา :</b>
                            <a href="/showNotiL/{{$courses->course_id}}" style="text-decoration-line: none">
                                <p>{{$courses->course_id}}</p>
                            </a>
                        </li>
                        <li class="list-group-item"><b>ชื่อวิชา :</b>
                            <a href="/showNotiL/{{$courses->course_id}}" style="text-decoration-line: none">
                                <p>{{$courses->course_name_eng}}</p>
                            </a>
                        </li>

                    </ul>

                </div>
                <div class="container">
                    <div class="row">

                        <div class="col-sm">
                            <br>
                            <br>
                        </div>
                        <div class="col-sm">
                            <br>
                            <br>
                        </div>
                        <div class="col-sm">
                            <br>
                            <br>
                        </div>
                    </div>
                </div>
            </div>

            @endforeach
        </div>

    </div>

    <center>{{$course->links()}}</center>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>

@endsection
@extends('bar.header(lec)')
