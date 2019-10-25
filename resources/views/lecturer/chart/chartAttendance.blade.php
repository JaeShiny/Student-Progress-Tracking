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
        <li class="breadcrumb-item active" aria-current="page"><a href="{{ url('subjectStatisticL') }}">สถิติ</a></li>
        <li class="breadcrumb-item active" aria-current="page"><a href="">วิชา: {{$course->course_id}}</a></li>
    </ol>
</nav>



<ul class="nav nav-tabs" id="myTab" role="tablist" style="background-color:white;">
    <li class="nav-item">
        <a class="nav-link active" href="/chartAttendanceL/{{$course->course_id}}" style="color: #000000;">สถิติการเข้าเรียน</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/chartGradeL/{{$course->course_id}}" style="color: #000000;">สถิติผลการเรียน</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/chartProblemL/{{$course->course_id}}" style="color: #000000;">สถิติด้านพฤติกรรม</a>
    </li>
</ul><br>


<h5 align='center'>{{$course->course_id}}</h5>
<h6 align='center'>{{$course->course_name_eng}}</h6>
<br>

{{-- การเข้าเรียน --}}
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Chart Attendance
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
            <th scope="col">คาบเรียนที่</th>
            <th scope="col">จำนวนนักศึกษาทั้งหมด</th>
            {{-- <th scope="col">จำนวนนักศึกษาที่เข้าเรียน</th> --}}
            <th scope="col">จำนวนนักศึกษาที่ขาดเรียน</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th scope="row">คาบที่ 1</th>
            <td>3</td>
            {{-- <td>นักศึกษาที่เข้าเรียน</td> --}}
            <td>{{$period_1}}</td>
        </tr>
        <tr>
            <th scope="row">คาบที่ 2</th>
            <td>3</td>
            {{-- <td>นักศึกษาที่เข้าเรียน</td> --}}
            <td>{{$period_2}}</td>
        </tr>
        <tr>
            <th scope="row">คาบที่ 3</th>
            <td>3</td>
            {{-- <td>นักศึกษาที่เข้าเรียน</td> --}}
            <td>{{$period_3}}</td>
        </tr>
        <tr>
            <th scope="row">คาบที่ 4</th>
            <td>3</td>
            {{-- <td>นักศึกษาที่เข้าเรียน</td> --}}
            <td>{{$period_4}}</td>
        </tr>
        <tr>
            <th scope="row">คาบที่ 5</th>
            <td>3</td>
            {{-- <td>นักศึกษาที่เข้าเรียน</td> --}}
            <td>{{$period_5}}</td>
        </tr>
        <tr>
            <th scope="row">คาบที่ 6</th>
            <td>3</td>
            {{-- <td>นักศึกษาที่เข้าเรียน</td> --}}
            <td>{{$period_6}}</td>
        </tr>
        <tr>
            <th scope="row">คาบที่ 7</th>
            <td>3</td>
            {{-- <td>นักศึกษาที่เข้าเรียน</td> --}}
            <td>{{$period_7}}</td>
        </tr>
        <tr>
            <th scope="row">คาบที่ 8</th>
            <td>3</td>
            {{-- <td>นักศึกษาที่เข้าเรียน</td> --}}
            <td>{{$period_8}}</td>
        </tr>
        <tr>
            <th scope="row">คาบที่ 9</th>
            <td>3</td>
            {{-- <td>นักศึกษาที่เข้าเรียน</td> --}}
            <td>{{$period_9}}</td>
        </tr>
        <tr>
            <th scope="row">คาบที่ 10</th>
            <td>3</td>
            {{-- <td>นักศึกษาที่เข้าเรียน</td> --}}
            <td>{{$period_10}}</td>
        </tr>
        <tr>
            <th scope="row">คาบที่ 11</th>
            <td>3</td>
            {{-- <td>นักศึกษาที่เข้าเรียน</td> --}}
            <td>{{$period_11}}</td>
        </tr>
        <tr>
            <th scope="row">คาบที่ 12</th>
            <td>3</td>
            {{-- <td>นักศึกษาที่เข้าเรียน</td> --}}
            <td>{{$period_12}}</td>
        </tr><tr>
            <th scope="row">คาบที่ 13</th>
            <td>3</td>
            {{-- <td>นักศึกษาที่เข้าเรียน</td> --}}
            <td>{{$period_13}}</td>
        </tr>
        <tr>
            <th scope="row">คาบที่ 14</th>
            <td>3</td>
            {{-- <td>นักศึกษาที่เข้าเรียน</td> --}}
            <td>{{$period_14}}</td>
        </tr>
        <tr>
            <th scope="row">คาบที่ 15</th>
            <td>3</td>
            {{-- <td>นักศึกษาที่เข้าเรียน</td> --}}
            <td>{{$period_15}}</td>
        </tr>
    </tbody>
</table>
</center><br><br>



@endsection



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>

@endsection
@extends('bar.header(lec)')

