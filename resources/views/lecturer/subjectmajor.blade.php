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

            <li class="breadcrumb-item active" aria-current="page">วิชาที่สอน</li>

        </ol>

    </nav>
</head>

<body>

    <form class="form-inline" style="float:right;">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
    </form>

    <br>
    <br>
    <br>
    <br>

    {{-- @foreach ($schedule as $schedule) --}}
    {{-- <div class="container">
        <div class="row">
            <div class="col-sm">
                <div class="card" style="width: 18rem;">
                    <img src="../img/subject.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <center>
                        <a href="/subject/{{$course->course_id}}">
                        <a>
                            <h5 class="card-title">{{$schedule->course->course_id}}</h5>
                        </a>
                        <p class="card-text">
                            {{$schedule->course->course_name_eng}}
                        </p>

                        <br>
                        </center>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <br>
    <br> --}}
    {{-- @endforeach --}}

    <div class="container">
        <div class="row">
            <div class="col-sm">
                <div class="card" style="width: 18rem;">
                    <img src="../img/subject.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <center>
                        {{-- <a href="/subject/{{$course->course_id}}"> --}}
                        <a>
                            <h5 class="card-title">{{$schedule->course_id}}</h5>
                        </a>
                        <p class="card-text">
                            {{-- {{$schedule->course->course_name_eng}} --}}
                        </p>

                        <br>
                        </center>
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




    {{-- <span>{{$course->links()}}</span> --}}

     <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>

@endsection
@extends('bar.header(lec)')
{{-- @extends('bar.username') --}}
