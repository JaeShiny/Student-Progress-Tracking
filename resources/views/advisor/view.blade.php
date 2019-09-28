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

<div class="col-sm" style="background-color:#669999; margin-top: px; padding: 5px;">
    <span class="card-title"> <h4> &nbsp; &nbsp;&nbsp;{{ $survey->title }} ({{ $survey->description }})</h4></span></div>

{{-- &nbsp; &nbsp; &nbsp; &nbsp; <a href='view/{{$survey->id}}'>ทำแบบสำรวจ</a> | <a href="{{$survey->id}}/edit">แก้ไขหัวข้อแบบสำรวจ</a> | <a href="/survey/answers/{{$survey->id}}">ดูผลการตอบแบบสำรวจ</a> <a href="#doDelete" style="float:right; text-decoration: none" class="modal-trigger red-text">ลบแบบสำรวจ &nbsp; &nbsp;</a> --}}
<div class="jumbotron jumbotron-fluid" style="background-color: #CCCCFF; padding: 60px 5px 40px 5px">
    <div class="container">
        <div class="card">
            <div class="card-content">

                <h5 class="card-header">&nbsp;เริ่มทำแบบสำรวจ : </span><span class="flow-text">{{ $survey->title }} ( {{ $survey->description }})</h5>
                <p>
                    <p><span class="card-title" style="float: right">&nbsp; &nbsp;&nbsp; &nbsp;สร้างโดย: <a href="" style="text-decoration: none">{{ $survey->user->name }}&nbsp;&nbsp;&nbsp;&nbsp;</a></span></p>
                </p>
                <div class="card-body">
                    {{--
                    <div class="divider" style="margin:20px 0px;"></div>--}}
                    <h6 class="card-title">
          {!! Form::open(array('action'=>array('student\AnswerController@storeAd', $survey->id))) !!}
          @forelse ($survey->questions as $key=>$question)
          &nbsp;  <h6 class="flow-text">Question {{ $key+1 }} - {{ $question->title }}</h6>
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
@stop

@extends('bar.header(advi)')
