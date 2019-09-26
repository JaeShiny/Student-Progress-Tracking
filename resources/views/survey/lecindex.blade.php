
@extends('bar.body')

@section('content')
<table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">ชื่อแบบสอบถาม</th>
            <th>แก้ไข</th>
          </tr>
        </thead>
        <tbody>
            @foreach($survey as $show)
          <tr>
          <th scope="row">{{$loop->iteration}}</th>
          <td><a href="/survey/answers/{{$show->id}}">{{$show->title}}</a></td>
          <td><a href="/survey/{{$show->id}}">แก้ไข</a></td>
          </tr>


          @endforeach
        </tbody>
</table>
@stop

@extends('bar.header(student)')
