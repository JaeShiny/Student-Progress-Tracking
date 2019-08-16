{{-- @extends('bar.body')

@section('content')
<h4>{{ $survey->title }}</h4>
<table class="bordered striped">
  <thead>
    <tr>
        <th data-field="id">Question</th>
        <th data-field="name">Answer(s)</th>
    </tr>
  </thead>

  <tbody>
    @forelse ($survey->questions as $item)
    <tr>
      <td>{{ $item->title }}</td>
      @foreach ($item->answers as $answer)
        <td>{{ $answer->answer }} <br/>
        <small>{{ $answer->created_at }}</small></td>
      @endforeach
    </tr>
    @empty
      <tr>
        <td>
          No answers provided by you for this Survey
        </td>
        <td></td>
      </tr>
    @endforelse
  </tbody>
</table>
@endsection
@extends('bar.header(student)') --}}

@extends('bar.body')
@section('content')

<div class="col-sm" style="background-color:#669999; margin-top: px; padding: 5px;">
    <span class="card-title"> <h4> &nbsp; &nbsp;&nbsp;ผลการตอบแบบสำรวจ : {{ $survey->title }} ( {{ $survey->description }})</h4></span></div>

{{-- &nbsp; &nbsp; &nbsp; &nbsp; <a href='view/{{$survey->id}}'>ทำแบบสำรวจ</a> | <a href="{{$survey->id}}/edit">แก้ไขหัวข้อแบบสำรวจ</a> | <a href="/survey/answers/{{$survey->id}}">ดูผลการตอบแบบสำรวจ</a> <a href="#doDelete" style="float:right; text-decoration: none" class="modal-trigger red-text">ลบแบบสำรวจ &nbsp; &nbsp;&nbsp;</a> --}}

</div>
<div class="card-body">
    <blockquote class="blockquote mb-0">
        <br>
        <br>

        <center>
            <br>

            <table class="bordered striped">
                <thead>
                    <tr class="table-info">
                        <th data-field="id">Question</th>
                        <th data-field="name">Answer(s)</th>
                        <th data-field="Date-Time">Date-Time</th>

                    </tr>
                </thead>

                <tbody>
                    @forelse ($survey->questions as $item)
                    <tr>
                        <td>{{ $item->title }}</td>
                        @foreach ($item->answers as $answer)
                        <td>{{ $answer->answer }}
                            <br/>
                            <td><small>{{ $answer->created_at }}</small></td>
                            @endforeach
                    </tr>
                    @empty
                    <tr>
                        <td>
                            No answers provided by you for this Survey
                        </td>
                        <td></td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </center>
    </blockquote>
</div>
</div>
</div>
</div>
</div>
@endsection @extends('bar.header(student)')
