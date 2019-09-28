{{-- @extends('bar.body')

@section('content')
  <div class="card">
      <div class="card-content">
      <span class="card-title"> Add Survey</span>
      <form method="POST" action="create" id="boolean">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="row">
          <div class="input-field col s12">
            <input name="title" id="title" type="text">
            <label for="title">Survey Title</label>
          </div>
          <div class="input-field col s12">
            <textarea name="description" id="description" class="materialize-textarea"></textarea>
            <label for="description">Description</label>
          </div>
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
<br>
<br>
<br>
<div class="container">
    <div class="row">
        <div class="col-sm">

        </div>
        <div class="col-sm" style="background-color: #FFCC66; text-align: center;border-radius: 10px;">
            <h3>เพิ่มแบบสอบถาม</h3>
        </div>
        <div class="col-sm">

        </div>
    </div>
</div>

</div>
<div class="container">
    <div class="row">
        <div class="col">

            <form method="POST" action="/edusurvey/create" id="boolean">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="jumbotron jumbotron-fluid" style="background-color:#DCDCDC">
                    <div class="container">
                        <div class="col-12">
                            <div class="input-field col s12">
                                <label for="title">หัวข้อแบบสอบถาม</label>
                                <input name="title" type="text" class="form-control" placeholder="...">
                                <small id="emailHelp" class="form-text text-muted">โปรดระบุหัวข้อแบบสอบถาม</small>
                                <br>
                                <label for="description">รายละเอียดแบบสอบถาม</label>
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="2"></textarea>
                                <small id="emailHelp" class="form-text text-muted">อธิบายรายละเอียดเกี่ยวกับคำถามหากไม่ให้ใส่เครื่องหมาย (-) </small>
                                <br>
                                <button type="submit" class="btn btn-primary" style="float: right">submit</button>
                            </div>
                        </div>

                    </div>
            </form>
            </div>
        </div>
    @stop

@extends('bar.header(edu)')
