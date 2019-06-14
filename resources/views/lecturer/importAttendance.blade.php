@extends('bar.body')
@section('content')

<!DOCTYPE html>
<html>
<head>
    <title>Import Attendance</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
</head>
<body>

<div class="container">
    <div class="card bg-light mt-3">
        <div class="card-header">
            Import Attendance
        </div>
        <div class="card-body">
        <form action="/import/{{$course->course_id}}" method="POST" enctype="multipart/form-data">
                @csrf
            <input type="hidden" name="course_id" value="{{$course->course_id}}">
                <input type="file" name="file" class="form-control">
                <br>
                <button class="btn btn-success">Import Attendance</button>
                <a class="btn btn-warning" href="{{ route('export') }}">Export Attendance</a>
            </form>
        </div>
    </div>
</div>

</body>
</html>


@endsection
@extends('bar.header(lec)')
