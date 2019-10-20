{{-- @extends('bar.body')

@section('content')
<form method="POST" action="/survey/{{ $survey->id }}/update">
  {{ method_field('PATCH') }}
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <h2 class="flow-text">Edit Survey</h2>
   <div class="row">
    <div class="input-field col s12">
      <input type="text" name="title" id="title" value="{{ $survey->title }}">
      <label for="title">Question</label>
    </div>
    <div class="input-field col s12">
      <textarea id="description" name="description" class="materialize-textarea">{{ $survey->description }}</textarea>
      <label for="description">Description</label>
    </div>
    <div class="input-field col s12">
    <button class="btn waves-effect waves-light">Update</button>
    </div>
  </div>
</form>
@stop

@extends('bar.header(student)') --}}








@extends('bar.body')
@section('content')
<div class="card-content">
        <div class="col-sm" style="margin-top: px; padding: 5px;">
        <span class="card-title"> <h4> &nbsp; {{$survey->title}} </h4> <h6>&nbsp;&nbsp;&nbsp;รายละเอียด : {{$survey->description}}</h6></span></div>
        <hr style="margin-top: 0%">

          {{-- &nbsp;&nbsp;&nbsp; <a href="/survey/{{$survey->title}}/edit">แก้ไขหัวข้อแบบสอบถาม</a> --}}
        <!-- Modal Structure -->
        <!-- TODO Fix the Delete aspect -->

</div>
        </div>
{{-- &nbsp; &nbsp; &nbsp; &nbsp; <a href='view/{{$survey->id}}'>ทำแบบสำรวจ</a> | <a href="{{$survey->id}}/edit">แก้ไขหัวข้อแบบสำรวจ</a> | <a href="/survey/answers/{{$survey->id}}">ดูผลการตอบแบบสำรวจ</a> <a href="#doDelete" style="float:right; text-decoration: none" class="modal-trigger red-text">ลบแบบสำรวจ &nbsp; &nbsp;</a> --}}

<div class="container">
        <div class="row">
            <div class="col-2">
            </div>
            <div class="col-8">
        <form method="POST" action="/survey/{{ $survey->id }}/update">
            {{ method_field('PATCH') }}
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="form-group" style="background-color:#E6E6E6;margin-top: 4%;box-shadow: 5px 5px 8px 4px rgba(50, 50, 50, .5);">
                    <div class="card mb-3" style="max-width: 50rem; background-color: #FFFFFF;border-bottom-color: teal">
                            <div class="card-header"><h4>แก้ไขหัวข้อแบบสอบถาม</h4></div>

                           </div>

            {{--<h4 class="flow-text" style="margin-top: -50px">แก้ไขหัวข้อแบบสอบถาม</h4>--}}
            <div class="row">
                <div class="input-field col s12">
                    <br>
                    <div class="container">
                        <div class="row">
                            <div class="col-1">
                            </div>
                            <div class="col-10">

                                <label for="title">หัวข้อแบบสอบถาม</label>
                                <input type="text" class="form-control" name="title" id="title" value="{{ $survey->title }}">

                            </div>



                        </div>
                        <div class="col-sm-1"></div>
                    </div>
                </div>
            </div>



            <div class="container">
                    <div class="row">
                        <div class="col-1">
                        </div>
                        <div class="col-10">

                            <label for="description">รายละเอียดคำถาม</label>
                            <textarea id="description" name="description" class="form-control" rows="3">{{ $survey->description }}</textarea>


                        </div>

                    </div>
                    <div class="col-sm-1"></div>
                </div>



                <div class="container">
                        <div class="row">
                            <div class="col-3">


                            </div>


                            <div class="col-6">
                                <br>


                                <button type="submit" class="btn btn-primary" style="position: relative; float: right;right: -35%">อัพเดท</button>
                                <br><br><br>
                            </div>
                        </div>
                        <div class="col-sm-1">

                        </div>
                    </div>
                        </div>
                    </div>


        </form>
    </div>
</div>
@stop

@extends('bar.header(lec)')
