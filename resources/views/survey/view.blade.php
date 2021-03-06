
{{-- @extends('bar.body')

@section('content')
  <div class="card">
      <div class="card-content">
      <span class="card-title"> Start taking Survey</span>
      <p>
        <span class="flow-text">{{ $survey->title }}</span> <br/>
      </p>
      <p>
        {{ $survey->description }}
        <br/>Created by: <a href="">{{ $survey->user->name }}</a>
      </p>
      <div class="divider" style="margin:20px 0px;"></div>
          {!! Form::open(array('action'=>array('student\AnswerController@store', $survey->id))) !!}
          @forelse ($survey->questions as $key=>$question)
            <p class="flow-text">Question {{ $key+1 }} - {{ $question->title }}</p>
                @if($question->question_type === 'text')
                  <div class="input-field col s12">
                    <input id="answer" type="text" name="{{ $question->id }}[answer]">
                    <label for="answer">Answer</label>
                  </div>
                @elseif($question->question_type === 'textarea')
                  <div class="input-field col s12">
                    <textarea id="textarea1" class="materialize-textarea" name="{{ $question->id }}[answer]"></textarea>
                    <label for="textarea1">Textarea</label>
                  </div>
                @elseif($question->question_type === 'radio')
                  @foreach($question->option_name as $key=>$value)
                    <p style="margin:0px; padding:0px;">
                      <input name="{{ $question->id }}[answer]" type="radio" id="{{ $key }}" />
                      <label for="{{ $key }}">{{ $value }}</label>
                    </p>
                  @endforeach
                @elseif($question->question_type === 'checkbox')
                  @foreach($question->option_name as $key=>$value)
                  <p style="margin:0px; padding:0px;">
                    <input type="checkbox" id="something{{ $key }}" name="{{ $question->id }}[answer]" />
                    <label for="something{{$key}}">{{ $value }}</label>
                  </p>
                  @endforeach
                @endif
              <div class="divider" style="margin:10px 10px;"></div>
          @empty
            <span class='flow-text center-align'>Nothing to show</span>
          @endforelse
        {{ Form::submit('Submit Survey', array('class'=>'btn waves-effect waves-light')) }}
        {!! Form::close() !!}
    </div>
  </div>
@stop

@extends('bar.header(student)') --}}



@extends('bar.body')
@section('content')

<div class="card-content">
    <div class="col-sm" style="margin-top: px; padding: 5px;">
    <span class="card-title"> <h4> &nbsp; {{ $survey->title }} </h4> <h6>&nbsp;&nbsp;&nbsp; รายละเอียด : {{ $survey->description }}</h6></span></div>
    <hr style="margin-top: 0%">

    &nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-white" style="box-shadow: 1px 1px 2px 1px rgba(50, 50, 50, .5);">
            <a href='/survey/{{$survey->id}}'style="text-decoration: none">เพิ่มคำถาม</a> <span class="badge badge-light"><img src={{ URL::asset("../img/add.png") }} style="width: 1rem"></span>

          </button>



      &nbsp;&nbsp;&nbsp; <button type="button" class="btn btn-white" style="box-shadow: 1px 1px 2px 1px rgba(50, 50, 50, .5);">
            <a href="/survey/{{$survey->id}}/edit" style="text-decoration: none">แก้ไขหัวข้อแบบสอบถาม</a> <span class="badge badge-light"><img src={{ URL::asset("../img/th.png") }} style="width: 1rem"></span>

          </button>

          &nbsp;&nbsp;&nbsp; <button type="button" class="btn btn-white" style="box-shadow: 1px 1px 2px 1px rgba(50, 50, 50, .5);">
                <a href="/survey/answers/{{$survey->id}}" style="text-decoration: none">ดูผลการตอบแบบสำรวจ</a> <span class="badge badge-light"><img src={{ URL::asset("../img/see.jpg") }} style="width: 1rem"></span>

              </button>


          <button type="button" class="btn btn-white" style="box-shadow: 1px 1px 2px 1px rgba(50, 50, 50, .5); position: relative; float: right;right: 2%">
                <a href="/survey/{{$survey->id}}/delete" style="text-decoration: none" class="modal-trigger red-text">ลบแบบสำรวจ</a>

              </button>

    {{--  &nbsp; &nbsp; &nbsp; <a href='/survey/{{$survey->id}}'>เพิ่มคำถาม</a> | <a href="/survey/{{$survey->id}}/edit">แก้ไขหัวข้อแบบสำรวจ</a> | <a href="/survey/answers/{{$survey->id}}">ดูผลการตอบแบบสำรวจ</a> <a href="/survey/{{$survey->id}}/delete" style="float:right; text-decoration: none" class="modal-trigger red-text">ลบแบบสำรวจ &nbsp; &nbsp;</a>--}}
    <!-- Modal Structure -->
    <!-- TODO Fix the Delete aspect -->

