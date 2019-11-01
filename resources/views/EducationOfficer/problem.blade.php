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

    <title>ปัญหา/พฤติกรรม</title>

    <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li> </li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <li class="breadcrumb-item"><a href="{{ url('curriculum') }}">หลักสูตร</a></li>
                <li class="breadcrumb-item" aria-current="page">รายชื่อนักศึกษา</li>
                {{-- <li class="breadcrumb-item active" aria-current="page"><a href="">ประวัตินักศึกษา(ใส่ชื่อด้วย)</a></li> --}}
                <li class="breadcrumb-item active" aria-current="page"><a href="">พฤติกรรมหรือปัญหาของนักศึกษา</a></li>
            </ol>
    </nav>
</head>
<body>

        <h6 align='right'>รหัสนักศึกษา: {{$bios->student_id}} &nbsp;&nbsp;&nbsp;&nbsp;</h6>
        <h6 align='right'>ชื่อ-สกุล: {{$bios->first_name}} &nbsp;{{$bios->last_name}}&nbsp;&nbsp;&nbsp;</h6>


        <h5 align='center'>ปัญหา/พฤติกรรม</h5>
        <div class="dropdown">
        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            เลือกปี และ เทอม
        </a>

        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            @foreach($gen as $show)
        <a class="dropdown-item" href="/studentproblemE/{{$bios->student_id}}/{{$show->semester}}/{{$show->year}}">{{$show->year}}|{{$show->semester}}</a>
            @endforeach

        </div>
        </div>
        <br><br><br><br>

        <center>
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
                    @foreach ($problem as $show_problem)

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
        </center>

</body>
</html>


@endsection
@extends('bar.header(edu)')
{{-- @extends('bar.username') --}}
