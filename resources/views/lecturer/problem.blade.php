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
                {{-- <li class="breadcrumb-item"><a href="{{ url('course') }}">วิชาที่สอน</a></li> --}}
                <li class="breadcrumb-item" aria-current="page">รายชื่อนักศึกษา</li>
                {{-- <li class="breadcrumb-item active" aria-current="page"><a href="">ประวัตินักศึกษา(ใส่ชื่อด้วย)</a></li> --}}
                <li class="breadcrumb-item active" aria-current="page"><a href="">พฤติกรรมหรือปัญหาของนักศึกษา</a></li>
            </ol>
    </nav>
</head>
<body>

        <h6 align='right'>รหัสนักศึกษา: {{$bios->student_id}} &nbsp;&nbsp;&nbsp;&nbsp;</h6>
        <h6 align='right'>ชื่อ-สกุล: {{$bios->first_name}} &nbsp;{{$bios->last_name}}&nbsp;&nbsp;&nbsp;</h6>

        <h6 align='right'>
            <a href="/problem_createL/{{$bios->student_id}}" style="text-decoration-line: none">
                <img src="{{ URL::asset("../img/add.png") }}" width="25" title="เพิ่มพฤติกรรม/ปัญหา">
                    เพิ่มพฤติกรรม/ปัญหา&nbsp;&nbsp;&nbsp;&nbsp;
            </a>
        </h6>

        {{-- หัวข้อ --}}
        <div class="container">
        <div class="row">
            <div class="col-sm-4">

            </div>
        <div class="col-sm-5">
            <div class="card bg-light mb-3" style="max-width: 20rem; box-shadow: 5px 5px 8px 4px rgba(50, 50, 50, .5);" "> {{--box-shadow: 5px 5px 8px 4px rgba(50, 50, 50, .5);">--}}
                <center>
                    <div class="card-header">
                        <h5>ปัญหา/พฤติกรรม</h5>
                    </div>
                </center>
            </div>
        </div>
        </div>
        </div>
        {{-- จบหัวข้อ --}}

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="btn-group">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">{{$se}}/{{$ye}}<span class="caret"></span></button>
                    <ul class="dropdown-menu scrollable-menu" role="menu"style="overflow: scroll;height: 200px;overflow-x: unset">
                        @foreach($gen as $show)
                        <li> <a class="dropdown-item" href="/studentproblem/{{$bios->student_id}}/{{$show->semester}}/{{$show->year}}">{{$show->semester}}/{{$show->year}}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div><br>

    {{-- filter --}}
<div id="form-wrapper" style="max-width:700px; margin:auto;">
<div class="container">

    <form class="form-inline">

        <div class="form-group mb-2">
          <label class="sr-only">หัวข้อ</label>
          <input type="text" readonly class="form-control-plaintext" value="ระดับความรุนแรง:">
        </div>

        <div class="form-group mx-sm-3 mb-2">
            <label for="exampleFormControlSelect1">
                <select class="form-control" id="exampleFormControlSelect1" name="risk_condition">
                    <option>กรุณาเลือก</option>
                    <option value=">">มากกว่า</option>
                    <option value="<">น้อยกว่า</option>
                    <option value=">=">มากกว่าเท่ากับ</option>
                    <option value="<=">น้อยกว่าเท่ากับ</option>
                    <option value="=">เท่ากับ</option>
                </select>
            </label>
        </div>

        <div class="form-group mx-sm-3 mb-2">
            <label class="sr-only">ค่า</label>
            <input class="form-control" id="inputPassword2" placeholder="ค่า" name="risk_value">
        </div>

        <button type="submit" class="btn btn-primary mb-2">ค้นหา</button>

    </form>

</div>
</div>
<br><br><br><br>
{{-- จบ filter --}}

        <center>
            <table class="table" width="60%" style="box-shadow: 5px 5px 8px 4px rgba(50, 50, 50, .5);">
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
                    {{-- @foreach ($user as $users)
                    <tr>
                        <td>อาจารย์ {{$users->name}}</td>
                    </tr>
                    @endforeach --}}
                </tbody>
            </table><br><br>
        </center>



</body>
</html>


@endsection
@extends('bar.header(lec)')
{{-- @extends('bar.username') --}}
