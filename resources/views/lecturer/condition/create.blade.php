@extends('lecturer.condition.layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    เพิ่มเงื่อนไขในการแจ้งเตือน
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
      <form method="post" action="{{ route('conditions.store') }}">
          {{-- <div class="form-group">
              @csrf
              <label for="name">Book Name:</label>
              <input type="text" class="form-control" name="book_name"/>
          </div> --}}
          <div class="form-group">
            @csrf
            <label for="exampleFormControlSelect1">Behavior Attribute:
                    <select class="form-control" id="exampleFormControlSelect1" name="behavior_attribute">
                      <option>Problem</option>
                      <option>Attendance</option>
                      <option>Grade</option>
                    </select>
            </label>
            {{-- <input type="text" class="form-control" name="behavior_attribute"/> --}}
          </div>
          {{-- <div class="form-group">
              <label for="price">Book ISBN Number :</label>
              <input type="text" class="form-control" name="isbn_no"/>
          </div> --}}
          {{-- <div class="form-group">
              <label for="quantity">Book Price :</label>
              <input type="text" class="form-control" name="book_price"/>
          </div> --}}
            <div class="form-group">
                <label for="exampleFormControlSelect1">Condition:
                    <select class="form-control" id="exampleFormControlSelect1" name="condition">
                        <option>></option>
                        <option><</option>
                        <option>>=</option>
                        <option><=</option>
                        <option>=</option>
                    </select>
                </label>
                {{-- <input type="text" class="form-control" name="condition"/> --}}
            </div>

            <div class="form-group">
              <label for="quantity">Value :</label>
              <input type="text" class="form-control" name="value"/>
            </div>

            <div class="form-group">
              <label for="quantity">รหัสวิชา :</label>
              <input type="text" class="form-control" name="course_id"/>
            </div>

            <div class="form-group">
                <label for="exampleFormControlSelect1">เทอม:
                    <select class="form-control" id="exampleFormControlSelect1" name="semester">
                        <option>1</option>
                        <option>2</option>
                    </select>
                </label>
                {{-- <input type="text" class="form-control" name="semester"/> --}}
            </div>

            <div class="form-group">
                <label for="exampleFormControlSelect1">ปีการศึกษา:
                    <select class="form-control" id="exampleFormControlSelect1" name="year">
                        <option>2019</option>
                        <option>2020</option>
                        <option>2021</option>
                        <option>2022</option>
                        <option>2023</option>
                        <option>2024</option>
                        <option>2025</option>
                    </select>
                </label>
                {{-- <input type="text" class="form-control" name="year"/> --}}
            </div>

          <button type="submit" class="btn btn-primary">สร้างเงื่อนไขการแจ้งเตือน</button>
      </form>

  </div>
</div>
@endsection

@extends('bar.header(lec)')
