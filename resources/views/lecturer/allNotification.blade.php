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
            <li class="breadcrumb-item"><a href="{{ url('course') }}">วิชาที่สอน</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="">การแจ้งเตือน</a></li>
        </ol>
    </nav>

</head>

<body>
    {{-- <h3 align='center'>การแจ้งเตือน</h3><br> --}}
    <h5 align='center'>{{$course->course_id}}</h5>
    <h6 align='center'>{{$course->course_name_eng}}</h6><br><br>


        <center>

            {{-- แจ้งเตือนปัญหาและพฤติกรรม --}}
            <h6  style="position: relative; left: -31%">การแจ้งเตือนปัญหาและพฤติกรรม</h6>
            <br><br><br>
            <table class="table" width="60%">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">ประเภทพฤติกรรม/ปัญหา</th>
                        <th scope="col">หัวข้อของปัญหา</th>
                        <th scope="col">พฤติกรรม/ปัญหา</th>
                        <th scope="col">ระดับความเสี่ยง</th>
                        <th scope="col">วันที่เพิ่ม</th>
                        <th scope="col">วันที่เกิดปัญหา</th>
                        <th scope="col">ผู้เพิ่ม</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($risk_problem as $show_problem)

                    <tr>
                        <td scope="row">{{$show_problem->problem_type}}</td>
                        <td>{{$show_problem->problem_topic}}</td>
                        <td>{{$show_problem->problem_detail}}</td>
                        <td>{{$show_problem->risk_level}}</td>
                        <td>{{$show_problem->created_at}}</td>
                        <td>{{$show_problem->date}}</td>
                        <td>อาจารย์ {{$show_problem->users->name}}</td>
                    </tr>

                    @endforeach

                </tbody>
            </table>
            <br><br>

            {{-- แจ้งเตือนการเข้าเรียน --}}
            <h6  style="position: relative; left: -33%">การแจ้งเตือนการเข้าเรียน</h6>
            <br><br><br>
            <table class="table" width="60%">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">รหัสวิชา</th>
                        <th scope="col">จำนวนที่ขาด</th>
                        <th scope="col">ผู้เพิ่ม</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($risk_attendance as $show_problem)

                    <tr>
                        <td scope="row">{{$show_problem->course_id}}</td>
                        <td>{{$show_problem->amount_absence}}</td>

                        <td>อาจารย์ {{$show_problem->person_add}}</td>
                    </tr>

                    @endforeach

                </tbody>
            </table>
            <br><br>


            {{-- แจ้งเตือนผลการเรียน --}}
            <h6  style="position: relative; left: -33%">การแจ้งเตือนผลการเรียน</h6>
            <br><br><br>
            <table class="table" width="60%">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">รหัสวิชา</th>
                        <th scope="col">คะแนนรวมทั้งหมด</th>
                        <th scope="col">ผู้เพิ่ม</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($risk_grade as $show_problem)

                    <tr>
                        <td scope="row">{{$show_problem->course_id}}</td>
                        <td>{{$show_problem->total_all}}</td>

                        <td>อาจารย์ {{$show_problem->person_add}}</td>
                    </tr>

                    @endforeach

                </tbody>
            </table>
            <br><br>


    </center>
          {{-- <p> ทั้งหมด {{$student->count()}} รายการ </p> --}}

          {{-- <br>{{$bio->links()}}<br> --}}


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
