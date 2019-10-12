@extends('bar.body')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <link href="{{ asset('css/course.css') }}" rel="stylesheet" type="text/css"> --}}
    <link href="{{ asset('css/csste.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>หลักสูตรการศึกษา</title>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <li class="breadcrumb-item"><a href="{{ url('curriculum') }}">หลักสูตร(IT)</a></li>
        </ol>
    </nav>

</head>

<body>
    <br><br>
        <section class="ftco-section contact-section ftco-degree-bg" style="width: 100%">
                <div class="container bg-light" style="width: 80%;box-shadow: 5px 5px 8px 4px rgba(50, 50, 50, .5);">
                  <div class="row d-flex mb-5 contact-info">
                    <div class="col-md-12 mb-4">
                        <br>


            <h4 align='center'>หลักสูตรการศึกษา</h4>

            <!--Table-->
<center>
            <table class="table" style="margin-top: 2%;margin-bottom: 15px;">

        <!--Table head-->

        <thead>
                <tr class="table-primary">
            <th><center>ชื่อหลักสูตร(ภาษาไทย)</center></th>
            <th><center>ชื่อหลักสูตร(ภาษาอังกฤษ)</center></th>
            <th style="width: 20%"><center>ตัวย่อ</center></th>
          </tr>
        </thead>
        <!--Table head-->

        <!--Table body-->
        <tbody>

                {{-- @foreach($curriculum as $curriculum) --}}
          <tr class=" ">

            <td>
                <a href="/selectyear/{{$curriculum->curriculum_id}}">
                    {{$curriculum->curriculum_name}}
                </a>
            </td>
            <td>
                <a href="/selectyear/{{$curriculum->curriculum_id}}">
                    {{$curriculum->curri_name_eng}}
                </a>
            </td>
            <td>
                <a href="/selectyear/{{$curriculum->curriculum_id}}">
                &nbsp;&nbsp;{{$curriculum->curr_abbre}}&nbsp;&nbsp;
                </a>
            </td>

          </tr>


        </tbody>
        <!--Table body-->
        {{-- @endforeach --}}
        </table>
</center>

      <!--Table-->

                    </div>
                  </div>
                </div>
        </section>
</body>
</html>
@endsection

@extends('bar.header(edu)')
