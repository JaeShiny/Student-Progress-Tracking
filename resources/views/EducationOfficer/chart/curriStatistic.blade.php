@extends('bar.body')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <link href="{{ asset('css/course.css') }}" rel="stylesheet" type="text/css"> --}}
    <link href="{{ asset('css/csste.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>หลักสูตรการศึกษา</title>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <li class="breadcrumb-item"><a href="">สถิติ</a></li>
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
                            <h4>สถิติ</h4></div>
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
            <div class="col-sm-4">

                <div class="card" style="width: 18rem; box-shadow: 5px 5px 8px 4px rgba(50, 50, 50, .5); ">
                    <div class="card-header" style="background-color:#F75D59;color: white">
                        <b>สถิติ</b>
                        <a href="/chartAttendanceE/{{$curriculum->curriculum_id}}" style="text-decoration-line: none">
                            <img src="../img/noti.png" style="width: 7%;float: right">
                        </a>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><b>รหัสหลักสูตร :</b>
                            <a href="/chartAttendanceE/{{$curriculum->curriculum_id}}" style="text-decoration-line: none">
                                <p>{{$curriculum->curriculum_id}}</p>
                            </a>
                        </li>
                        <li class="list-group-item"><b>ชื่อหลักสูตร :</b>
                            <a href="/chartAttendanceE/{{$curriculum->curriculum_id}}" style="text-decoration-line: none">
                                <p>{{$curriculum->curriculum_name}}</p><br>
                                <p>({{$curriculum->curri_name_eng}})</p>
                            </a>
                        </li>
                        <li class="list-group-item"><b>ตัวย่อ :</b>
                            <a href="/chartAttendanceE/{{$curriculum->curriculum_id}}" style="text-decoration-line: none">
                                <p>{{$curriculum->curr_abbre}}</p>
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
        </div>

    </div>

</body>
</html>
@endsection

@extends('bar.header(edu)')
