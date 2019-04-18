@extends('bar.body')
@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/csste.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>ชั้นปีการศึกษา</title>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <li class="breadcrumb-item"><a href="{{ url('curriculum') }}">หลักสูตร(IT)</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="{{ url('selectyear') }}">ชั้นปี</a></li>
        </ol>
    </nav>
</head>

<body>

    <br>
    <center>
        <div style="border: 2px dotted โค้ตสีกรอบ; overflow: auto; width: 700px; height: auto; text-align: center; background-color: #9BB1B2; border-radius: 10px;">
            <h5>หลักสูตรวิทยาศาสตรบัณฑิต สาขาวิชาเทคโนโลยีสารสนเทศ<br><br> Bachelor of Science Programme in Information Technology</h5></div>
        </div>
    </center>
    <br>

    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-1" style="background-image: url(../img/pic.jpeg);">

            <div class="col-sm-2">
                <br>
            </div>
            <div class="col-sm-2">
                <br>
            </div>
            <div class="col-sm-4">
                <a href="nameyear1.html">
                    <button class="bt" type="button" value="click" style="height: 30px; width: 100px; background-color: #CCFFCC;">ชั้นปีที่ 1</button>
                </a>
            </div>
            <div class="col-sm-2">
                <br>
            </div>
            <div class="col-sm-2">
                <br>
            </div>

        </div>

        <div class="col-sm-1"></div>
        <div class="col-sm-1"></div>

        <div class="col-sm-1" style="background-image: url(../img/pic.jpeg);">
            <div class="col-sm-2">
                <br>
            </div>
            <div class="col-sm-2">
                <br>
            </div>
            <div class="col-sm-4">
                <a href="nameyear2.html">
                    <button class="bt" type="button" value="click" style="height: 30px; width: 100px; background-color: #CCFFCC;">ชั้นปีที่ 2</button>
                </a>
            </div>
            <div class="col-sm-2">
                <br>
            </div>
            <div class="col-sm-2">
                <br>
            </div>

        </div>

        <div class="col-sm-4"></div>
    </div>

    <br>
    <br>

    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-1" style="background-image: url(../img/pic.jpeg);">

            <div class="col-sm-2">
                <br>
            </div>
            <div class="col-sm-2">
                <br>
            </div>
            <div class="col-sm-4">
                <a href="{{ action('student\BioController@index') }}">
                    <button class="bt" type="button" value="click" style="height: 30px; width: 100px; background-color: #CCFFCC;">ชั้นปีที่ 3</button>
                </a>
            </div>
            <div class="col-sm-2">
                <br>
            </div>
            <div class="col-sm-2">
                <br>
            </div>

        </div>

        <div class="col-sm-1"></div>
        <div class="col-sm-1"></div>

        <div class="col-sm-1" style="background-image: url(../img/pic.jpeg);">
            <div class="col-sm-2">
                <br>
            </div>
            <div class="col-sm-2">
                <br>
            </div>
            <div class="col-sm-2">
                <a href="nameyear4.html">
                    <button class="bt" type="button" value="click" style="height: 30px; width: 100px; background-color: #CCFFCC;">ชั้นปีที่ 4</button>
                </a>
            </div>
            <div class="col-sm-2">
                <br>
            </div>
            <div class="col-sm-2">
                <br>
            </div>

        </div>

        <div class="col-sm-4"></div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>

</html>
@endsection
@extends('bar.header(edu)')
@extends('bar.username')

{{-- @extends('bar.footer') --}}
