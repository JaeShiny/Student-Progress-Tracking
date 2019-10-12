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

      &nbsp; &nbsp; &nbsp; <a href='/advisorsurvey/{{$survey->id}}'>เพิ่มคำถาม</a> | <a href="/advisorsurvey/{{$survey->id}}/edit">แก้ไขหัวข้อแบบสำรวจ</a> | <a href="/advisorsurvey/answers/{{$survey->id}}">ดูผลการตอบแบบสำรวจ</a> <a href="/advisorsurvey/{{$survey->id}}/delete" style="float:right; text-decoration: none" class="modal-trigger red-text">ลบแบบสำรวจ &nbsp; &nbsp;</a>
    <!-- Modal Structure -->
    <!-- TODO Fix the Delete aspect -->

<br><br><br>
{{-- &nbsp; &nbsp; &nbsp; &nbsp; <a href='view/{{$survey->id}}'>ทำแบบสำรวจ</a> | <a href="{{$survey->id}}/edit">แก้ไขหัวข้อแบบสำรวจ</a> | <a href="/survey/answers/{{$survey->id}}">ดูผลการตอบแบบสำรวจ</a> <a href="#doDelete" style="float:right; text-decoration: none" class="modal-trigger red-text">ลบแบบสำรวจ &nbsp; &nbsp;</a> --}}
<section class="ftco-section contact-section ftco-degree-bg">
        <div class="container bg-light" style="width: 70%;box-shadow: 5px 5px 8px 4px rgba(50, 50, 50, .5);">
          <div class="row d-flex mb-5 contact-info">
            <div class="col-md-12 mb-4">
                <br>

                <h2 class="h4">&nbsp;&nbsp;{{ $survey->title }}</h2>
                <div class="w-100"></div>
            <div class="col-md-7">
                    <p><span>รายละเอียด :</span>{{ $survey->description }}</p>
                </div>

                    <p><span class="card-title" style="float: right">&nbsp; &nbsp;&nbsp; &nbsp;สร้างโดย: <a href="" style="text-decoration: none">{{ $survey->user->name }}&nbsp;&nbsp;&nbsp;&nbsp;</a></span></p>

                <div class="card-body">
                    {{--
                    <div class="divider" style="margin:20px 0px;"></div>--}}
                    <h5 class="card-title">
          {!! Form::open(array('action'=>array('student\AnswerController@storeAd', $survey->id))) !!}
          @forelse ($survey->questions as $key=>$question)
          &nbsp;  <h6 class="flow-text">คำถามที่ {{ $key+1 }} - {{ $question->title }}</h6>
                @if($question->question_type === 'text')
                  <div class="input-field col s12">
                    <input id="answer" type="text" name="{{ $question->id }}[answer]">
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
      &nbsp;&nbsp;  {{ Form::submit('ตกลง', array('class'=>'btn btn-primary')) }}
        {!! Form::close() !!}
    </div>
  </div>
</section>
@stop

@extends('bar.header(advi)')
