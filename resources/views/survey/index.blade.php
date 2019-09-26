
@extends('bar.body')

@section('content')
<table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">ชื่อแบบสอบถาม</th>
            <th>สถานะ</th>
          </tr>
        </thead>
        <tbody>
            @foreach($survey as $show)
          <tr>
          <th scope="row">{{$loop->iteration}}</th>
          @if($show->check->where('user_id',Auth::id())->count() > 0)
          <td><a href="/survey/answers/{{$show->id}}">{{$show->title}}</a></td>
          @else
          <td><a href="/survey/view/{{$show->id}}">{{$show->title}}</a></td>
          @endif
          @if($show->check->where('user_id',Auth::id())->count() > 0)
          <td>ทำแบบสอบถามแล้ว</td>

          @else
          <td>ยังไม่ได้ทำ</td>
          @endif
          </tr>


          @endforeach
        </tbody>
</table>

@stop
@extends('bar.header(student)')



