@extends('bar.body')
@section('content')
<!DOCTYPE html>
<html>
<head>
    <title>ประวัตินักศึกษา</title>
    <link href="{{ asset('css/csste.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"  >

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li> </li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <li class="breadcrumb-item"><a href="{{ url('curriculum') }}">หลักสูตร(IT)</a></li>
            <li class="breadcrumb-item"><a href="{{ url('selectyear') }}">ชั้นปี</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="{{ action('student\BioController@index') }}">รายชื่อนักศึกษา</a></li>
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
                <button type="button" class="btn btn-outline-success">ข้อมูลการสัมภาษณ์</button>
            </a>
            <a href="{{ url('profileindex') }}">
                <button type="button" class="btn btn-outline-secondary">ข้อมูลระหว่างการศึกษา</button>
            </a>
            <a href="/profileafterE/{{$bios->student_id}}">
                <button type="button" class="btn btn-outline-primary">ข้อมูลหลังจบการศึกษา</button>
            </a>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
        </div>
        <br>

        <div class="jumbotron">
            <h4 class="display-4"></h4>
            <p>
                <B>ประวัติส่วนตัว</B>
            </p>
            <br>
            <br>


            {{-- @foreach($bios as $bios) --}}

            <p>รหัสนักศึกษา &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </p>

            <p>{{$bios->student_id}}</p>

            <br>
            <br>
            <p>ชื่อ (ภาษาไทย) &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : </p>
            <p>{{$bios->first_name}}&nbsp;&nbsp;{{$bios->last_name}}</p>
            <br>
            <br>

            {{-- <div class="container7">
                <img src="/Codeproject/รูปสัม.jpg" alt="Avatar" class="image" width="100">

            </div> --}}

            <p>ชื่อ (ภาษาอังกฤษ) &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : </p>
            <p>{{$bios->firstname_eng}}&nbsp;&nbsp;{{$bios->lastname_eng}}</p>
            <br>
            <br>
            <p>ปีเกิด/เดือน/วัน &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : </p>
            <p>{{$bios->birth}}</p>
            <br>
            <br>
            <hr class="my-4">
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

            {{-- <hr class="my-4">
            <p>

                ประเภทนักศึกษา &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : ปริญญาตรี 4 ปี
            </p>
            <br>
            <br>

            <p>
                แผน &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :
            </p>

            <p>
                ปกติ
            </p>
            <br>
            <br>

            <p>
                วิชาเอก &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : -
            </p>
            <br>
            <br>

            <p>
                วิชาโท &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : -
            </p>
            <br>
            <br>

            <p>
                สถานภาพนักศึกษา &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :
            </p>
            <p>
                ปกติ
            </p>
            <br>
            <br>

            <p>
                ปริญญาที่ได้รับ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :
            </p>
            <p>
                วิทยาศาสตรบัณฑิต (เทคโนโลยีสารสนเทศ)
            </p>
            <br>
            <br> --}}

            {{-- @endforeach --}}

            <br>
            <br>
            <a href="{{ action('student\BioController@index') }}" style="float: right; "> ย้อนกลับ</a>

        </div>
        </div>
        </div>
        <br>
        <br>

        <script src="http://www.sitepoint.com/responsive-data-tables-comprehensive-list-solutions"></script>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    </body>
</html>


@endsection
@extends('bar.header(edu)')
@extends('bar.username')
