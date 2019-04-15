@extends('bar.footer')
@extends('bar.user')
@extends('bar.header(edu)')
@section('content')
<!DOCTYPE html>
<html>
<head>
<title>หลักสูตรการศึกษา</title>
<link rel="stylesheet"  href="หน้าหลักสูตร.css">
<link rel="stylesheet"  href="csste.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1"  >
  <!-- Styles -->
  <link href="{{ asset('css/project.css') }}" rel="stylesheet">
</head>

<body>

<div class="container" >
  <div class="row" >

   <div class="col-sm">
     <div class="dropdown"><br><br>
  <button class="dropbtn">หลักสูตรระดับปริญญาตรี</button>
  <div class="dropdown-content" >
    <a href="selectyearit.html">สาขาวิชาเทคโนโลยีสารสนเทศ</a>
    <a href="selectyearcs.html">สาขาวิชาวิทยาการคอมพิวเตอร์
 (หลักสูตรภาษาอังกฤษ)</a>
    <a href="selectyeardsi.html">สาขาวิชานวัตกรรมบริการดิจิทัล</a>
  </div>
</div>
 </div>

    <div class="col-sm">
     <div class="dropdown"><br><br>
  <button class="dropbtn">หลักสูตรระดับปริญญาโท</button>
  <div class="dropdown-content">
    <a href="masterselectit.html">สาขาวิชาเทคโนโลยีสารสนเทศ</a>
    <a href="masterselectpse.html">สาขาวิชาวิศวกรรมซอฟต์แวร์</a>
    <a href="masterselectbis.html">สาขาวิชาระบบสารสนเทศทางธุรกิจ</a>
    <a href="masterselectpcs.html">สาขาวิชาวิทยาการคอมพิวเตอร์</a>
    <a href="masterselectmt.html">สาขาวิชาชีวสารสนเทศและ
ชีววิทยาระบบ
 (หลักสูตรนานาชาติ)</a>

  </div>
</div>
    </div>

    <div class="col-sm">
    <div class="dropdown"><br><br>
  <button class="dropbtn">หลักสูตรระดับปริญญาเอก</button>
  <div class="dropdown-content">
    <a href="phdselectit.html">สาขาวิชาเทคโนโลยีสารสนเทศ
 (หลักสูตรภาษาอังกฤษ)</a>
    <a href="phdselectcs.html">สาขาวิชาวิทยาการคอมพิวเตอร์
 (หลักสูตรภาษาอังกฤษ)</a>

  </div>
</div>
    </div>

    <div class="col-sm" >
    <div class="dropdown"><br><br>
  <button class="dropbtn">หลักสูตรระดับประกาศนียบัตร</button>
  <div class="dropdown-content">
    <a href="certificationdsi.html">สาขาวิชานวัตกรรมบริการดิจิทัล</a>
  </div>
</div>
    </div>
  </div>
</div>
</body>

<style>

body {
  font: 14px/20px "Lucida Grande", Tahoma, Verdana, sans-serif; /*ขนาดและชนิดของ font */
  color: #404040;  /*สีของตัวอักษร*/
  background-color: #EFE6E6;   /*ส่วนนี้เป็น สีของพื้นหลัง*/

 margin: 0;

}
body.info{
  background-color: #FFFFFF;
   min-height: 100%;
  min-width: 1024px;
  width: 100%;
  height: auto;
  position: relative;
}

@media screen and (min-width: 75em) {



ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;

    background-color: #1D5287;
}
ul.go {
    color: white;
    background-color: #191818;
    font-size: 13px;
    width: 100%;
    margin: 0;

}
ul.go li a{
    font-size: 15px;
    color: white;
    position: relative;
    left: 700px;

}
li {
    float: left;
}

li a {
    display: block;
    color: white;
    text-align:;
    font-size: 17px;
   padding: 16px;
    text-decoration: none;
}

li a:hover {
    background-color:
}
a{
  text-decoration: none;
}
.dropbtn {
  background-color: #63B290;
  color: black;
  padding: 17px;
  font-size: 20px;
  border: none;

}


.dropdown {
  position: relative;
margin-left: -80px;
  display: inline-block;
}

.dropdown-content {
 display: block;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 10px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 20px 55px;
  text-decoration: none;
  font-size: 15px;
  display: block;
}

