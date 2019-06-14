@extends('bar.body')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
@foreach($attendance as $attendances)
{{$attendances->course_id}} {{$attendances->amount_attendance}} <br>
@endforeach
</body>
</html>

@endsection
@extends('bar.header(student)')
