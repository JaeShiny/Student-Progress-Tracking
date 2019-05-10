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

    <title>ปัญหา/พฤติกรรม</title>

    <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li> </li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                {{-- <li class="breadcrumb-item"><a href="{{ url('curriculum') }}">หลักสูตร(IT)</a></li> --}}
                {{-- <li class="breadcrumb-item"><a href="{{ url('selectyear') }}">ชั้นปี</a></li> --}}
                <li class="breadcrumb-item active" aria-current="page"><a href="">รายชื่อนักศึกษา</a></li>
                {{-- <li class="breadcrumb-item active" aria-current="page"><a href="">ประวัตินักศึกษา(ใส่ชื่อด้วย)</a></li> --}}
                <li class="breadcrumb-item active" aria-current="page"><a href="">พฤติกรรม/ปัญหาของนักศึกษา</a></li>
            </ol>
    </nav>
</head>
<body>
        <h5 align='center'>วิชาที่ลงทะเบียน</h5>
        <br><br><br><br>

        <div class="dropdown">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          ปีการศึกษา&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
          <a class="dropdown-item" href="#">2/2561</a>
          <a class="dropdown-item" href="#">1/2561</a>
          <a class="dropdown-item" href="#">2/2560</a>
           <a class="dropdown-item" href="#">1/2560</a>
        </div>
      </div>

      <br><br><br>
      <center>
          <table class="table table-bordered">

        <thead>

          <tr>

             <td class="table-secondary"><center><b>ลำดับที่</b></center></td>
             <td class="table-secondary"><center><b>วิชาที่ลงทะเบียน</b></center></td>
             <td class="table-secondary"><center><b>หน่วยกิต</b></center></td>
             <td class="table-secondary"><center><b>กลุ่ม</b></center></td>

          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row"><center>1</center></th>
            <td>INT206 Software Process</td>
            <td><center>3</center></td>
            <td><center>1</center></td>

          </tr>
          <tr>
            <th scope="row"><center>2</center></th>
            <td>INT206 Software Process</td>
            <td><center>3</center></td>
            <td><center>1</center></td>

          </tr>

          <tr>
            <th scope="row"><center>3</center></th>
            <td>INT206 Software Process</td>
            <td><center>3</center></td>
            <td><center>1</center></td>
          </tr>
          <tr>
            <th scope="row"><center>4</center></th>
            <td>INT206 Software Process</td>
            <td><center>3</center></td>
           <td><center>1</center></td>
          </tr>

          <tr>
            <th scope="row"><center>5</center></th>
            <td>INT206 Software Process</td>
            <td><center>3</center></td>
           <td><center>1</center></td>
          </tr>



        </tbody>
        <tfoot>
                  <tr>
                    <td colspan="5" class="text-center"><p style="float: left;"><center>จำนวนวิชา : 5</center></p></td>
                  </tr>
                  <tr>
                    <td colspan="5" class="text-center"><p style="float: left;"><center>จำนวนหน่วยกิต : 15</center></p></td>
                  </tr>
                </tfoot>
      </table>
      </center>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>


@endsection
@extends('bar.header(student)')

