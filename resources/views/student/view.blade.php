{{--
@extends('bar.body')
@section('content')

<div class="card-content">
    <div class="col-sm" style="margin-top: px; padding: 5px;">
    <span class="card-title"> <h4> &nbsp; {{ $survey->title }} </h4> <h6>&nbsp;&nbsp;&nbsp; รายละเอียด : {{ $survey->description }}</h6></span></div>
    <hr style="margin-top: 0%">

<br><br><br>

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
          {{-- {!! Form::open(array('action'=>array('student\AnswerController@storeStudent', $survey->id))) !!}
          @foreach($questionme as $show_question)

          &nbsp;  <h6 class="flow-text">คำถามที่ {{$loop->iteration}} </h6>
          <h2>{{$show_question->title}}</h2>
                @if($show_question->question_type === 'text')
                  <div class="input-field col s12">
                    <input id="answer" type="text" name="text" value="" style="width: 80%">
                    <input type="hidden" name="question_id" value="{{$show_question->id}}">
                    <label for="answer"><h6>คำตอบ</h6></label>
                  </div>
                @elseif($show_question->question_type === 'textarea')
                  <div class="input-field col s12">
                    <textarea id="textarea1" class="materialize-textarea" value="" name="textarea" ></textarea>
                    <input type="hidden" name="question_id" value="{{$show_question->id}}">
                    <label for="textarea1"><h6>คำตอบ</h6></label>
                  </div>
                  @elseif($show_question->question_type === 'radio')
                  @foreach($show_question->choice as $show_choice)
                  <label>{{$show_choice->choice_name}}</label><input type="radio" name="radio" value="{{$show_choice->choice_id}}">
                  <input type="hidden" name="question_id" value="{{$show_question->id}}">
                  @endforeach
                  </p>
                  @elseif($show_question->question_type === 'checkbox')
                  @foreach($show_question->choice as $show_choice)
                  <label>{{$show_choice->choice_name}}</label><input type="checkbox" name="checkbox[]" value="{{$show_choice->choice_id}}">
                  <input type="hidden" name="question_id" value="{{$show_question->id}}">
                  @endforeach
                   @endif
              <div class="divider" style="margin:10px 10px;"></div>
          @endforeach
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
@extends('bar.header(student)') --}}
@extends('bar.body')
@section('content')

<div class="card-content">
    <div class="col-sm" style="margin-top: px; padding: 5px;">
    <span class="card-title"> <h4> &nbsp; {{ $survey->title }} </h4> <h6>&nbsp;&nbsp;&nbsp; รายละเอียด : {{ $survey->description }}</h6></span></div>
    <hr style="margin-top: 0%">

<br><br><br>

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
          {!! Form::open(array('action'=>array('student\AnswerController@storeStudent', $survey->id))) !!}
          @foreach($questionme as $show_question)

          {{--&nbsp;  <h6 class="flow-text">คำถามที่ {{$loop->iteration}} </h6>--}}
          <h5>{{$show_question->title}}</h5>
                @if($show_question->question_type === 'text')
                  <div class="input-field col s12">
                    <input id="answer" type="text" name="text" value="" style="width: 80%">
                    <input type="hidden" name="question_id" value="{{$show_question->id}}">
                    <label for="answer"><h6>คำตอบ</h6></label>
                  </div>
                  <hr>
                @elseif($show_question->question_type === 'textarea' )
                  <div class="input-field col s12">
                    <textarea id="textarea1" class="materialize-textarea" value="" name="textarea" style="width: ุ0%" ></textarea>
                    <input type="hidden" name="question_id" value="{{$show_question->id}}">
                    <label for="textarea1"><h6>คำตอบ</h6></label>
                  </div>
                  <hr>
                  @elseif($show_question->question_type === 'radio')
                  @foreach($show_question->choice as $show_choice)
                  <input type="radio" name="radio" value="{{$show_choice->choice_id}}"><label>{{$show_choice->choice_name}}</label>
                  <input type="hidden" name="question_id" value="{{$show_question->id}}"><br>
                  @endforeach
                  </p>
                  <hr>
                  @elseif($show_question->question_type === 'checkbox')
                  @foreach($show_question->choice as $show_choice)
                  <input type="checkbox" name="checkbox[]" value="{{$show_choice->choice_id}}">
                  <label>{{$show_choice->choice_name}}</label>
                  <input type="hidden" name="question_id" value="{{$show_question->id}}"><br>

                  @endforeach
                  <hr>
                   @endif
              <div class="divider" style="margin:10px 10px;"></div>
          @endforeach
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
@extends('bar.header(student)')


