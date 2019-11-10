@extends('lecturer.condition.layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>

<br>
<h6 align='right'>
    <a href="/AdminConditions/create">
        <img src="{{ URL::asset("../img/noti.png") }}" width="30" height="25" title="แจ้งเตือน">
        เพิ่มเงื่อนไขการแจ้งเตือน
    </a>
</h6>

<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}
    </div><br />
  @endif

        <h5 align='center'>เงื่อนไขการแจ้งเตือน</h5>

  <br><br><br>

  <center>
  <table class="table table-striped">
    <thead>
        <tr>
          {{-- <td>ID</td> --}}
          <td>เรื่องที่จะทำการกำหนดการแจ้งเตือน</td>
          <td>เงื่อนไขในการแจ้งเตือน</td>
          <td>จำนวนครั้งที่จะทำให้เกิดการแจ้งเตือน</td>
          {{-- <td>รหัสวิชา</td>
          <td>เทอม</td>
          <td>ปีการศึกษา</td> --}}
          <td>INSTRUCTOR_ID</td>
          {{-- <td>ชื่อ column</td> --}}
          <td colspan="2"><center>Action</center></td>
        </tr>
    </thead>
    <tbody>
        @foreach($conditions as $con)
        <tr>
            {{-- <td>{{$con->id}}</td> --}}
            <td>{{$con->behavior_attribute}}</td>
            <td>{{$con->condition}}</td>
            <td>{{$con->value}}</td>
            {{-- <td>{{$con->course_id}}</td> --}}
            {{-- <td>{{$con->semester}}</td> --}}
            {{-- <td>{{$con->year}}</td> --}}
            <td>{{$con->instructor_id}}</td>
            {{-- <td>{{$con->name_column}}</td> --}}
            <td><a href="{{ route('AdminConditions.edit',$con->id)}}" class="btn btn-primary">Edit</a></td>
            <td>
                <form action="{{ route('AdminConditions.destroy', $con->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table><br><br>
  </center>
<div>
@endsection

@extends('bar.header(admin)')
