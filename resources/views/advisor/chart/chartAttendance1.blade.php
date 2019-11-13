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
        <li class="breadcrumb-item active" aria-current="page"><a href="">สถิติ</a></li>
        {{-- <li class="breadcrumb-item active" aria-current="page"><a href="">วิชา: {{$course->course_id}}</a></li> --}}
        <li class="breadcrumb-item active" aria-current="page"><a href="">&nbsp;ภาคเรียนที่: {{$se}}/{{$ye}}</a></li>
    </ol>
</nav>



<ul class="nav nav-tabs" id="myTab" role="tablist" style="background-color:white;">
    <li class="nav-item">
        <a class="nav-link active" href="/advisor/chartAttendanceA/{{$gen->semester}}/{{$gen->year}}" style="color: #000000;">สถิติการเข้าเรียน</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/advisor/chartGradeA/{{$gen->semester}}/{{$gen->year}}" style="color: #000000;">สถิติผลการเรียน</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/advisor/chartProblemA/{{$gen->semester}}/{{$gen->year}}" style="color: #000000;">สถิติด้านพฤติกรรม</a>
    </li>
</ul><br>


{{-- <h5 align='center'>{{$course->course_id}}</h5>
<h6 align='center'>{{$course->course_name_eng}}</h6>
<br> --}}

{{-- การเข้าเรียน --}}
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                       Attendance Chart
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
                    <th scope="col">จำนวนครั้งที่ขาด</th>
                    <th scope="col">จำนวนนักศึกษาที่ขาดเรียน</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1-10</th>
                    <td>{{$attendance1}}</td>
                </tr>
                <tr>
                    <th scope="row">11-20</th>
                    <td>{{$attendance2}}</td>
                </tr>
                <tr>
                    <th scope="row">21-30</th>
                    <td>{{$attendance3}}</td>
                </tr>
                <tr>
                    <th scope="row">31-40</th>
                    <td>{{$attendance4}}</td>
                </tr>
                <tr>
                    <th scope="row">41-50</th>
                    <td>{{$attendance5}}</td>
                </tr>
                <tr>
                    <th scope="row">51-60</th>
                    <td>{{$attendance6}}</td>
                </tr>
                <tr>
                    <th scope="row">61-70</th>
                    <td>{{$attendance7}}</td>
                </tr>

            </tbody>
            </table>
            </center><br><br>




@endsection


</body>

</html>

@endsection
@extends('bar.header(advi)')

