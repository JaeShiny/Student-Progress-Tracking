@extends('bar.body')
@section('content')

<!DOCTYPE html>
<html>

<head>
    <title>วิชาที่สอน</title>
    <link rel="stylesheet" href="csste.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-grid.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-reboot.css">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

            <li class="breadcrumb-item active" aria-current="page">วิชาที่สอน</li>

        </ol>

    </nav>
</head>

<body>

@foreach ($student as $show_student)
    {{-- <p>{{$show_student->student_id}}</p> --}}
    <p>{{$show_student->bio->first_name}}</p>
@endforeach

</body>

</html>

@endsection
@extends('bar.header(lec)')
@extends('bar.username')
