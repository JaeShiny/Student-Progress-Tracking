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

                                    @foreach ($curriculum1 as $curriculum1)
                                    {{-- @continue($curriculum->curriculum_id == "1" || $curriculum->curriculum_id > "1") --}}
                                    {{-- @if($curriculum->curriculum_id >= "3" && $curriculum->curriculum_id == "1") --}}
                                            {{-- <a href="{{ url('selectyear') }}"> {{$curriculum1->curriculum_name}}</a> --}}
                                            <a href="{{route('curriculum',$curriculum1['curriculum_id'])}}">


                                        {{$curriculum1->curriculum_name}}</a>
                                        {{-- @break($curriculum->curriculum_id <> "1") --}}
                                    {{-- @endif --}}
                                    @endforeach
                                {{-- <a href="selectyearcs.html">สาขาวิชาวิทยาการคอมพิวเตอร์
                                    (หลักสูตรภาษาอังกฤษ)</a> --}}
                                {{-- <a href="selectyeardsi.html">สาขาวิชานวัตกรรมบริการดิจิทัล</a> --}}

                            </div>
                        </div>
                    </div>

                    <div class="col-sm">
                        <div class="dropdown">
                            <br>
                            <br>
                            <button class="dropbtn">หลักสูตรระดับปริญญาโท</button>
                            <div class="dropdown-content">
                                    @foreach ($curriculum2 as $curriculum2)
                                <a href="{{route('curriculum',$curriculum2['curriculum_id'])}}">

                                    {{$curriculum2->curriculum_name}}</a>
                                {{-- <a href="masterselectbis.html">สาขาวิชาระบบสารสนเทศทางธุรกิจ</a> --}}
                                {{-- <a href="masterselectpcs.html">สาขาวิชาวิทยาการคอมพิวเตอร์</a> --}}
                                {{-- <a href="masterselectmt.html">สาขาวิชาชีวสารสนเทศและ
                                    ชีววิทยาระบบ
                                    (หลักสูตรนานาชาติ)</a> --}}
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="col-sm">
                        <div class="dropdown">
                            <br>
                            <br>
                            <button class="dropbtn">หลักสูตรระดับปริญญาเอก</button>
                            <div class="dropdown-content">
                                    @foreach ($curriculum3 as $curriculum3)
                                 <a href="{{route('curriculum',$curriculum3['curriculum_id'])}}">

                                    {{$curriculum3->curriculum_name}}</a>
                                {{--<a href="phdselectcs.html">สาขาวิชาวิทยาการคอมพิวเตอร์
                                    (หลักสูตรภาษาอังกฤษ)</a> --}}
                                    @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="col-sm">
                        <div class="dropdown">
                            <br>
                            <br>
                            <button class="dropbtn">หลักสูตรระดับประกาศนียบัตร</button>
                            <div class="dropdown-content">
                                    @foreach ($curriculum4 as $curriculum4)
                                <a href="{{route('curriculum',$curriculum4['curriculum_id'])}}">

                                    {{$curriculum4->curriculum_name}}</a>
                                @endforeach
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
