
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
            {{-- <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="btn-group">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">เทอม/ปีการศึกษา<span class="caret"></span></button>
                            <ul class="dropdown-menu scrollable-menu" role="menu">
                                @foreach($surveys as $show)
                                <li> <a class="dropdown-item" href="/lecsurvey/{{$show->semester}}/{{$show->year}}">{{$show->semester}}/{{$show->year}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div> --}}
    <br><br><br><br>
          </div>
        </div>
      </div>

      <a href="/survey/new" style="float:right; text-decoration: none" class="modal-trigger red-text">สร้างแบบสำรวจ &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;</a>


<br>



<div class="container">
        <div class="row">

          <div class="col-12">

                <div class="media">

                        <div class="media-body">

                          <div class="card-body">
                                @foreach($survey as $show)
                                <div class="alert alert-primary" role="alert">
                                <a href="/survey/answers/{{$show->id}}">{{$show->title}}</a>   <a href="/survey/answers/{{$show->id}}" class="alert-link" style="float: right">ดูผลการตอบแบบสอบถาม</a> <br ><a href="/survey/{{$show->id}}" class="alert-link" style="float: right;color: red">แก้ไขแบบสอบถาม</a>
                                       <footer class="blockquote-footer">{{Auth::user()->name}} &nbsp; {{Auth::user()->lastname}}</footer>
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
          <td><a href="/survey/answers/{{$show->id}}">{{$show->title}}</a></td>
          <td><a href="/survey/{{$show->id}}">แก้ไข</a></td>
          </tr>


          @endforeach
        </tbody>
</table>
--}}
@stop

@extends('bar.header(lec)')
