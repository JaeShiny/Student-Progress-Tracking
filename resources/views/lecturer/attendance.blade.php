@extends('bar.body')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>แสดงผลการเข้าเรียน</title>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li> </li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <li class="breadcrumb-item"><a href="{{ url('course') }}">วิชาที่สอน</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="">รายชื่อนักศึกษา</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="">แสดงผลการเข้าเรียน</a></li>
        </ol>
    </nav>

</head>
<body>
    @foreach($student as $show_student)
{{$show_student->student_id}}  {{$show_student->amount_attendance}}<br>
    @endforeach
</body>
</html>

@endsection
@extends('bar.header(lec)')