.dropdown-content a:hover {background-color: #ddd;}

.dropdown:hover .dropdown-content {display: block;}

.dropdown:hover .dropbtn {background-color: ;}

.bar p {
  width: 50%;
  background-color: #9BB1B2;
  overflow: auto;
  border-radius: 10px;
}
.bar p {

  padding: 10px;
  color: black;
  text-decoration: none;
  font-size:20px;
  text-align: center;
}
.year1{
    float: left;
     width: 13%;
     height: 40px;


  background-color: #FFFFFF;
  overflow: auto;
  border-radius: 10px;
  position: relative;
  left: 300px;

}
.year1{

  padding: 10px;
  color: black;
  text-decoration: none;
  font-size:17px;
  text-align: center;
}
.year2{
    float: right;
     width: 13%;
      height: 40px;

  background-color: #FFFFFF;
  overflow: auto;
  border-radius: 10px;
  position: relative;
  right: 300px;

}
.year2{

  padding: 10px;
  color: black;
  text-decoration: none;
  font-size:17px;
  text-align: center;
}
.year3{
    float: left;
     width: 13%;
      height: 40px;

  background-color: #FFFFFF;
  overflow: auto;
  border-radius: 10px;
  position: relative;
  left: 300px;

}
.year3{

  padding: 10px;
  color: black;
  text-decoration: none;
  font-size:17px;
  text-align: center;
}
.year4{
    float: right;
     width: 13%;
      height: 40px;

  background-color: #FFFFFF;
  overflow: auto;
  border-radius: 10px;
  position: relative;
  right: 300px;

}
.year4{

  padding: 10px;
  color: black;
  text-decoration: none;
  font-size:17px;
  text-align: center;
}
.p2{
    color: black;
    text-decoration: none;

}
.year11{
    float: right;
     width: 13%;
     height: 40px;
     padding: 10px;

  background-color: #FFFFFF;
  overflow: auto;
  border-radius: 10px;
  position: relative;
  right: 600px;
  text-align: center;

}
.pic1{
  float: left;
  position: relative;
  left: 100px;

}
.pic2{
  float: left;
  position: relative;
  left: 150px;

}
.pic3{
  float: left;
  position: relative;
  left: 200px;

}
.pic4{
  float: left;
  position: relative;
  left: 250px;

}
.search-input{
  position: relative;
  left: 50px;

}
.col-1{
  float: left;
  height: 200px;
  width: 180px;
  position: relative;
  left: 250px;
}
.col-11{
  float: left;
  height: 40px;
  width: 180px;
  position: relative;
  left: 0px;
  bottom: -90px;
}
.col-2{
  float: left;
  height: 200px;
  width: 180px;
  position: relative;
  left: 300px;
}
.col-22{
  float: left;
  height: 40px;
  width: 180px;
  position: relative;
  left: 0px;
  bottom: -90px;
}
.col-3{
  float: left;
  height: 200px;
  width: 180px;
  position: relative;
  left: 350px;
}
.col-33{
  float: left;
  height: 40px;
  width: 180px;
  position: relative;
  left: 0px;
  bottom: -90px;
}
.col-4{
  float: left;
  height: 200px;
  width: 180px;
  position: relative;
  left: 400px;
}
.col-44{
  float: left;
  height: 40px;
  width: 180px;
  position: relative;
  left: 0px;
  bottom: -90px;
}
.col-5{
  float: left;
  height: 200px;
  width: 180px;
  position: relative;
  left: 250px;
}
.col-55{
  float: left;
  height: 40px;
  width: 180px;
  position: relative;
  left: 0px;
  bottom: -90px;
}
.col-6{
  float: left;
  height: 200px;
  width: 180px;
  position: relative;
  left: 300px;

}
.col-66{
  float: left;
  height: 40px;
  width: 180px;
  position: relative;
  left: 0px;
  bottom: -90px;
}
#div-1{
   background-color: white;
}
#div-2{
   background-color: white;
}
#div-3{
   background-color: white;
}
#div-4{
   background-color: white;
}
#div-5{
   background-color: white;
}
#div-6{
   background-color: white;
}
#div-11{
  background-color: #74BCB7;
}
#div-22{
  background-color: #74BCB7;
}
#div-33{
  background-color: #74BCB7;
}
#div-44{
  background-color: #74BCB7;
}
#div-55{
  background-color: #74BCB7;
}
#div-66{
  background-color: #74BCB7;
}
div.name {
  position: relative;
  left: 0px;
    color: black;
    font-size: 25px;
    width: 280px;
    padding: 10px;
    border: 5px solid #9BB1B2;
    margin: 0;
    background-color: #9BB1B2;
}
div.info{/*ข้อมูลนักศึกษา*/


    color: black;
    height: 70px;
    font-size: 25px;

    border: 5px solid #9BB1B2;
    margin: 0;
    background-color: #9BB1B2;
}
div.info a {
  float: right;
  color: black;
  text-align: center;
  padding: 14px 20px;
  text-decoration: none;
  font-size: 17px;
  bottom: 100px;


}


.info a:hover {
  background-color: #ddd; /*เวลาชี้*/
  color: black;
}

