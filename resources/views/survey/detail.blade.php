{{-- @extends('bar.body')

@section('content')
  <div class="card">
      <div class="card-content">
      <span class="card-title"> {{ $survey->title }}</span>
      <p>
        {{ $survey->description }}
      </p>
      <br/>
      <a href='view/{{$survey->id}}'>Take Survey</a> | <a href="{{$survey->id}}/edit">Edit Survey</a> | <a href="/survey/answers/{{$survey->id}}">View Answers</a> <a href="/survey/{{$survey->id}}/delete" style="float:right;" class="modal-trigger red-text">Delete Survey</a>
      <!-- Modal Structure -->
      <!-- TODO Fix the Delete aspect -->
      <div id="doDelete" class="modal bottom-sheet">
        <div class="modal-content">
          <div class="container">
            <div class="row">
              <h4>Are you sure?</h4>
              <p>Do you wish to delete this survey called "{{ $survey->title }}"?</p>
              <div class="modal-footer">
                <a href="/survey/{{ $survey->id }}/delete" class=" modal-action waves-effect waves-light btn-flat red-text">Yep yep!</a>
                <a class=" modal-action modal-close waves-effect waves-light green white-text btn">No, stop!</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="divider" style="margin:20px 0px;"></div>
      <p class="flow-text center-align">Questions</p>
      <ul class="collapsible" data-collapsible="expandable">
          @forelse ($survey->questions as $question)
          <li style="box-shadow:none;">
            <div class="collapsible-header">{{ $question->title }} <a href="/question/{{ $question->id }}/edit" style="float:right;">Edit</a></div>
            <div class="collapsible-body">
              <div style="margin:5px; padding:10px;">
                  {!! Form::open() !!}
                    @if($question->question_type === 'text')
                      {{ Form::text('title')}}
                    @elseif($question->question_type === 'textarea')
                    <div class="row">
                      <div class="input-field col s12">
                        <textarea id="textarea1" class="materialize-textarea"></textarea>
                        <label for="textarea1">Provide answer</label>
                      </div>
                    </div>
                    @elseif($question->question_type === 'radio')
                      @foreach($question->option_name as $key=>$value)
                        <p style="margin:0px; padding:0px;">
                          <input type="radio" id="{{ $key }}" />
                          <label for="{{ $key }}">{{ $value }}</label>
                        </p>
                      @endforeach
                    @elseif($question->question_type === 'checkbox')
                      @foreach($question->option_name as $key=>$value)
                      <p style="margin:0px; padding:0px;">
                        <input type="checkbox" id="{{ $key }}" />
                        <label for="{{$key}}">{{ $value }}</label>
                      </p>
                      @endforeach
                    @endif
                  {!! Form::close() !!}
              </div>
            </div>
          </li>
          @empty
            <span style="padding:10px;">Nothing to show. Add questions below.</span>
          @endforelse
      </ul>
      <h2 class="flow-text">Add Question</h2>
      <form method="POST" action="{{ $survey->id }}/questions" id="boolean">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="row">
          <div class="input-field col s12">
            <select class="browser-default" name="question_type" id="question_type">
              <option value="" disabled selected>Choose your option</option>
              <option value="text">Text</option>
              <option value="textarea">Textarea</option>
              <option value="checkbox">Checkbox</option>
              <option value="radio">Radio Buttons</option>
            </select>
          </div>
          <div class="input-field col s12">
            <input name="title" id="title" type="text">
            <label for="title">Question</label>
          </div>
          <!-- this part will be chewed by script in init.js -->
          <span class="form-g"></span>

          <div class="input-field col s12">
          <button class="btn waves-effect waves-light">Submit</button>
          </div>
        </div>
        </form>
    </div>
  </div>
@stop

@extends('bar.header(student)') --}}

@extends('bar.body')
@section('content')

