@extends('bar.body')
@section('content')
<!DOCTYPE html>
<html>

<head>
    <title>ข้อมูลการสัมภาษณ์</title>
    <link rel="stylesheet" href="csste.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li> </li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <li class="breadcrumb-item"><a href="{{ url('curriculum') }}">หลักสูตร(IT)</a></li>
                <li class="breadcrumb-item"><a href="{{ url('selectyear') }}">ชั้นปี</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="{{ action('student\BioController@index') }}">รายชื่อนักศึกษา</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="">ประวัตินักศึกษา</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="">ข้อมูลการสัมภาษณ์</a></li>
            </ol>
    </nav>
</head>

<body>

    </nav>

    <div class="jumbotron">
        <h4 class="display-4"></h4>

        <p>ชื่อ-นามสกุล &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </p>
        <p>นางสาวกนกวรรณ เฟื่องฟูชัชวาล</p>
        <br>
        <br>
        <p>สาขาที่สนใจสมัคร &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : </p>
        <p>IT</p>
        <br>
        <br>
        <p>หมายเหตุ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : </p>
        <p> Active Recument</p>
        <br>
        <br>
        <p>อาจารย์ผู้สัมภาษณ์ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </p>
        <p>อ.สนิท ศิริสวัสดิ์วัฒนา</p>

        <div class="container7">
            <img src="/Codeproject/รูปสัม.jpg" alt="Avatar" class="image" width="100">

        </div>

        <hr class="my-4">
        <p>
            <B>ประวัติการศึกษา</B>
        </p>
        <br>
        <br>
        <p>ชื่อสถานศึกษา &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : </p>
        <p>เซนต์โยเซฟ คอนเวนท์</p>
        <br>
        <br>
        <p>สายการศึกษา &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : </p>
        <p> ศิลป์-คำนวณ</p>
        <br>
        <br>
        <p>คะแนนเฉลี่ยสะสม &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </p>
        <p> 3.29</p>

        <hr class="my-4">
        <p>
            <B>ผลการสัมภาษณ์</B>
        </p>
        <br>
        <br>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">รายละเอียดผลการสัมภาษณ์</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>

    </div>
    <center>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">กลุ่มสาระวิชา</th>
                    <th scope="col">O-NET</th>
                    <th scope="col">GPA</th>
                    <th scope="col">GAT 1 </th>
                    <th scope="col">GAT 2</th>
                    <th scope="col">PAT 1 </th>
                    <th scope="col">PAT 2 </th>
                </tr>
            </thead>
            <tbody>
                <tr>

                    <td>คณิตศาสตร์</td>
                    <td>3.00</td>
                    <td>3.25</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>

                    <td>วิทยาศาสตร์</td>
                    <td>3.10</td>
                    <td>3.50</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>

                    <td>ภาษาอังกฤษ</td>
                    <td>3.20</td>
                    <td>3.35</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>

        </table>
    </center>

    </div>
    </div>

    <center>
        <br>
        <a href="ประวัตินักศึกษา.html"> ย้อนกลับ</a>
    </center>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>

</html>

@endsection
@extends('bar.header(edu)')
@extends('bar.username')
