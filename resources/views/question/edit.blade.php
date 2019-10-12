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

<form method="POST" action="/question/{{ $question->id }}/update">
    {{ method_field('PATCH') }}
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

    <div class="jumbotron jumbotron-fluid" style="background-color: #CCCCFF">
        <div class="container">
            <h4 class="flow-text" style="margin-top: -40px"><center>แก้ไขหัวข้อคำถาม</center></h4>
            <div class="container">
                <div class="row">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-8">
                        <div class="input-field col s12">
                            <label for="title">คำถาม</label>
                            <br>

                            <input type="text" class="form-control" name="title" id="title" value="{{ $question->title }}">
                            <br>
                            <button class="btn btn-primary" style="float: right">อัพเดท</button>
                        </div>
                    </div>
                    <div class="col-sm-2"></div>
                </div>
            </div>
        </div>
    </div>
</form>
@stop @extends('bar.header(lec)')



