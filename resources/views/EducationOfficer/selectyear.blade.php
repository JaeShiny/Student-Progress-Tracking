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


    <center>
        <div style="border: 2px dotted โค้ตสีกรอบ; overflow: auto; width: 800px; height: 100px; text-align: center; background-color: #EEE9E9; border-radius: 5px;box-shadow: 5px 5px 8px 4px rgba(50, 50, 50, .5);">
           <br> <h4>{{$curriculum->curriculum_name}}</h4><p> {{$curriculum->curri_name_eng}}</p></div>
        </div>
    </center>
    <br>

    <div class="container">

            <div class="row">
                    <div class="col-sm-2"></div>
                <div class="col-sm-4">

                        <div class="card" style="width: 18rem; box-shadow: 5px 5px 8px 4px rgba(50, 50, 50, .5);">
                                <div class="card-body">
                                  <center><h5 class="card-title">นักศึกษาชั้นปีที่ 1</h5></center>

                                  <center><a href="/studentlist/{{$curriculum->curriculum_id}}/1" class="btn btn-primary" style="width: 100%">เลือก</a></center>

                                  <center><small class="text-muted">{{$curriculum->curri_name_eng}}</small></center>
                                </div>
                              </div>

                       {{-- <a href="/studentlist/{{$curriculum->curriculum_id}}/1"> <button type="button" class="btn btn-primary" style="box-shadow: 5px 5px 8px 4px rgba(50, 50, 50, .5);">นักศึกษาชั้นปีที่ 1</button></a>--}}
                </div>
                <div class="col-sm-1" style="position: relative;right: -5%">

                        <div class="card" style="width: 18rem; box-shadow: 5px 5px 8px 4px rgba(50, 50, 50, .5);">
                                <div class="card-body">
                                  <center><h5 class="card-title">นักศึกษาชั้นปีที่ 2</h5></center>

                                  <center><a href="/studentlist/{{$curriculum->curriculum_id}}/2" class="btn btn-primary" style="width: 100%">เลือก</a></center>
                                  <center><small class="text-muted">{{$curriculum->curri_name_eng}}</small></center>

                                </div>
                              </div>

                       {{-- <a href="/studentlist/{{$curriculum->curriculum_id}}/2"> <button type="button" class="btn btn-danger" style="box-shadow: 5px 5px 8px 4px rgba(50, 50, 50, .5);">นักศึกษาชั้นปีที่ 2</button></a>--}}
                </div>

            </div>
<br>
            <div class="row">
                    <div class="col-sm-2"></div>
                <div class="col-sm-4">

                        <div class="card" style="width: 18rem; box-shadow: 5px 5px 8px 4px rgba(50, 50, 50, .5);">
                                <div class="card-body">
                                  <center><h5 class="card-title">นักศึกษาชั้นปีที่ 3</h5></center>

                                  <center><a href="/studentlist/{{$curriculum->curriculum_id}}/3" class="btn btn-primary" style="width: 100%">เลือก</a></center>
                                  <center><small class="text-muted">{{$curriculum->curri_name_eng}}</small></center>

                                </div>
                              </div>

                       {{-- <a href="/studentlist/{{$curriculum->curriculum_id}}/3"><button type="button" class="btn btn-secondary" style="box-shadow: 5px 5px 8px 4px rgba(50, 50, 50, .5);">นักศึกษาชั้นปีที่ 3</button></a>--}}
                </div>

                <div class="col-sm-1" style="position: relative;right: -5%">


                        <div class="card" style="width: 18rem; box-shadow: 5px 5px 8px 4px rgba(50, 50, 50, .5);">
                                <div class="card-body">
                                  <center><h5 class="card-title">นักศึกษาชั้นปีที่ 4</h5></center>

                                  <center><a href="/studentlist/{{$curriculum->curriculum_id}}/4" class="btn btn-primary" style="width: 100%">เลือก</a></center>
                                  <center><small class="text-muted">{{$curriculum->curri_name_eng}}</small></center>

                                </div>
                              </div>

                       {{-- <a href="/studentlist/{{$curriculum->curriculum_id}}/4"><button type="button" class="btn btn-success" style="box-shadow: 5px 5px 8px 4px rgba(50, 50, 50, .5);">นักศึกษาชั้นปีที่ 4</button></a>--}}
                </div>

            </div>

    </div>



</body>

</html>
@endsection
@extends('bar.header(edu)')