<div class="card-content">
    <div class="col-sm" style="background-color:#669999; margin-top: px; padding: 5px;">
        <span class="card-title"> <h4> &nbsp; &nbsp;&nbsp;{{ $survey->title }} ({{ $survey->description }})</h4></span></div>

    &nbsp; &nbsp; &nbsp; &nbsp; <a href='view/{{$survey->id}}'>ทำแบบสำรวจ</a> | <a href="{{$survey->id}}/edit">แก้ไขหัวข้อแบบสำรวจ</a> | <a href="/survey/answers/{{$survey->id}}">ดูผลการตอบแบบสำรวจ</a> <a href="/survey/{{$survey->id}}/delete" style="float:right; text-decoration: none" class="modal-trigger red-text">ลบแบบสำรวจ &nbsp; &nbsp;</a>
    <!-- Modal Structure -->
    <!-- TODO Fix the Delete aspect -->
    <div id="doDelete" class="modal bottom-sheet">
        <div class="modal-content">
            <div class="container">
                <div class="row">
                    <h4>Are you sure?</h4>
                    <p>Do you wish to delete this survey called "{{ $survey->title }}"?</p>
                    <div class="modal-footer">
                        <a href="/survey/{{ $survey->id }}/delete" class=" modal-action waves-effect waves-light btn-flat red-text">Yep yep!</a>
                        <a class=" modal-action modal-close waves-effect waves-light green white-text btn">No, stop!</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-sm" style="margin-left: -60px; background-color:#669999; margin-top: 50px; padding: 15px">
                <h4 style="color: black">คำถาม</h4>

                <div class="divider" style="margin:10px 0px;"></div>

                <ul class="collapsible" data-collapsible="expandable" style="background-color: #FFFFFF">
                    @forelse ($survey->questions as $question)
                    <div class="row">
                        <div class="col">
                            <div class="list-group" id="list-tab" role="tablist">
                                <li style="box-shadow:none;">
                                    <div class="collapsible-header"> &nbsp;&nbsp; &nbsp;{{ $question->title }}</div>
                                    <div class="collapsible-body">
                                        <div style="margin:5px; padding:10px;">
                                            {!! Form::open() !!}
                                            @if($question->question_type === 'text')
                                            {{ Form::text('title')}}
                                            <a href="/question/{{ $question->id }}/edit">แก้ไขคำถาม</a>

                                            @elseif($question->question_type === 'textarea')
                                            <div class="row">
                                                <div class="input-field col s12">
                                                    <textarea id="textarea1" class="materialize-textarea"></textarea>
                                                    <a href="/question/{{ $question->id }}/edit">แก้ไขคำถาม</a>
                                                    {{-- <label for="textarea1">Provide answer</label> --}}
                                                </div>
                                            </div>

                                            @elseif($question->question_type === 'radio') @foreach($question->option_name as $key=>$value)
                                            <p style="margin:0px; padding:0px;">
                                                <input type="radio" id="{{ $key }}" />
                                                <label for="{{ $key }}">{{ $value }}</label>
                                            </p>
                                            @endforeach @elseif($question->question_type === 'checkbox') @foreach($question->option_name as $key=>$value)
                                            <p style="margin:0px; padding:0px;">
                                                <input type="checkbox" id="{{ $key }}" />
                                                <label for="{{$key}}">{{ $value }}</label>
                                            </p>
                                            @endforeach @endif {!! Form::close() !!}

                                        </div>
                                    </div>
                                </li>
                                @empty
                                <span style="padding:10px;">กรุณาเพิ่มคำถาม</span> @endforelse

                </ul>
                </div>

                <div class="col-9">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <br>
                                <br>
                                <div class="card">
                                    <div class="card-header" style="background-color:#E6E6FA">
                                        <h4 class="flow-text">เพิ่มคำถาม</h4>
                                    </div>
                                    <div class="card-body">
                                        <blockquote class="blockquote mb-0">
                                            <form method="POST" action="{{ $survey->id }}/questions" id="boolean">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <div class="row">
                                                    <div class="input-field col s12">
                                                        <label for="exampleFormControlSelect1">ประเภทคำถาม</label>
                                                        <select class="form-control" name="question_type" id="question_type">
                                                            <option value="" disabled selected>เลือกประเภทคำถาม</option>
                                                            <option value="text">Text</option>
                                                            <option value="textarea">Textarea</option>
                                                            <option value="checkbox">Checkbox</option>
                                                            <option value="radio">Radio Buttons</option>
                                                        </select>
                                                    </div>

                                                    <div class="input-field col s12">
                                                        <label for="title">คำถาม</label>
                                                        <input name="title" type="text" class="form-control" placeholder="...">
                                                    </div>
                                                    <!-- this part will be chewed by script in init.js -->
                                                    <span class="form-g"></span>

                                                    <div class="input-field col s12">
                                                        <br>
                                                        <button class="btn btn-primary" style="margin-bottom: -20px">ตกลง</button>
                                                    </div>
                                                </div>
                                            </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                </div>
            </div>
            <br>
        </div>

@stop
@extends('bar.header(lec)')
