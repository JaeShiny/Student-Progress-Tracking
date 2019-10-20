{{-- @extends('layout')
@extends('bar.body')

@section('content')
<form method="POST" action="/question/{{ $question->id }}/update">
  {{ method_field('PATCH') }}
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <h2 class="flow-text">Edit Question Title</h2>
   <div class="row">
    <div class="input-field col s12">
      <input type="text" name="title" id="title" value="{{ $question->title }}">
      <label for="title">Question</label>
    </div>
    <div class="input-field col s12">
    <button class="btn waves-effect waves-light">Update</button>
    </div>
  </div>
</form>
@stop



@extends('bar.header(student)') --}}
{{-- @extends('layout') --}}




@extends('bar.body')
@section('content')

<br>
<br>
<div class="container">
        <div class="row">

          <div class="col-2">

          </div>
          <div class="col-8">
<form method="POST" action="/question/{{ $question->id }}/update">
    {{ method_field('PATCH') }}
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="form-group" style="background-color:#E6E6E6;margin-top: 12%;box-shadow: 5px 5px 8px 4px rgba(50, 50, 50, .5);">
            <div class="card mb-3" style="max-width: 48rem; background-color: #FFFFFF;border-bottom-color: teal">
                    <div class="card-header"><h4>แก้ไขหัวข้อคำถาม</h4></div>

                   </div>
        <div class="container">
            <div class="col-xl-12">




                            <label for="title">คำถาม</label>
                            <br>

                            <input type="text" class="form-control" name="title" id="title" value="{{ $question->title }}">
                            <br>
                            <button class="btn btn-primary" style="float: right">อัพเดท</button>
                            <br>
                            <br>
<br>
                        </div>
                    </div>
                    <div class="col-sm-2"></div>
                </div>
            </div>
        </div>
    </div>
</form>
@stop @extends('bar.header(lec)')
