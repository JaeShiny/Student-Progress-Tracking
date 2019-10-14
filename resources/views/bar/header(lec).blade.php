<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge"> {{--
    <title>header(edu)</title> --}}

    <link rel="stylesheet" href="csste.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <nav class="navbar navbar-light" style="background-color: #000000;">
        <a class="navbar-brand" style="color:#FFFFFF;">ระบบติดตามความก้าวหน้าของนักศึกษา</a>


        <div class="t1">
            @guest
                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>

            @if (Route::has('register'))

                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>

            @endif
            @else

                {{-- Username:  --}}
                {{-- <img src="../img/user.png" alt="Avatar" class="image" width="2"> --}}
                {{ Auth::user()->name }}  ({{ Auth::user()->position }})<span class="caret"></span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                <button type="button" class="btn">

                    <a class="" href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}</a>
                </button>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>

            @endguest

        </div>

    </nav>



    <nav class="nav" style="background-color: #1D5287;">
        {{-- &nbsp;&nbsp;<img src="../img/logopage.png" width="120" height="50"> --}}
        &nbsp;&nbsp;<img src={{ URL::asset("../img/logopage.png") }} width="120" height="50">
        <a class="nav-link active" href="{{ url('course') }}" style="color: #FFFFFF">วิชาที่สอน</a>
        <a class="nav-link" href="{{ url('subjectNotiL') }}" style="color: #FFFFFF">การแจ้งเตือน</a>
        <a class="nav-link" href="#" style="color: #FFFFFF">สถิติ</a>
        <a class="nav-link" href="{{ url('FormAttendance') }}" style="color: #FFFFFF">ดาวน์โหลดแบบฟอร์ม</a>
        {{-- <a class="nav-link" href="" style="color: #FFFFFF">เพิ่มไฟล์</a> --}}
        {{-- <a class="nav-link" href="/importExportView/{course_id}" style="color: #FFFFFF">เพิ่มไฟล์</a> --}}
        {{-- <a class="nav-link" href="/survey/new" style="color: #FFFFFF">แบบสอบถาม</a> --}}
        <a class="nav-link" href="/indexSurvey" style="color: #FFFFFF">แบบสอบถาม</a>
    </nav>
    {{-- <nav class="bg2" style="background-color: #1D5287;">
        <span class="navbar-text">
            &nbsp;&nbsp;&nbsp;<img src="../img/logopage.png" width="120" height="50"></li>&nbsp;&nbsp;
            <a href="{{ url('course') }}"><p style="color: #FFFFFF">วิชาที่สอน</p></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="การแจ้งเตือน.html"><p style="color: #FFFFFF">การแจ้งเตือน</p></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="สถิติ.html"><p style="color: #FFFFFF">สถิติ</p></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        </span>
    </nav> --}}

    <style type="text/css">
        @charset "utf-8";
        /* CSS Document */

        body {
            font: 14px/20px "Lucida Grande", Tahoma, Verdana, sans-serif;
            /*ขนาดและชนิดของ font */
            color: #404040;
            /*สีของตัวอักษร*/
            background-color: #EFE6E6;
            /*ส่วนนี้เป็น สีของพื้นหลัง*/
            margin: 0;
        }

        body.info {
            background-color: #FFFFFF;
            min-height: 100%;
            min-width: 1024px;
            width: 100%;
            height: auto;
            position: relative;
            margin: 0;
        }

        @media (min-width: 992px) {
            div.info {
                /*ข้อมูลนักศึกษา*/
                color: black;
                height: 70px;
                font-size: 25px;
                border: 0px solid #9BB1B2;
                margin: 0;
                background-color: #9BB1B2;
                position: relative;
                bottom: 16px;
            }
            div.info a {
                float: right;
                color: black;
                text-align: center;
                padding: 14px 20px;
                text-decoration: none;
                font-size: 17px;
                bottom: 100px;
            }
            .info a:hover {
                background-color: #ddd;
                /*เวลาชี้*/
                color: black;
            }
            .info a.active {
                background-color: #547DDC;
                color: black;
                bottom: -50px;
                margin: 15px 5px;
                border-radius: 10px;
            }
            .info a.active1 {
                background-color: #B4BCF5;
                color: black;
                margin-right: 20px;
                margin: 15px;
                border-radius: 10px;
            }
            .info a.active2 {
                background-color: #B4BCF5;
                color: black;
                margin-right: 20px;
                margin: 15px;
                border-radius: 10px;
            }
            .info a.active3 {
                background-color: #B4BCF5;
                color: black;
                margin-right: 20px;
                margin: 15px;
                border-radius: 10px;
            }
            .info a.active4 {
                background-color: #B4BCF5;
                color: black;
                margin-right: 20px;
                margin: 15px;
                border-radius: 10px;
            }
            ul {
                list-style-type: none;
                margin: 0;
                padding: 0;
                overflow: hidden;
                background-color: #1D5287;
            }
            ul.go {
                color: white;
                background-color: #191818;
                font-size: 13px;
                width: 100%;
                margin: 0;
            }
            ul.go li a {
                font-size: 15px;
                color: white;
                position: relative;
                left: 600px;
            }
            li {
                float: left;
            }
            li a {
                /* display: block;*/
                color: #000000;
                text-align: ;
                /* font-size: 25px;*/
                /*padding: 16px;*/
                text-decoration: none;
            }
            li a:hover {
                /* background-color:#2F4F4F;สีเวลาชี้ */
            }
            .dropdown {
                float: left;
                left: 70px;
            }
            @media (min-width: 992px) {
                .col-sm-10 {
                    -ms-flex: 0 0 83.333333%;
                    flex: 0 0 83.333333%;
                    max-width: 83.333333%;
                }
                .form-group {
                    margin-bottom: 1rem;
                }
                .row {
                    display: -ms-flexbox;
                    display: flex;
                    -ms-flex-wrap: wrap;
                    flex-wrap: wrap;
                    margin-right: -15px;
                    margin-left: -15px;
                }
                *,
                ::after,
                ::before {
                    box-sizing: border-box;
                }
                user agent stylesheet div {
                    display: block;
                }
                body {
                    margin: 0;
                    font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
                    font-size: 1rem;
                    font-weight: 400;
                    line-height: 1.5;
                    color: #212529;
                    text-align: left;
                    background-color: #fff;
                }
                .checked {
                    position: relative;
                    background-color: width: 300px;
                    float: right;
                    right: -300px;
                }
                legend {
                    display: inline;
                    padding-inline-start: 2px;
                    padding-inline-end: 2px;
                    border-width: initial;
                    border-style: none;
                    border-color: initial;
                    border-image: initial;
                }
                .ch {
                    position: relative;
                    background-color: width: 300px;
                    float: right;
                    right: 350px;
                }
                .head1 {
                    background-color: red;
                }
                .content6 table {
                    border-collapse: collapse;
                    width: 100%;
                    margin: 0px;
                }
                .content6 {
                    background-color: margin: 100px 50px;
                    padding: 30px;
                    height: 100%;
                    position: relative;
                    bottom: -70px;
                }
                .content9 {
                    background-color: margin: 100px 50px;
                    padding: 30px;
                    height: 100%;
                    position: relative;
                    bottom: -50px;
                }
                td,
                th {
                    border: 1px solid #dddddd;
                    text-align: left;
                    padding: 8px;
                }
                tr:nth-child(even) {
                    background-color:
                }
                p {
                    margin-top: 0;
                    margin-bottom: 1rem;
                    display: inline;
                }
                .container7 {
                    position: relative;
                    float: right;
                    right: 100px;
                    bottom: 150px;
                }
                .jumbotron {
                    position: relative;
                    bottom: 100px;
                    margin: 150px;
                }
                .container8 {
                    position: relative;
                    float: right;
                    right: 50px;
                    bottom: -10px;
                }
                .my-4 {
                    color: #000000;
                }
                table {
                    margin-top: -5%;
                    max-width: 78%;
                }
                .navbar.navbar-expand-lg.navbar-light.bg-light {
                    background-color: #1D5287;
                }
                .bar p {
                    position: relative;
                    background-color: #9BB1B2;
                    border-radius: 10px;
                }
                .bar p {
                    padding: 10px;
                    color: black;
                    text-decoration: none;
                    font-size: 20px;
                    text-align: center;
                }
                /* แถบ user */
                .t1 {
                    float: right;
                    width: 280px;
                    height: 38px;
                    text-align: center;
                    color: white;
                }

            }
    </style>

</head>

<body>

</body>

</html>
