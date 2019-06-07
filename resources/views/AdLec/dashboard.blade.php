@extends('bar.body')
@section('content')
<!DOCTYPE html>
<html>

<head>
    <title>ยินดีต้อนรับ</title>
    <link rel="stylesheet" href="หน้าหลักสูตร.css">
    <link rel="stylesheet" href="csste.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
        body,
        html {
            height: 100%;
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
        }

        * {
            box-sizing: border-box;
        }

        .bg-image {
            /* The image used */
            background-image: url("../img/wel.jpg");
            /* Add the blur effect */
            filter: blur(2px);
            -webkit-filter: blur(2px);
            /* Full height */
            height: 83.8%;
            /* Center and scale the image nicely */
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
        /* Position text in the middle of the page/image */

        .bg-text {
            background-color: rgb(0, 0, 0);
            /* Fallback color */
            background-color: rgba(0, 0, 0, 0.4);
            /* Black w/opacity/see-through */
            color: white;
            font-weight: bold;
            border: 3px solid #f1f1f1;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 2;
            width: 80%;
            padding: 20px;
            text-align: center;
        }
    </style>
</head>

<body>

    <body>

        <div class="bg-image"></div>

        <div class="bg-text">
            <h2>ยินดีต้อนรับเข้าสู่</h2>
            <br>
            <h3> ระบบติดตามความก้าวหน้าของนักศึกษา</h3>
            <br>

            <h6>STUDENT PROGRESS TRACKING SYSTEM</h6>
            <h6>ADVISOR & LECTURER</h6>
            <br>

        </div>

    </body>

</html>

@endsection
@extends('bar.header(AdLec)')
{{-- @extends('bar.username') --}}

