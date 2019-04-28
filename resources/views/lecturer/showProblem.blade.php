@extends('bar.body')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>การแจ้งเตือนปัญหา</title>
</head>
<body>

@foreach ($risk_problem as $show_problem)

{{$show_problem->problem_detail}}<br>

@endforeach

</body>
</html>


@endsection
@extends('bar.header(lec)')
@extends('bar.username')
