@extends('Admin.problemtype.layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    สร้างประเภทของปัญหา
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
      <form method="post" action="{{ route('ProblemType.store') }}">
          <div class="form-group">
              @csrf
              <label for="problem_type">ประเภทปัญหา:</label>
              <input type="text" class="form-control" name="problem_type"/>
          </div>

          <button type="submit" class="btn btn-primary">สร้างประเภทของปัญหา</button>
      </form>

  </div>
</div>
@endsection

@extends('bar.header(admin)')
