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

    <title>สถิติ</title>

</head>

<body>

@section('content')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li> </li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <li class="breadcrumb-item active" aria-current="page"><a href="#">สถิติ: หลักสูตร {{$curriculum->curriculum_id}}</a></li>
        {{-- <li class="breadcrumb-item active" aria-current="page"><a href="">วิชา: {{$course->course_id}}</a></li> --}}
    </ol>
</nav>



<ul class="nav nav-tabs" id="myTab" role="tablist" style="background-color:white;">
    <li class="nav-item">
        <a class="nav-link" href="/chartAttendanceE/{{$curriculum->curriculum_id}}" style="color: #000000;">สถิติการเข้าเรียน</a>
    </li>
    <li class="nav-item">
        <a class="nav-link active" href="/chartGradeE/{{$curriculum->curriculum_id}}" style="color: #000000;">สถิติผลการเรียน</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/chartProblemE/{{$curriculum->curriculum_id}}" style="color: #000000;">สถิติด้านพฤติกรรม</a>
    </li>
</ul><br>

{{--
<h5 align='center'>{{$course->course_id}}</h5>
<h6 align='center'>{{$course->course_name_eng}}</h6>
<br> --}}

{{-- การเข้าเรียน --}}
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Chart Garde
                </div>

                <div class="panel-body">
                    {!! $chart->html() !!}
                </div>
            </div>
        </div>
    </div>
</div>
{!! Charts::scripts() !!}
{!! $chart->script() !!}

<br><br><br><br>
<center>
<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">เกรด</th>
            <th scope="col">จำนวนนักศึกษา</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th scope="row">เกรด A</th>
            <td>{{$gardeA}}</td>
        </tr>
        <tr>
            <th scope="row">เกรด B+</th>
            <td>{{$gardeBB}}</td>
        </tr>
        <tr>
            <th scope="row">เกรด B</th>
            <td>{{$gardeB}}</td>
        </tr>
        <tr>
            <th scope="row">เกรด C+</th>
            <td>{{$gardeCC}}</td>
        </tr>
        <tr>
            <th scope="row">เกรด C</th>
            <td>{{$gardeC}}</td>
        </tr>
        <tr>
            <th scope="row">เกรด D+</th>
            <td>{{$gardeDD}}</td>
        </tr>
        <tr>
            <th scope="row">เกรด D</th>
            <td>{{$gardeD}}</td>
        </tr>
        <tr>
            <th scope="row">เกรด F</th>
            <td>{{$gardeF}}</td>
        </tr>
    </tbody>
</table>
</center><br><br>



@endsection


</body>

</html>

@endsection
@extends('bar.header(edu)')

