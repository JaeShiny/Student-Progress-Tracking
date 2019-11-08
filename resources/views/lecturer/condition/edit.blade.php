@extends('lecturer.condition.layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    แก้ไขเงื่อนไขในการแจ้งเตือน
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('conditions.update', $conditions->id) }}">
          <div class="form-group">
              @csrf
              @method('PATCH')
              {{-- <label for="name">Book Name:</label>
              <input type="text" class="form-control" name="book_name" value="{{$book->book_name}}"/> --}}
                <label for="exampleFormControlSelect1">หัวข้อเรื่องที่จะทำการแจ้งเตือน:
                    <select class="form-control" id="exampleFormControlSelect1" name="behavior_attribute" value="{{$conditions->behavior_attribute}}"/>
                      <option value="Problem">ปัญหา/พฤติกรรม (levelความรุนแรงของปัญหา)</option>
                      <option value="Attendance">การเข้าเรียน (จำนวนครั้งในการขาดเรียนที่จะแจ้งเตือน)</option>
                      <option value="Grade">ผลการเรียน (เกณฑ์คะแนนที่จะแจ้งเตือน)</option>
                    </select>
                </label>
          </div>
          <div class="form-group">
              {{-- <label for="price">Book ISBN Number :</label>
              <input type="text" class="form-control" name="isbn_no" value="{{$book->isbn_no}}"/> --}}
                <label for="exampleFormControlSelect1">เงื่อนไขที่จะใช้ในการแจ้งเตือน:
                    <select class="form-control" id="exampleFormControlSelect1" name="condition" value="{{$conditions->condition}}"/>
                        <option>></option>
                        <option><</option>
                        <option>>=</option>
                        <option><=</option>
                        <option>=</option>
                    </select>
                </label>
          </div>
          <div class="form-group">
                <label for="quantity">จำนวนครั้งที่จะใช้ในการแจ้งเตือน(Value):</label>
                <input type="text" class="form-control" name="value" value="{{$conditions->value}}"/>
              </div>

              {{-- <div class="form-group">
                <label for="quantity">รหัสวิชา :</label>
                <input type="text" class="form-control" name="course_id" value="{{$conditions->course_id}}"/>
              </div>

              <div class="form-group">
                  <label for="exampleFormControlSelect1">เทอม:
                      <select class="form-control" id="exampleFormControlSelect1" name="semester" value="{{$conditions->semester}}"/>
                          <option>1</option>
                          <option>2</option>
                      </select>
                  </label>
              </div>

              <div class="form-group">
                  <label for="exampleFormControlSelect1">ปีการศึกษา:
                      <select class="form-control" id="exampleFormControlSelect1" name="year" value="{{$conditions->year}}"/>
                          <option>2019</option>
                          <option>2020</option>
                          <option>2021</option>
                          <option>2022</option>
                          <option>2023</option>
                          <option>2024</option>
                          <option>2025</option>
                      </select>
                  </label>
              </div> --}}
          <button type="submit" class="btn btn-primary">Update เงื่อนไขในการแจ้งเตือน</button>
      </form>
  </div>
</div>
@endsection

@extends('bar.header(lec)')
