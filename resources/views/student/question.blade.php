@extends('bar.body')
@section('content')

<!DOCTYPE html>
<html>

<head>
    <title>แบบสอบถาม</title>
    <link rel="stylesheet" href="csste.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li> </li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            {{-- <li class="breadcrumb-item active" aria-current="page"><a href="">ประวัตินักศึกษา</a></li> --}}
            <li class="breadcrumb-item active" aria-current="page"><a href="">แบบสอบถาม</a></li>
        </ol>
    </nav>

</head>
<body>


        <ul class="nav nav-tabs" id="myTab" role="tablist" style="background-color: #FFFFFF;">
                <li class="nav-item">
                    <a class="nav-link active" href="แบบสอบถามนักศึกษา.html" style="color: #000000;">
                         แบบสอบถามก่อนเข้าศึกษา
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="แบบสอบถามขณะเรียน.html" style="color: #000000;">
                         แบบสอบถามขณะเข้าศึกษา
                    </a>
                </li>
                 <li class="nav-item">
                    <a class="nav-link" href="แบบสอบถามหลังจบ.html" style="color: #000000;">
                         แบบสอบถามหลังจบการศึกษา
                    </a>
                </li>
            </ul>

    <br>
    <div class="container">
      <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
          <h4 align="center">แบบสอบถามความคิดเห็นของนักศึกษา</h4>
          <p>แบบสอบถามนี้สร้างขึ้นเพื่อเก็บข้อมูลความคิดเห็นและความพึงพอใจของนักศึกษาและนำไปวิเคราะห์เพื่อเป็นประโยชน์ในอนาคต</p>
          <form id="formq" name="formq" method="post" action="q_db.php">
              <br>
              <br>
            <table width="100%" border="1" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td width="75%" rowspan="2" align="center"><strong><center>รายการ</center></strong></td>
                <td colspan="5" align="center"><strong>ระดับความคิดเห็น</strong></td>
              </tr>
              <tr>
                <td width="5%" align="center"><strong>5</strong></td>
                <td width="5%" align="center"><strong>4</strong></td>
                <td width="5%" align="center"><strong>3</strong></td>
                <td width="5%" align="center"><strong>2</strong></td>
                <td width="5%" align="center"><strong>1</strong></td>
              </tr>
              <tr>
                <td height="30" colspan="6" bgcolor="#99CCFF"><strong>ก่อนเข้าศึกษา</strong></td>
              </tr>
              <tr>
                <td height="30">&nbsp; 1.ได้ศึกษาข้อมูลเกี่ยวกับการเรียนในคณะก่อนเข้ามาเรียน</td>
                <td height="30" align="center"><input type="radio" name="a1"  value="5" required="required" /></td>
                <td height="30" align="center"><input type="radio" name="a1"  value="4" /></td>
                <td height="30" align="center"><input type="radio" name="a1"  value="3" /></td>
                <td height="30" align="center"><input type="radio" name="a1"  value="2" /></td>
                <td height="30" align="center"><input type="radio" name="a1"  value="1" /></td>
              </tr>
              <tr>
                <td height="30">&nbsp; 2.ความสนใจเกี่ยวกับคณะเทคโนโลยีสารสนเทศ</td>
                <td width="5%" height="30" align="center"><input type="radio" name="a2"  value="5" required="required" /></td>
                <td width="5%" height="30" align="center"><input type="radio" name="a2"  value="4"/></td>
                <td width="5%" height="30" align="center"><input type="radio" name="a2"  value="3"/></td>
                <td width="5%" height="30" align="center"><input type="radio" name="a2"  value="2"/></td>
                <td width="5%" height="30" align="center"><input type="radio" name="a2"  value="1"/></td>
              </tr>
              <tr>
                <td height="30">&nbsp; 3.ต้องการเข้าเรียนคณะนี้</td>
                <td width="5%" height="30" align="center"><input type="radio" name="a3"  value="5" required="required" /></td>
                <td width="5%" height="30" align="center"><input type="radio" name="a3"  value="4"/></td>
                <td width="5%" height="30" align="center"><input type="radio" name="a3"  value="3"/></td>
                <td width="5%" height="30" align="center"><input type="radio" name="a3"  value="2"/></td>
                <td width="5%" height="30" align="center"><input type="radio" name="a3"  value="1"/></td>
              </tr>
              <tr>
                <td height="30">&nbsp; 4.อยากทำงานในมหาวิทยาลัยเพื่อหารายได้เพิ่มหรือไม่</td>
                <td width="5%" height="30" align="center"><input type="radio" name="a4"  value="5" required="required" /></td>
                <td width="5%" height="30" align="center"><input type="radio" name="a4"  value="4"/></td>
                <td width="5%" height="30" align="center"><input type="radio" name="a4"  value="3"/></td>
                <td width="5%" height="30" align="center"><input type="radio" name="a4"  value="2"/></td>
                <td width="5%" height="30" align="center"><input type="radio" name="a4"  value="1"/></td>
              </tr>
               <tr>
                <td height="30">&nbsp; 5.ความถนัดในการเขียนโปรแกรม</td>
                <td width="5%" height="30" align="center"><input type="radio" name="a5"  value="5" required="required" /></td>
                <td width="5%" height="30" align="center"><input type="radio" name="a5"  value="4"/></td>
                <td width="5%" height="30" align="center"><input type="radio" name="a5"  value="3"/></td>
                <td width="5%" height="30" align="center"><input type="radio" name="a5"  value="2"/></td>
                <td width="5%" height="30" align="center"><input type="radio" name="a5"  value="1"/></td>
              </tr>

            </table>
            <br>
            <b style="position: relative; float: right;right: 47.5%">ตอนที่ 2  หลังจบการศึกษาอยากทำงานอะไร</b>
            <textarea name="detail" cols="78" rows="3" id="detail" style="position: relative;float: right; right:11%"></textarea>
            <br>
            <br>
            <br>
            <br>
            <br>

             <b style="position: relative; float: right;right: 52%"> ตอนที่ 3  ทำไมจึงอยากเข้าศึกษาคณะนี้ </b>
            <textarea name="detail" cols="78" rows="3" id="detail" style="position: relative;float: right; right: 11%"></textarea>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <button type="submit" name="save" class="btn btn-primary"style="position: relative; float: right;right: 80%" >บันทึก</button>
          </form>
          <br /><br/>
        </div>
      </div>
    </div>

      </tbody>
    </table>


</body>

</html>

@endsection
@extends('bar.header(student)')
