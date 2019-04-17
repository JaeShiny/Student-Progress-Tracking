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

    <form class="form-inline" style="float:right;">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
    </form>

    <br>
    <br>
    <br>
    <br>

    <div class="container">
        <div class="row">
            <div class="col-sm">
                <div class="card" style="width: 18rem;">
                    <img src="../img/subject.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">INT 301</h5>
                        <p class="card-text">
                            Introduction Technology Infrastructure Management</p>
                        <a href="nameyear1.html" class="btn btn-primary">รายละเอียด</a>
                        <br>
                    </div>
                </div>
            </div>

            <div class="col-sm">
                <div class="card" style="width: 18rem;">
                    <img src="../img/subject.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">INT 206</h5>
                        <p class="card-text">Software Development Process II</p>
                        <a href="#" class="btn btn-primary">รายละเอียด</a>
                        <br>
                    </div>
                </div>
            </div>

            <div class="col-sm-0">
                <div class="card" style="width: 18rem;">
                    <img src="../img/subject.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">INT 206</h5>
                        <p class="card-text">Software Development Process II</p>
                        <a href="#" class="btn btn-primary">รายละเอียด</a>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br>
    <br>

    <div class="container">
        <div class="row">
            <div class="col-sm">
                <div class="card" style="width: 18rem;">
                    <img src="../img/subject.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">INT 206</h5>
                        <p class="card-text">Software Development Process II</p>
                        <a href="#" class="btn btn-primary">รายละเอียด</a>
                        <br>
                    </div>
                </div>
            </div>

            <div class="col-sm">
                <div class="card" style="width: 18rem;">
                    <img src="../img/subject.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">INT 206</h5>
                        <p class="card-text">Software Development Process II</p>
                        <a href="#" class="btn btn-primary">รายละเอียด</a>
                        <br>
                    </div>
                </div>
            </div>

            <div class="col-sm-0">
                <div class="card" style="width: 18rem;">
                    <img src="../img/subject.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">INT 206</h5>
                        <p class="card-text">Software Development Process II</p>
                        <a href="#" class="btn btn-primary">รายละเอียด</a>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br>
    <br>
    <br>
    <br>
    <br>

</body>

</html>

@endsection
@extends('bar.header(lec)')
@extends('bar.username')
