@extends('bar.body')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>การแจ้งเตือน</title>

    <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li> </li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                {{-- <li class="breadcrumb-item" aria-current="page"><a href="/AdLec/ALStudent">รายชื่อนักศึกษา</a></li> --}}
                {{-- <li class="breadcrumb-item active" aria-current="page"><a href="">ประวัตินักศึกษา(ใส่ชื่อด้วย)</a></li> --}}
                <li class="breadcrumb-item active" aria-current="page"><a href="">การแจ้งเตือน</a></li>
            </ol>
    </nav>
</head>
{{-- <body>
    <center>
      <h4>การแจ้งเตือน</h4>

        <a href="/AdLec/showNotiAL" style="float:right">
            <h5>แจ้งเตือนตามรายชื่อนักศึกษา (Advisor)</h5>
        </a> <br>
        <a href="{{ url('subjectNotiAL2') }}" style="float:right">
            <h5>แจ้งเตือนตามวิชา (Lecturer)</h5>
        </a> <br>


    </center>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

<body> --}}

        <br>
        <div class="container">
                 <div class="row">
                   <div class="col-sm-4">

                   </div>
                   <div class="col-sm-5">

                         <div class="card mb-3" style="max-width: 20rem; background-color:#E6E6FA;box-shadow: 5px 5px 8px 4px rgba(50, 50, 50, .5);""> {{--box-shadow: 5px 5px 8px 4px rgba(50, 50, 50, .5);">--}}
                                 <center> <div class="card-header"><h3>การแจ้งเตือน</h3></div></center>

                                </div>

                   </div>
                   <div class="col-sm">

                   </div>
                 </div>
               </div>

               <br><br>



       <div class="container">
        <div class="row">
                <div class="col-sm-1">
                    </div>
            <div class="col-sm-5">


                    <div class="card mb-3" style="max-width: 400px;box-shadow: 5px 5px 8px 4px rgba(50, 50, 50, .5); ">
                            <div class="row no-gutters">
                              <div class="col-md-4">

                                <img src="../img/bookicon.jpg" class="card-img" alt="...">
                              </div>
                              <div class="col-md-8">
                                <div class="card-body">


                                       <b> <p class="card-text">
                                                การแจ้งเตือน
                                            </p></b>
                                  {{--<h5 class="card-title">การแจ้งเตือนพฤติกรรมและปัญหา</h5>--}}
                                  <p class="card-text">
                                        <button type="button" class="btn btn-warning">
                                                <a href="{{ url('subjectNotiAL2') }}" style="text-decoration-line: none;color: black">จากรายวิชาที่สอน&nbsp;&nbsp;</a>
                                                <span class="badge badge-light">
                                                {{-- <p>1</p> --}}
                                            </span>
                                            </button>
                                        </p><br>
                                 <p class="card-text"><small class="text-muted">Lecturer</small></p>
                                </div>
                              </div>
                            </div>
                          </div>

            </div>


            <div class="col-sm-5">


                    <div class="card mb-3" style="max-width: 400px;box-shadow: 5px 5px 8px 4px rgba(50, 50, 50, .5); ">
                            <div class="row no-gutters">
                                    <div class="col-md-4">

                                            <img src="../img/dent.jpg" class="card-img" alt="...">
                                          </div>
                              <div class="col-md-8">
                                <div class="card-body">


                                       <b> <p class="card-text">
                                                การแจ้งเตือน
                                            </p></b>
                                  {{--<h5 class="card-title">การแจ้งเตือนพฤติกรรมและปัญหา</h5>--}}
                                  <p class="card-text">
                                        <button type="button" class="btn btn-warning">
                                                <a href="/AdLec/showNotiAL" style="text-decoration-line: none;color: black">จากรายชื่อนักศึกษา&nbsp;&nbsp;</a>
                                                <span class="badge badge-light">
                                        {{-- <p>1</p> --}}
                                    </span>
                                            </button>
                                        </p><br>
                                 <p class="card-text"><small class="text-muted">Advisor</small></p>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-2">
                            </div>
            </div>


        </div>
    </div>





    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>
</html>


@endsection
@extends('bar.header(AdLec)')

