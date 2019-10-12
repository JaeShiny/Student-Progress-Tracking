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
        <div style="border: 2px dotted โค้ตสีกรอบ; overflow: auto; width: 800px; height: 100px; text-align: center; background-color: #EEE9E9; border-radius: 5px;box-shadow: 5px 5px 8px 4px rgba(50, 50, 50, .5);">
           <br> <h4>{{$curriculum->curriculum_name}}</h4><p> {{$curriculum->curri_name_eng}}</p></div>
        </div>
    </center>
    <br><br><br>

    <div class="container">

            <div class="row">
                    <div class="col-sm-3"></div>
                <div class="col-sm-4">
                        <a href="/studentlist/{{$curriculum->curriculum_id}}/1"> <button type="button" class="btn btn-primary">นักศึกษาชั้นปีที่ 1</button></a>
                </div>
                <div class="col-sm-4">
                        <a href="/studentlist/{{$curriculum->curriculum_id}}/2"> <button type="button" class="btn btn-danger">นักศึกษาชั้นปีที่ 2</button></a>
                </div>

            </div>
<br><br><br>
            <div class="row">
                    <div class="col-sm-3"></div>
                <div class="col-sm-4">
                        <a href="/studentlist/{{$curriculum->curriculum_id}}/3"><button type="button" class="btn btn-warning">นักศึกษาชั้นปีที่ 3</button></a>
                </div>
                <div class="col-sm-4">
                        <a href="/studentlist/{{$curriculum->curriculum_id}}/4"><button type="button" class="btn btn-success">นักศึกษาชั้นปีที่ 4</button></a>
                </div>

            </div>

    </div>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>

</html>
@endsection
@extends('bar.header(edu)')
