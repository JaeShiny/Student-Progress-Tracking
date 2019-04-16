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
            <a href="ข้อมูลหลังจบการศึกษา.html">
                <button type="button" class="btn btn-outline-success">ข้อมูลการสัมภาษณ์</button>
            </a>
            <a href="ข้อมูลระหว่างการศึกษา.html">
                <button type="button" class="btn btn-outline-secondary">ข้อมูลระหว่างการศึกษา</button>
            </a>
            <a href="ข้อมูลการสัมภาษณ์.html">
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
            <p>รหัสนักศึกษา &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </p>
            <p>59130500001</p>
            <br>
            <br>
            <p>ชื่อ (ท) &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : </p>
            <p>นางสาวกนกวรรณ เฟื่องฟูชัชวาล</p>
            <br>
            <br>

            <div class="container7">
                <img src="/Codeproject/รูปสัม.jpg" alt="Avatar" class="image" width="100">

            </div>

            <p>ชื่อ (อ) &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : </p>
            <p> Ms.KANOKWAN FUENGFUCHATCHAWAL</p>
            <br>
            <br>
            <p>วัน/เดือน/ปีเกิด &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : </p>
            <p>25/03/2541</p>
            <br>
            <br>
            <p>หมายเลขบัตรประชาชน &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : </p>
            <p>1800-800-3265-7</p>
            <br>
            <br>
            <p>วัน/เดือน/ปีเกิดที่เข้าศึกษา &nbsp;&nbsp;: </p>
            <p>28/07/2559</p>
            <br>
            <br>
            <p>ปีการศึกษาที่เข้า &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </p>
            <p>2559</p>

            <hr class="my-4">

            <p>
                Email ส่วนตัว &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :
            </p>
            <p>
                Kanokwan@mail.kmutt.ac.th
            </p>
            <br>
            <br>
            <p>
                ชั้นปี &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :
            </p>
            <p>
                3
            </p>
            <br>
            <br>

            <p>
                ห้อง &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :
            </p>
            <p>
                A
            </p>
            <br>
            <br>

            <p>
                คณะ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : เทคโนโลยีสารสนเทศ
            </p>
            <br>
            <br>
            <p>
                ภาค/สายวิชา &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : -
            </p>
            <br>
            <br>

            <p>
                สาขาวิชา &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :
            </p>
            <p>เทคโนโลยีสารสนเทศ</p>
            <br>
            <br>
            <p>
                โครงการหลักสูตร &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :
            </p>
            <p>
                25540404:วิทยาศาสตรบัณฑิต สาขาวิชาเทคโนโลยีสารสนเทศ ปริญญาตรี 4 ปี
            </p>
            <br>
            <br>

            <hr class="my-4">
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
            <br>
            <a href="nameyear1.html" style="float: right; "> ย้อนกลับ</a>

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
