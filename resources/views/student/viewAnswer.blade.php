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

<div class="card-content">
        <div class="col-sm" style="margin-top: px; padding: 5px;">
        <span class="card-title"> <h4> &nbsp; {{ $survey->title }} </h4> <h6>&nbsp;&nbsp;&nbsp;รายละเอียด : {{ $survey->description }}</h6> <h6>&nbsp;&nbsp;&nbsp;โดย : {{ $survey->user->name }}</h6></span></div>
        <hr style="margin-top: 0%">

{{-- &nbsp; &nbsp; &nbsp; &nbsp; <a href='view/{{$survey->id}}'>ทำแบบสำรวจ</a> | <a href="{{$survey->id}}/edit">แก้ไขหัวข้อแบบสำรวจ</a> | <a href="/survey/answers/{{$survey->id}}">ดูผลการตอบแบบสำรวจ</a> <a href="#doDelete" style="float:right; text-decoration: none" class="modal-trigger red-text">ลบแบบสำรวจ &nbsp; &nbsp;&nbsp;</a> --}}



</div>
<br><br>
<!DOCTYPE html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,700,800" rel="stylesheet">


  </head>
  <body>




    <section class="home-slider owl-carousel ftco-degree-bg">
      <div class="slider-item bread-wrap" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>

      </div>
    </section>

    <section class="ftco-section contact-section ftco-degree-bg">
      <div class="container bg-light" style="width: 70%;box-shadow: 5px 5px 8px 4px rgba(50, 50, 50, .5);">
        <div class="row d-flex mb-5 contact-info">
          <div class="col-md-12 mb-4">
              <br>
            <h2 class="h4">{{ $survey->title }}</h2>
          </div>
          <div class="w-100"></div>
          <div class="col-md-7">
            <p><span>รายละเอียด :</span> {{ $survey->description }}</p>
          </div>

          <div class="col-md-5">
            <p><span>ผู้ตอบ :&nbsp;รหัสนักศึกษา:</span> <a href="# ">{{Auth::user()->student_id}} </a></p><br><p><span>ชื่อ-นามสกุล :</span> <a href="#">{{Auth::user()->name}} &nbsp; {{Auth::user()->lastname}}</a></p>
          </div>

        </div>

        <div class="container">
                <div class="row">
                  <div class="col-sm-2">


                  </div>
                  <div class="col-sm-6">

                        <div class="row block-12">
                                <div class="col-md-6 pr-md-5">
                                  <form action="#">

                                    @forelse ($survey->questions as $item)

                                    <h6 style="text-decoration-line: underline">คำถาม</h6>
                                    <div class="form-group">
                                          <div class="card" style="width: 30rem;">
                                                  <div class="card-body">
                                                          <p class="card-text">{{ $item->title }}</p>
                                    </div>
                                          </div>
                                    </div>
                                    <h6>คำตอบ</h6>

                                    @foreach ($item->answers as $answer)

                                    <div class="card" style="width: 30rem;">
                                      <div class="card-body">
                                        <p class="card-text">{{ $answer->answer }} </p>
                                      </div>
                                    </div>

                                    @endforeach
                                    @empty
                                    <div class="card" style="width: 30rem;">
                                            <div class="card-body">
                                              <p class="card-text">No answer </p>
                                            </div>
                                          </div>
                                    @endforelse
                                    <br>




                                    <div class="form-group">
                                            <input type="submit" value="แบบสอบถามทั้งหมด" class="btn btn-primary py-2 px-2">
                                           </div>
                                           <br>
                                  </form>

                                </div>

                  </div>

                </div>
              </div>

      </div>
    </section>
<br><br>


  </body>



@endsection @extends('bar.header(student)')
