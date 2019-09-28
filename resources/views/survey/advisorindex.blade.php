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

      <a href="/survey/advisornew" style="float:right; text-decoration: none" class="modal-trigger red-text">สร้างแบบสำรวจ &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;</a>


<br>



<div class="container">
        <div class="row">

          <div class="col-12">

                <div class="media">

                        <div class="media-body">

                          <div class="card-body">
                                @foreach($survey as $show)
                                <div class="alert alert-primary" role="alert">
                                        <a href="/advisorsurvey/answers/{{$show->id}}">{{$show->title}}</a> <a href="/advisorsurvey/answers/{{$show->id}}" class="alert-link" style="float: right">ดูผลการตอบแบบสอบถาม</a> <br ><a href="/edusurvey/{{$show->id}}" class="alert-link" style="float: right;color: red">แก้ไขแบบสอบถาม</a>
                                       <footer class="blockquote-footer">โดย : {{Auth::user()->name}} &nbsp; {{Auth::user()->lastname}}</footer>
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
          {{-- @if($show->check->where('user_id' == 4)) --}}
          {{--
          <td><a href="/advisorsurvey/answers/{{$show->id}}">{{$show->title}}</a></td>
          <td><a href="/advisorsurvey/{{$show->id}}">แก้ไข</a></td>
          </tr>
          {{-- @endif --}}
          {{--
          @endforeach
        </tbody>
</table>
--}}
{{-- <p>ไม่มีแบบสอบถาม</p> --}}
@stop

@extends('bar.header(advi)')
