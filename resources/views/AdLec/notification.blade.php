@extends('bar.body')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>การแจ้งเตือน</title>

    <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li> </li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                {{-- <li class="breadcrumb-item" aria-current="page"><a href="/AdLec/ALStudent">รายชื่อนักศึกษา</a></li> --}}
                {{-- <li class="breadcrumb-item active" aria-current="page"><a href="">ประวัตินักศึกษา(ใส่ชื่อด้วย)</a></li> --}}
                <li class="breadcrumb-item active" aria-current="page"><a href="">การแจ้งเตือน</a></li>
            </ol>
    </nav>
</head>
<body>
        @foreach ($bios as $bio)
        <h6 align='right'>รหัสนักศึกษา: {{$bio->student_id}} &nbsp;&nbsp;&nbsp;&nbsp;</h6>
        <h6 align='right'>ชื่อ-สกุล: {{$bio->first_name}} &nbsp;{{$bio->last_name}}&nbsp;&nbsp;&nbsp;</h6>
        @endforeach

        <h5 align='center'>การแจ้งเตือน</h5>
        <br><br>

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


</body>
</html>


@endsection
@extends('bar.header(AdLec)')