.info a.active {
  background-color:#547DDC;
  color: black;
  bottom: -50px;
  margin: 0px;
  border-radius: 10px;

}
a.active10{
  margin: 0px;
}


.info a.active1  {
  background-color:#B4BCF5;
  color: black;
  margin-right: 20px;
  margin: 15px;
  border-radius: 10px;
}
.info a.active2  {
  background-color:#B4BCF5;
  color: black;
  margin-right: 20px;
  margin: 15px;
  border-radius: 10px;
}
.info a.active3  {
  background-color:#B4BCF5;
  color: black;
  margin-right: 20px;
  margin: 15px;
  border-radius: 10px;
}
.info a.active4  {
  background-color:#B4BCF5;
  color: black;
  margin-right: 20px;
  margin: 15px;
  border-radius: 10px;
}

table{/*รายชื่อนักศึกษา*/

  border-color: #FFFFFF;
  border-spacing: 5;
  padding: 20px;
  margin: 100px;
  position: relative;
  bottom: 50px;


}
th, td {
  color:black;
    border-bottom: 1px solid #ddd;
    border-collapse: collapse;

}
 font-family: Arial;
}

* {
  box-sizing: border-box;
}

form.example input[type=text] {/*ปุ่มค้นหา*/
  padding: 10px;
  font-size: 17px;
  border: 1px solid grey;
  float: left;
  width: 72%;
  background: #f1f1f1;
  position: relative;
  left: 420px;
  bottom: 40px;

}

form.example button {
  float: right;
  width: 20%;
  padding: 10px;
  background: #2196F3;
  color: white;
  font-size: 17px;
  border: 1px solid grey;
  border-left: none;
  cursor: pointer;
  position: relative;
  left: 400px;
  bottom: 40px;
}
* {box-sizing: border-box;}/*กล่องใส่รูปประวัติ*/

.container1 {
  position: relative;
  left: 60px;
  width: 50%;
  max-width: 300px;

}

.image {
  display: block;
  width: 45%;
  height: auto;
}

.overlay {
  position: absolute;
  bottom: 0;
  background: rgb(0, 0, 0);
  background: rgba(0, 0, 0, 0.5); /* Black see-through */
  color: #f1f1f1;
  width: 100%;
  transition: .5s ease;
  opacity:0;
  color: white;
  font-size: 20px;
  padding: 20px;
  text-align: center;
}
.add img{
  width: 40px;
  height: 40px;
  position: relative;
  left: 200px;
  bottom: 40px;

}
/*.p{
  position: relative;
  left: 250px;
  bottom: 75px;
}
.p0{
  position: relative;
  left: 100px;
  bottom: 50px;
}
.p1{
  position: relative;
  left: 450px;
  bottom: 115px;
}
div.a2{
  position: relative;
  left: 495px;
  bottom: 148px;
}
div.a1{
  position: relative;
  left: 185px;
  bottom: 82px;
}
.p2{
  position: relative;
  left: 850px;
  bottom: 183px;
}
div.a3{
 position: relative;
  left: 893px;
  bottom: 216px;
}
.p3{
  position: relative;
  left: 100px;
  bottom: 183px;
}
div.a4{
 position: relative;
  left: 140px;
  bottom: 216px;
}
.p4{
  position: relative;
  left: 450px;
  bottom: 247px;
}
div.a5{
 position: relative;
  left: 550px;
  bottom: 280px;
}
.p5{
  position: relative;
  left: 850px;
  bottom: 315px;
}
div.a6{
 position: relative;
  left: 950px;
  bottom: 348px;
}
.p6{
  position: relative;
  left: 850px;
  bottom: 315px;
}
div.a7{
 position: relative;
  left: 950px;
  bottom: 348px;
}
.p7{
  position: relative;
  left: 450px;
  bottom: 378px;
}
div.a8{
 position: relative;
  left: 550px;
  bottom: 410px;
}*/
div.in1 p{
  position: relative;
 left: 100px;
  display: inline;
bottom: -50px;
}
div.in2 p{
  position: relative;
 left: 100px;
  display: inline;
bottom: -100px;
}
div.in3 p{
  position: relative;
 left: 100px;
  display: inline;
bottom: -150px;
}
div.in4 p{
  position: relative;
 left: 100px;
  display: inline;
bottom: -200px;
}
div.in5 p{
  position: relative;
 left: 100px;
  display: inline;
bottom: -250px;
}
div.in6 p{
  position: relative;
 left: 100px;
  display: inline;
bottom: -300px;
}
div.in7 p{
  position: relative;
 left: 100px;
  display: inline;
bottom: -350px;
}

