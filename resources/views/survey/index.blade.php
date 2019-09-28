
@extends('bar.body')

@section('content')


<br><br>


<div class="container">
        <div class="row">
          <div class="col-sm">

          </div>
          <div class="col-sm-5">
                <div class="card bg-light mb-3" style="max-width: 24rem;">
                        <center> <div class="card-header"><h4>ชุดแบบสอบถาม</h4></div></center>

                       </div>
          </div>
          <div class="col-sm">

          </div>
        </div>
      </div>



<br>
{{--
<div class="container">
    <div class="row">
      <div class="col-sm">

        <div class="card" style="width: 18rem;">
            <img src="../img/survey.jpg" class="card-img-top" alt="...">
            <div class="card-body">
                    <h6>โดย : อ.สนิท ศิริสวัสดิ์วัฒนา</h6>
                <hr class="my-0">
              <h5 class="card-title">แบบสอบถามความคิดเห็นในห้องเรียน</h5>
              <p class="card-text">(วิชาINT 204)</p>
              <a href="#" class="btn btn-secondary">ดูผลการตอบแบบสอบถาม</a><br>

            </div>
          </div>



      </div>
      <div class="col-sm">


        <div class="card" style="width: 18rem;">
            <img src="../img/survey.jpg" class="card-img-top" alt="...">
            <div class="card-body">
                    <h6>โดย : อ.สนิท ศิริสวัสดิ์วัฒนา</h6>
                    <hr class="my-0">
              <h5 class="card-title">แบบสอบถามความพึงพอใจในการจัดตารางสอน</h5>
              <p class="card-text">(เฉพาะนักศึกษาชั้นปีที่2)</p>
              <br><a href="#" class="btn btn-secondary">ดูผลการตอบแบบสอบถาม</a>
            </div>
          </div>



      </div>
      <div class="col-sm">


        <div class="card" style="width: 18rem;">
            <img src="../img/survey.jpg" class="card-img-top" alt="...">
            <div class="card-body">
                    <h6>โดย : อ.สนิท ศิริสวัสดิ์วัฒนา</h6>
                    <hr class="my-0">
              <h5 class="card-title">แบบสอบถามความพึงพอใจการเก็บคะแนน</h5>
              <p class="card-text">(วิชาINT 204)</p>
              <br><a href="#" class="btn btn-primary">แก้ไขแบบสอบถาม</a>
            </div>
          </div>



      </div>
    </div>
  </div>


--}}


<div class="container">
        <div class="row">

          <div class="col-12">

                <div class="media">

                        <div class="media-body">

                          <div class="card-body">
                                @foreach($survey as $show)
                                @if($show->check->where('user_id',Auth::id())->count() > 0)
                                <div class="alert alert-primary" role="alert">
                                        <a href="/studentsurvey/answers/{{$show->id}}">{{$show->title}}</a>  <a href="/studentsurvey/answers/{{$show->id}}" class="alert-link" style="float: right">ดูผลการตอบแบบสอบถาม</a><br>
                                <footer class="blockquote-footer">โดย : {{$show->user->name}} &nbsp; {{$show->user->lastname}} &nbsp; {{$show->user->position}} </footer>
                                     </div>
                                     @else
                                                  <div class="spinner-grow text-danger" role="status">
                                                        <span class="sr-only"> </span>
                                                      </div>
                                                  <div class="alert alert-primary" role="alert">
                                                        <a href="/studentsurvey/view/{{$show->id}}">{{$show->title}}</a>  <a href="/studentsurvey/view/{{$show->id}}" class="alert-link" style="float: right">ตอบแบบสอบถาม</a><br>
                                                        <footer class="blockquote-footer">โดย : {{$show->user->name}} &nbsp; {{$show->user->lastname}} &nbsp; {{$show->user->position}}</footer>
                                                      </div>

                                                      @endif
                                                      @endforeach

                        </div>
                        </div>
                      </div>


          </div>

        </div>
      </div>




{{--

<table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">ชื่อแบบสอบถาม</th>
            <th>สถานะ</th>
          </tr>
        </thead>
        <tbody>
            @foreach($survey as $show)
          <tr>
          <th scope="row">{{$loop->iteration}}</th>
          @if($show->check->where('user_id',Auth::id())->count() > 0)
          <td><a href="/survey/answers/{{$show->id}}">{{$show->title}}</a></td>
          @else
          <td><a href="/survey/view/{{$show->id}}">{{$show->title}}</a></td>
          @endif
          @if($show->check->where('user_id',Auth::id())->count() > 0)
          <td>ทำแบบสอบถามแล้ว</td>

          @else
          <td>ยังไม่ได้ทำ</td>
          @endif
          </tr>


          @endforeach
        </tbody>
</table>
--}}
@stop
@extends('bar.header(student)')



