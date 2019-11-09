@extends('bar.body')
@section('content')
<!DOCTYPE html>
<html>
<head>
    <title>ประวัตินักศึกษา</title>
    {{-- <link href="{{ asset('css/csste.css') }}" rel="stylesheet" type="text/css"> --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"  >

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li> </li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <li class="breadcrumb-item"><a href="{{ url('curriculum') }}">หลักสูตร</a></li>
            <li class="breadcrumb-item" aria-current="page">รายชื่อนักศึกษา</li>
            <li class="breadcrumb-item active" aria-current="page"><a href="">ประวัตินักศึกษา</a></li>
        </ol>
    </nav>

</head>

<body>
        <div style="float: right;">
            {{-- <a href="{{ url('profilebefore')"> --}}
            {{-- <a href="{{route('profile',$bio['student_id'])}}"> --}}
            {{-- <a href="{{ action('student\InterviewControllerr@profile') }}"> --}}
            {{-- <a href="{{route('profile(before)',$bio['first_name']==$b_profile['firstname'])}}"> --}}
            {{-- <a href="{{url('profilebefore')}}"> --}}
            <a href="/profilebeforeE/{{$bios->student_id}}">
                <button type="button" class="btn btn-outline-success">ข้อมูลการศึกษา</button>
            </a>
            <a href="/profileDuringE/{{$bios->student_id}}">
                <button type="button" class="btn btn-outline-secondary">ข้อมูลระหว่างการศึกษา</button>
            </a>
            <a href="/profileafterE/{{$bios->student_id}}">
                <button type="button" class="btn btn-outline-primary">ข้อมูลหลังจบการศึกษา</button>
            </a>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
        </div>
        <br>

        <div class="jumbotron"style="box-shadow: 5px 5px 8px 4px rgba(50, 50, 50, .5);">
            <h4 class="display-4"></h4>
            <p>
                <B>ข้อมูลนักศึกษา</B>
            </p>


            <hr class="my-4">

            <p>รหัสนักศึกษา &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </p>

            <p>{{$bios->student_id}}</p>

            <br>
            <br>
            <p>ชื่อ (ภาษาไทย) &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : </p>
            <p>{{$bios->first_name}}&nbsp;&nbsp;{{$bios->last_name}}</p>
            <br>
            <br>

            <div class="container7">
                <br><br>
                <img src="../image/{{$bios->picture}}" width="110" height="140">
                {{-- <img src="{{ URL::asset("../img/stupic.png") }}" width="110" height="140"> --}}
            </div>

            <p>ชื่อ (ภาษาอังกฤษ) &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : </p>
            <p>{{$bios->firstname_eng}}&nbsp;&nbsp;{{$bios->lastname_eng}}</p>
            <br>
            <br>

            <p>
                สถานะ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :
            </p>
            <p>
                {{$bios->statuss->status}}
            </p>
            <br>
            <br>

            <p>
                หลักสูตร &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :
            </p>
            <p>
                {{$bios->students->majors->major_name}}
            </p>
            <br>
            <br>

            <p>
                ภาคการศึกษาที่เข้า &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :
            </p>
            <p>
                {{$bios->students->generations->semester}}
            </p>
            <br>
            <br>

            <p>
                ปีการศึกษาที่เข้า &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :
            </p>
            <p>
                {{$bios->students->generations->year}}
            </p>

            <br><br>
            <br><br>

            <p>
                <B>ประวัติส่วนตัว</B>
            </p>

            <hr class="my-4">
            <p>ปีเกิด/เดือน/วัน &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : </p>
            <p>{{$bios->birth}}</p>
            <br>
            <br>
            <p>ที่อยู่ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </p>
            <p>{{$bios->address}}&nbsp;{{$bios->zipcode}}</p>
            <br>
            <br>
            <p>เบอร์โทรศัพท์ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </p>
            <p>{{$bios->mobile}}</p>
            <br>
            <br>
            <p>
                Email ส่วนตัว &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :
            </p>
            <p>
                {{$bios->email}}
            </p>
            <br>
            <br>

            <hr class="my-4">

            <p>
                สัญชาติ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :
            </p>
            <p>
                {{$bios->nationality}}
            </p>
            <br>
            <br>

            <p>
                เชื้อชาติ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :
            </p>
            <p>
                {{$bios->origin}}
            </p>
            <br>
            <br>

            <p>
                ศาสนา &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :
            </p>
            <p>
                {{$bios->religion}}
            </p>
            <br>
            <br>

        </div>
        </div>
        </div>
        <br>
        <br>

        <script src="http://www.sitepoint.com/responsive-data-tables-comprehensive-list-solutions"></script>



    </body>
</html>


@endsection
@extends('bar.header(edu)')
{{-- @extends('bar.username') --}}