a{
  text-decoration: none;
}
div.in9 a{
  position: relative;
 left: 50px;
  display: inline;
bottom: -450px;
}
div.in10 a{
  position: relative;
 left: 300px;
  display: inline;
bottom: -350px;
}
div.in21 p{
  position: relative;
 left: 300px;
  display: inline;
bottom: -50px;
}
.block-1 {
  width: 250px;
  height: 200px;
  margin: 20px;
  background: #FFFFFF;
  float: left;
  position: relative;
  left: 200px;

}
.block-2 {
  width: 300px;
  height: 200px;
  margin: 20px;
  background: #FFFFFF;
  float: right;
  position: relative;
  right: 370px;
}
div.in22 p{
  position: relative;
 left: 30px;
  display: inline;
bottom: -50px;
}
div.in23 p{
  position: relative;
right: 0px;
  display: inline;
bottom: 115px;
}
div.in13 a{
  position: relative;
 left: 50px;
  display: inline;
  bottom: -350px;

}
div.in22 textarea{
  position: relative;
  left: 120px;
}
div.foot {
position: absolute;
left: 600px;
bottom: -500px;

}
div.in20  {

 bottom: -250px;
 position: absolute;
 right: 150px;

}
div.in20 p{
  display: inline;
}
.container2 {
  position: relative;
  float: right ;
  left: 600px;
  width: 100%;
  max-width: 300px;
  bottom: -10px;

}
div.foot3 {
position: absolute;
left: 600px;
bottom: -400px;

}
div.foot2 {
position: absolute;
left: 600px;
bottom: -450px;

}
.button2{
  position: relative;
  left: 100px;
  width: 150px;
  border-radius: 5px;
  border-width: 10px;
  bottom: -80px;
}
div.in27 p {

  position: relative;
left: 1025px;
  display: inline;
bottom: -180px;
}
.button3{
  position: relative;
  left: 100px;
  width: 150px;
   border-radius: 5px;
  border-width: 10px;
  bottom: -80px;
}.button4{
  position: relative;
  left: 100px;
  width: 150px;
   border-radius: 5px;
  border-width: 10px;
  bottom: -80px;
}

div.foot4 {
position: absolute;
left: 600px;
bottom: 0px;

}
.bar2 {
  width: 15%;
  height: 30px;
  background-color: #9999FF;
  overflow: auto;
  border-radius: 10px;
  position: relative;
  left: 50px;

}
.bar2 {

  padding: 4px;
  color: black;
  text-decoration: none;
  font-size:20px;
  text-align: center;

}
.bar4 {
  width: 20%;
  height: 30px;
  background-color: #9999FF;
  overflow: auto;
  border-radius: 10px;
  position: relative;
  left: 50px;

}
.bar4 {

  padding: 4px;
  color: black;
  text-decoration: none;
  font-size:20px;
  text-align: center;

}
.content {
 background-color: #FFFFFF;


}
.content1 p{
  display: inline;

}
.content1{
  margin: 0px;
  padding: 30px;
  background-color: #DCDCDC;

}
.content2 table {

  border-collapse: collapse;
  width: 100%;
  margin:  0px;



}
.content2{
   background-color:

margin: 100px 0px;
padding: 30px;
height: 100%;
position: relative;
   bottom: 50px;



}


td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px ;


}

tr:nth-child(even) {
  background-color: #dddddd;
}
.container3 img{
  position: relative;
  float: right ;
  right: 100px;
  width: 100%;
  max-width: 120px;
  bottom: 270px;


}
form.INPUT {
  position: relative;
  float: left;
  left: 0px;

}
 textarea{
  height: 80px;
  width: 250px;

}
.container4 img{
  position: relative;
  float: right ;
  right: 100px;
  width: 100%;
  max-width: 100px;
  bottom: 120px;

}

* { margin: 0; padding: 0; }
#all{ width:100%; height:100%; margin:0px auto; position:relative; }
#header{ background-color: #63B290; height:300px; padding:8px; width: 100%; }
#left{ background-color:#63B290; height:100%; width:300px; position:absolute;padding: 15px; left: 500px; bottom: -0px; }
#content{ position:absolute; margin:0 250px 0 200px; padding:8px; float: left; left: -150px; }
#right{ background-color:; height:100%; width:250px; position:absolute; right: 60px; display: inline;  }
#footer{ position:absolute; background-color:  height:100px; text-align:center; bottom:-420px; width:100%; }
}
.content6 table {

  border-collapse: collapse;

  width: 100%;
  margin:  0px;


}
.content6{
   background-color:

margin: 100px 50px;
padding: 30px;
height: 100%;

position: relative;
   bottom: 50px;

}
.in25 p  {

  position: relative;
float: right;

display: inline;
bottom: 150px;
}
}
</style>

</html>
@endsection
