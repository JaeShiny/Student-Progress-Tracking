@extends('Admin.problemtype.layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>

<br>
<h6 align='right'>
    <a href="/ProblemType/create">
        <img src="{{ URL::asset("../img/noti.png") }}" width="30" height="25" title="ประเภทปัญหา">
        เพิ่มประเภทของปัญหา
    </a>
</h6>

<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}
    </div><br />
  @endif

        <h5 align='center'>สร้างประเภทของปัญหา</h5>

  <br><br><br>

  <center>
  <table class="table table-striped">
    <thead>
        <tr>

          <td><center><b>ประเภทของปัญหา</b></center></td>
          <td colspan="2"><center><b>Action</b></center></td>

        </tr>
    </thead>
    <tbody>
        @foreach($conditions as $con)
        <tr>

            <td>{{$con->problem_type}}</td>

            <td><center><a href="{{ route('ProblemType.edit',$con->id)}}" class="btn btn-primary">Edit</a></center></td>
            <td><center>
                <form action="{{ route('ProblemType.destroy', $con->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form></center>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table><br><br>
  </center>
<div>
@endsection

@extends('bar.header(admin)')
