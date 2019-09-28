
@extends('bar.body')

@section('content')

<div class="container">
        <div class="row">
          <div class="col-sm">

          </div>
          <div class="col-sm-5">
                <div class="card bg-light mb-3" style="max-width: 24rem;">
                    <br>
                        <center> <div class="card-header"><h4>ชุดแบบสอบถาม</h4></div></center>

                       </div>
          </div>
          <div class="col-sm">

          </div>
        </div>
      </div>

      <a href="/survey/adlecnew" style="float:right; text-decoration: none" class="modal-trigger red-text">สร้างแบบสำรวจ &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;</a>


<br>



<div class="container">
        <div class="row">

          <div class="col-12">

                <div class="media">

                        <div class="media-body">

                          <div class="card-body">
                                @foreach($survey as $show)
                                <div class="alert alert-primary" role="alert">
                                        <a href="/adlecsurvey/answers/{{$show->id}}">{{$show->title}}</a> (วิชาINT 204)  <a href="/adlecsurvey/answers/{{$show->id}}" class="alert-link" style="float: right">ดูผลการตอบแบบสอบถาม</a> <br ><a href="/adlecsurvey/{{$show->id}}" class="alert-link" style="float: right;color: red">แก้ไขแบบสอบถาม</a>
                                       <footer class="blockquote-footer">{{$show->user->name}} &nbsp; {{$show->user->lastname}}  &nbsp; {{$show->user->position}} </footer>
                                     </div>

                                     @endforeach





                        </div>
                        </div>
                      </div>


          </div>

        </div>
      </div>




<br><br><br>



{{--
<table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">ชื่อแบบสอบถาม</th>
            <th>แก้ไข</th>
          </tr>
        </thead>
        <tbody>
            @foreach($survey as $show)
          <tr>
          <th scope="row">{{$loop->iteration}}</th>
          <td><a href="/adlecsurvey/answers/{{$show->id}}">{{$show->title}}</a></td>
          <td><a href="/adlecsurvey/{{$show->id}}">แก้ไข</a></td>
          </tr>


          @endforeach
        </tbody>
</table>
--}}
@stop

@extends('bar.header(AdLec)')
