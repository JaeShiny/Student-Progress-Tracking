@extends('bar.body')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/course.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/csste.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>หลักสูตรการศึกษา</title>
</head>
<body>
        <div class="container">
                <div class="row">

                    <div class="col-sm">
                        <div class="dropdown">
                            <br>
                            <br>
                            <button class="dropbtn">หลักสูตรระดับปริญญาตรี</button>
                            <div class="dropdown-content">
                                <a href="selectyearit.html">สาขาวิชาเทคโนโลยีสารสนเทศ</a>
                                <a href="selectyearcs.html">สาขาวิชาวิทยาการคอมพิวเตอร์
                                    (หลักสูตรภาษาอังกฤษ)</a>
                                <a href="selectyeardsi.html">สาขาวิชานวัตกรรมบริการดิจิทัล</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm">
                        <div class="dropdown">
                            <br>
                            <br>
                            <button class="dropbtn">หลักสูตรระดับปริญญาโท</button>
                            <div class="dropdown-content">
                                <a href="masterselectit.html">สาขาวิชาเทคโนโลยีสารสนเทศ</a>
                                <a href="masterselectpse.html">สาขาวิชาวิศวกรรมซอฟต์แวร์</a>
                                <a href="masterselectbis.html">สาขาวิชาระบบสารสนเทศทางธุรกิจ</a>
                                <a href="masterselectpcs.html">สาขาวิชาวิทยาการคอมพิวเตอร์</a>
                                <a href="masterselectmt.html">สาขาวิชาชีวสารสนเทศและ
                                    ชีววิทยาระบบ
                                    (หลักสูตรนานาชาติ)</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm">
                        <div class="dropdown">
                            <br>
                            <br>
                            <button class="dropbtn">หลักสูตรระดับปริญญาเอก</button>
                            <div class="dropdown-content">
                                <a href="phdselectit.html">สาขาวิชาเทคโนโลยีสารสนเทศ
                                    (หลักสูตรภาษาอังกฤษ)</a>
                                <a href="phdselectcs.html">สาขาวิชาวิทยาการคอมพิวเตอร์
                                    (หลักสูตรภาษาอังกฤษ)</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm">
                        <div class="dropdown">
                            <br>
                            <br>
                            <button class="dropbtn">หลักสูตรระดับประกาศนียบัตร</button>
                            <div class="dropdown-content">
                                <a href="certificationdsi.html">สาขาวิชานวัตกรรมบริการดิจิทัล</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</body>
</html>
@endsection

@extends('bar.header(edu)')
@extends('bar.username')

{{-- @extends('bar.footer') --}}
