@extends('bar.body')
@section('content')

<div class="card-content">
    <div class="col-sm" style="margin-top: px; padding: 5px;">
    <span class="card-title"> <h4> &nbsp; {{ $survey->title }} </h4> <h6>&nbsp;&nbsp;&nbsp;รายละเอียด : {{ $survey->description }}</h6></span></div>
    <hr style="margin-top: 0%">

      &nbsp;&nbsp;&nbsp; <a href='view/{{$survey->id}}'>ดูแบบสอบถาม</a> | <a href="{{$survey->id}}/edit">แก้ไขหัวข้อแบบสอบถาม</a> <a href="#doDelete" style="float:right; text-decoration: none" class="modal-trigger red-text">ลบแบบสำรวจ &nbsp; &nbsp;</a>
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
            <div class="col-sm" style="margin-left: -60px; background-color:#F5F5F5; margin-top: 50px; padding: 15px">
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

                                            @if($question->question_type === 'text')
                                            <a href="/question/{{ $question->id }}/edit">แก้ไขคำถาม</a>

                                            @elseif($question->question_type === 'textarea')
                                            <div class="row">
                                                <div class="input-field col s12">
                                                    <a href="/question/{{ $question->id }}/edit">แก้ไขคำถาม</a>
                                                    {{-- <label for="textarea1">Provide answer</label> --}}
                                                </div>
                                            </div>

                                            @elseif($question->question_type === 'radio')
                                            @foreach($question->choice as $show_choice)
                                            <label>{{$show_choice->choice_name}}</label><input name="radio" type="radio" value="{{$show_choice->id}}">
                                            @endforeach
                                            </p>
                                            @elseif($question->question_type === 'checkbox')
                                            @foreach($question->choice as $show_choice)
                                            <label>{{$show_choice->choice_name}}</label><input type="checkbox" value="{{$show_choice->id}}">
                                            @endforeach
                                             @endif {!! Form::close() !!}

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
                                            <form method="POST" action="/survey/{{ $survey->id }}/questions" id="boolean">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <div class="row">
                                                    <div class="input-field col s12">
                                                        <label id="question"  for="exampleFormControlSelect1">ประเภทคำถาม</label>
                                                        <select id="question_type"  class="form-control" name="question_type" id="question_type">
                                                            <option id="text" value=""  >เลือกประเภทคำถาม</option>
                                                            <option id="text" value="text">Text</option>
                                                            <option id="textarea" value="textarea">Textarea</option>
                                                            <option id="checkbox"  value="checkbox">Checkbox</option>
                                                            <option  value="radio">Radio Buttons</option>
                                                        </select>
                                                    </div>

                                                    <div id="answer" class="input-field col s12">
                                                        <label for="title">คำถาม</label>
                                                        <input value="" name="title" type="text" class="form-control" placeholder="...">
                                                    </div>

                                                    <div class="input-field col s12">

                                                        <label>ตัวเลือก</label>
                                                        <button id='addme' type='button' class='form-control btn btn-primary'>เพิ่มตัวเลือก</button>
                                                        <input value="" name="choice[]" type="text" class="form-control" placeholder="...">
                                                        <div id="choice">
                                                            <div id="choice2">

                                                            </div>
                                                        </div>
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
        <script>
            $( document ).ready(function() {
                $('#addme').hide();
            });
            $('#question_type').change(function() {
                if($(this).val() === 'checkbox') {
                    $('#choice').show();
                    $('#addme').show();
                }
                if($(this).val() === 'radio') {
                    $('#choice').show();
                    $('#addme').show();
                }
                if($(this).val() === 'text') {
                    $('#addme').hide();
                    $('#choice').hide();
                }
                if($(this).val() === 'textarea') {
                    $('#addme').hide();
                    $('#choice').hide();
                }

            });

            $('#addme').click(function() {

                $('#choice2').append("<input id='ans' type='text' name='choice[]' value='' class='form-control'>");
            });
        </script>

@stop
@extends('bar.header(lec)')


