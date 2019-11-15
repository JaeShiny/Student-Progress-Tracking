@extends('Admin.problemtype.layout')

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
      <form method="post" action="{{ route('ProblemType.update', $conditions->id) }}">
          <div class="form-group">
              @csrf
              @method('PATCH')
              <label for="problem_type">ประเภทของปัญหา:</label>
              <input type="text" class="form-control" name="problem_type" value="{{$conditions->problem_type}}"/>

          </div>

          <button type="submit" class="btn btn-primary">Update ประเภทของปัญหา</button>
      </form>
  </div>
</div>
@endsection

@extends('bar.header(admin)')