<br><br><br>
{{-- &nbsp; &nbsp; &nbsp; &nbsp; <a href='view/{{$survey->id}}'>ทำแบบสำรวจ</a> | <a href="{{$survey->id}}/edit">แก้ไขหัวข้อแบบสำรวจ</a> | <a href="/survey/answers/{{$survey->id}}">ดูผลการตอบแบบสำรวจ</a> <a href="#doDelete" style="float:right; text-decoration: none" class="modal-trigger red-text">ลบแบบสำรวจ &nbsp; &nbsp;</a> --}}
<section class="ftco-section contact-section ftco-degree-bg">
        <div class="container">
<div class="row">
        <div class="col-sm-2"></div>
    <div class="col-sm-8">

                <br>
                <div class="form-group" style="background-color:#E6E6E6;margin-top: -2%;box-shadow: 5px 5px 8px 4px rgba(50, 50, 50, .5);">
                    <div class="card mb-3" style="max-width: 70rem; background-color: #FFFFFF;border-bottom-color: teal">
                            <div class="card-header"> <h2 class="h4">{{ $survey->title }}</h2><p>รายละเอียด : {{ $survey->description }}</p></div>


                           </div>


                    <p><span class="card-title" style="float: right">&nbsp; &nbsp;&nbsp; &nbsp;สร้างโดย: <a href="" style="text-decoration: none">{{ $survey->user->name }}&nbsp;&nbsp;&nbsp;&nbsp;</a></span></p>

                <div class="card-body">
                    {{--
                    <div class="divider" style="margin:20px 0px;"></div>--}}
                    <h5 class="card-title">
          {!! Form::open(array('action'=>array('student\AnswerController@store', $survey->id))) !!}
          @forelse ($survey->questions as $key=>$question)
          &nbsp;  <h6 class="flow-text">คำถามที่ {{ $key+1 }} - {{ $question->title }}</h6>
                @if($question->question_type === 'text')
                  <div class="input-field col s12">
                    <input id="answer" type="text" name="{{ $question->id }}[answer]" style="width: 80%">
                    <label for="answer"><h6>คำตอบ</h6></label>
                  </div>
                @elseif($question->question_type === 'textarea')
                  <div class="input-field col s12">
                    <textarea id="textarea1" class="materialize-textarea" name="{{ $question->id }}[answer]"></textarea>
                    <label for="textarea1"><h6>คำตอบ</h6></label>
                  </div>
                  @elseif($question->question_type === 'radio')
                  @foreach($question->choice as $show_choice)
                  <label>{{$show_choice->choice_name}}</label><input type="checkbox" value="{{$show_choice->id}}">
                  @endforeach
                  </p>
                  @elseif($question->question_type === 'checkbox')
                  @foreach($question->choice as $show_choice)
                  <label>{{$show_choice->choice_name}}</label><input type="checkbox" value="{{$show_choice->id}}">
                  @endforeach
                   @endif
              <div class="divider" style="margin:10px 10px;"></div>
          @empty
            <span class='flow-text center-align'>Nothing to show</span>
          @endforelse
          <div style="position: relative; float: right;">
      &nbsp;&nbsp;  {{ Form::submit('ตกลง', array('class'=>'btn btn-primary')) }}
          </div>
        {!! Form::close() !!}
        <br><br>
    </div>
    <div class="col-sm-2"></div>
  </div>

</section>
<br><br>
@stop

@extends('bar.header(lec)')
