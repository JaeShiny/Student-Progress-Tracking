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

        <!--Table-->
        <table class="table table-striped w-auto">

        <!--Table head-->

        <thead>
          <tr>
            <th><center>ชื่อหลักสูตร(ภาษาไทย)</center></th>
            <th><center>ชื่อหลักสูตร(ภาษาอังกฤษ)</center></th>
            <th><center>ตัวย่อ</center></th>
          </tr>
        </thead>
        <!--Table head-->

        <!--Table body-->
        <tbody>

                @foreach($curriculum as $curriculum)
          <tr class="table-info">

            <td>
                <a href="">{{$curriculum->curriculum_name}} </a>
            </td>
            <td>
                {{$curriculum->curri_name_eng}}
            </td>
            <td>
                &nbsp;&nbsp;{{$curriculum->curr_abbre}}&nbsp;&nbsp;
            </td>

          </tr>
        </tbody>
        <!--Table body-->
        @endforeach
        </table>

      <!--Table-->
    </div>
</body>
</html>
@endsection

@extends('bar.header(edu)')
@extends('bar.username')

{{-- @extends('bar.footer') --}}
